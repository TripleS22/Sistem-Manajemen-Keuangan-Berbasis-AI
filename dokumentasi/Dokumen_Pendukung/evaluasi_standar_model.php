<?php

/**
 * Evaluasi standar model Decision Tree: confusion matrix, metrik klasifikasi,
 * stratified k-fold cross validation, dan uji kalibrasi confidence.
 *
 * Jalankan dari root proyek:
 *   php dokumentasi/Dokumen_Pendukung/evaluasi_standar_model.php
 *
 * Tidak menulis ke database dan tidak menimpa storage/app/ml/decision_tree.model.
 * Seed acak dikunci agar hasil dapat direproduksi.
 */

use App\Services\ML\DatasetGenerator;
use App\Services\ML\FinancialDecisionTreeService as Svc;
use Rubix\ML\Classifiers\ClassificationTree;
use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Datasets\Unlabeled;
use Rubix\ML\PersistentModel;
use Rubix\ML\Persisters\Filesystem;
use Rubix\ML\Serializers\Native;

require __DIR__.'/../../vendor/autoload.php';
$app = require __DIR__.'/../../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

const CLASSES = ['Sehat', 'Perlu perhatian', 'Berisiko'];
const SEED_TEST = 2026;
const SEED_CV = 42;
const N_TEST = 3000;
const N_CV = Svc::TRAINING_SAMPLES;
const K = 10;

$line = str_repeat('=', 86);
$out = fn (string $s = '') => print($s.PHP_EOL);
$pct = fn (float $v) => sprintf('%6.2f%%', $v * 100);

/** Confusion matrix [aktual][prediksi]. */
function confusion(array $actual, array $pred): array
{
    $cm = array_fill_keys(CLASSES, array_fill_keys(CLASSES, 0));
    foreach ($actual as $i => $a) {
        $cm[$a][$pred[$i]]++;
    }

    return $cm;
}

/** Metrik standar klasifikasi multikelas dari confusion matrix. */
function metrics(array $cm): array
{
    $n = array_sum(array_map('array_sum', $cm));
    $per = [];
    $correct = 0;
    foreach (CLASSES as $c) {
        $tp = $cm[$c][$c];
        $fp = array_sum(array_column($cm, $c)) - $tp;
        $fn = array_sum($cm[$c]) - $tp;
        $tn = $n - $tp - $fp - $fn;
        $p = $tp + $fp ? $tp / ($tp + $fp) : 0.0;
        $r = $tp + $fn ? $tp / ($tp + $fn) : 0.0;
        $per[$c] = [
            'tp' => $tp, 'fp' => $fp, 'fn' => $fn, 'tn' => $tn,
            'precision' => $p,
            'recall' => $r,
            'specificity' => $tn + $fp ? $tn / ($tn + $fp) : 0.0,
            'f1' => $p + $r ? 2 * $p * $r / ($p + $r) : 0.0,
            'support' => $tp + $fn,
        ];
        $correct += $tp;
    }

    $avg = fn (string $k, bool $weighted) => array_sum(array_map(
        fn ($m) => $m[$k] * ($weighted ? $m['support'] / $n : 1 / count(CLASSES)), $per));

    // Cohen's kappa
    $po = $correct / $n;
    $pe = 0.0;
    foreach (CLASSES as $c) {
        $pe += (array_sum($cm[$c]) / $n) * (array_sum(array_column($cm, $c)) / $n);
    }

    // Multiclass Matthews Correlation Coefficient (Gorodkin, 2004)
    $tk = array_map(fn ($c) => array_sum($cm[$c]), CLASSES);
    $pk = array_map(fn ($c) => array_sum(array_column($cm, $c)), CLASSES);
    $cov = $correct * $n - array_sum(array_map(fn ($t, $p) => $t * $p, $tk, $pk));
    $den = sqrt(($n ** 2 - array_sum(array_map(fn ($p) => $p ** 2, $pk))) * ($n ** 2 - array_sum(array_map(fn ($t) => $t ** 2, $tk))));

    // Interval kepercayaan 95% akurasi (Wilson score)
    $z = 1.96;
    $center = ($po + $z ** 2 / (2 * $n)) / (1 + $z ** 2 / $n);
    $half = $z * sqrt($po * (1 - $po) / $n + $z ** 2 / (4 * $n ** 2)) / (1 + $z ** 2 / $n);

    return [
        'n' => $n,
        'per_class' => $per,
        'accuracy' => $po,
        'accuracy_ci' => [$center - $half, $center + $half],
        'balanced_accuracy' => $avg('recall', false),
        'macro' => ['precision' => $avg('precision', false), 'recall' => $avg('recall', false), 'f1' => $avg('f1', false)],
        'weighted' => ['precision' => $avg('precision', true), 'recall' => $avg('recall', true), 'f1' => $avg('f1', true)],
        'kappa' => $pe < 1 ? ($po - $pe) / (1 - $pe) : 0.0,
        'mcc' => $den > 0 ? $cov / $den : 0.0,
    ];
}

/** ROC-AUC one-vs-rest via statistik Mann-Whitney (menangani nilai seri). */
function rocAuc(array $scores, array $isPositive): float
{
    $items = array_map(null, $scores, $isPositive);
    usort($items, fn ($a, $b) => $a[0] <=> $b[0]);
    $ranks = [];
    $i = 0;
    $n = count($items);
    while ($i < $n) {
        $j = $i;
        while ($j + 1 < $n && $items[$j + 1][0] == $items[$i][0]) {
            $j++;
        }
        for ($k = $i; $k <= $j; $k++) {
            $ranks[$k] = ($i + $j) / 2 + 1;
        }
        $i = $j + 1;
    }
    $pos = 0;
    $sumRanks = 0.0;
    foreach ($items as $k => $it) {
        if ($it[1]) {
            $pos++;
            $sumRanks += $ranks[$k];
        }
    }
    $neg = $n - $pos;

    return $pos && $neg ? ($sumRanks - $pos * ($pos + 1) / 2) / ($pos * $neg) : 0.0;
}

/** Metrik probabilistik & kalibrasi confidence. */
function calibration(array $proba, array $pred, array $actual, int $bins = 10): array
{
    $n = count($actual);
    $logLoss = 0.0;
    $brier = 0.0;
    $conf = [];
    foreach ($actual as $i => $a) {
        $logLoss -= log(max(1e-15, min(1 - 1e-15, $proba[$i][$a] ?? 0.0)));
        foreach (CLASSES as $c) {
            $brier += (($proba[$i][$c] ?? 0.0) - ($a === $c ? 1 : 0)) ** 2;
        }
        $conf[] = $proba[$i][$pred[$i]] ?? 0.0;
    }

    $auc = [];
    foreach (CLASSES as $c) {
        $auc[$c] = rocAuc(array_map(fn ($p) => $p[$c] ?? 0.0, $proba), array_map(fn ($a) => $a === $c, $actual));
    }

    // Expected Calibration Error + reliability table
    $table = [];
    $ece = 0.0;
    for ($b = 0; $b < $bins; $b++) {
        $lo = $b / $bins;
        $hi = ($b + 1) / $bins;
        $idx = array_keys(array_filter($conf, fn ($c) => $c > $lo && $c <= $hi || ($b === 0 && $c == 0)));
        if (! $idx) {
            continue;
        }
        $avgConf = array_sum(array_map(fn ($i) => $conf[$i], $idx)) / count($idx);
        $acc = count(array_filter($idx, fn ($i) => $pred[$i] === $actual[$i])) / count($idx);
        $ece += count($idx) / $n * abs($acc - $avgConf);
        $table[] = [sprintf('(%.1f-%.1f]', $lo, $hi), count($idx), $avgConf, $acc];
    }

    $right = array_keys(array_filter($pred, fn ($p, $i) => $p === $actual[$i], ARRAY_FILTER_USE_BOTH));
    $wrong = array_diff(array_keys($pred), $right);
    $mean = fn ($ids) => $ids ? array_sum(array_map(fn ($i) => $conf[$i], $ids)) / count($ids) : 0.0;

    return [
        'log_loss' => $logLoss / $n,
        'brier' => $brier / $n,
        'auc' => $auc,
        'auc_macro' => array_sum($auc) / count($auc),
        'ece' => $ece,
        'table' => $table,
        'conf_mean' => array_sum($conf) / $n,
        'conf_correct' => $mean($right),
        'conf_wrong' => $mean($wrong),
        'conf_100' => count(array_filter($conf, fn ($c) => $c >= 0.9999)) / $n,
        'n_wrong' => count($wrong),
    ];
}

function printReport(array $m, callable $out, callable $pct): void
{
    $out(sprintf('  %-18s %10s %10s %12s %10s %8s', 'Kelas', 'Precision', 'Recall', 'Specificity', 'F1-Score', 'Support'));
    foreach ($m['per_class'] as $c => $r) {
        $out(sprintf('  %-18s %10s %10s %12s %10s %8d', $c, $pct($r['precision']), $pct($r['recall']), $pct($r['specificity']), $pct($r['f1']), $r['support']));
    }
    $out(sprintf('  %-18s %10s %10s %12s %10s %8d', 'Macro avg', $pct($m['macro']['precision']), $pct($m['macro']['recall']), '', $pct($m['macro']['f1']), $m['n']));
    $out(sprintf('  %-18s %10s %10s %12s %10s %8d', 'Weighted avg', $pct($m['weighted']['precision']), $pct($m['weighted']['recall']), '', $pct($m['weighted']['f1']), $m['n']));
    $out();
    $out(sprintf('  Accuracy            : %s  (95%% CI Wilson: %s - %s)', $pct($m['accuracy']), trim($pct($m['accuracy_ci'][0])), trim($pct($m['accuracy_ci'][1]))));
    $out(sprintf('  Balanced accuracy   : %s', $pct($m['balanced_accuracy'])));
    $out(sprintf("  Cohen's Kappa       : %.4f", $m['kappa']));
    $out(sprintf('  MCC (multikelas)    : %.4f', $m['mcc']));
}

function printMatrix(array $cm, callable $out): void
{
    $out(sprintf('  %-22s %10s %16s %10s %8s', 'Aktual \\ Prediksi', 'Sehat', 'Perlu perhatian', 'Berisiko', 'Total'));
    foreach (CLASSES as $a) {
        $out(sprintf('  %-22s %10d %16d %10d %8d', $a, $cm[$a]['Sehat'], $cm[$a]['Perlu perhatian'], $cm[$a]['Berisiko'], array_sum($cm[$a])));
    }
    $out('  Dinormalisasi per baris (recall):');
    foreach (CLASSES as $a) {
        $t = max(1, array_sum($cm[$a]));
        $out(sprintf('  %-22s %9.1f%% %15.1f%% %9.1f%%', $a, $cm[$a]['Sehat'] / $t * 100, $cm[$a]['Perlu perhatian'] / $t * 100, $cm[$a]['Berisiko'] / $t * 100));
    }
}

$out($line);
$out('EVALUASI STANDAR MODEL DECISION TREE - KLASIFIKASI KESEHATAN KEUANGAN UMKM');
$out('Waktu: '.now()->format('Y-m-d H:i:s').' | PHP '.PHP_VERSION.sprintf(' | Model %s | ClassificationTree(maxHeight=%d, maxLeafSize=%d, minPurityIncrease=%s) | smoothing eps=%s', Svc::MODEL_VERSION, Svc::MAX_HEIGHT, Svc::MAX_LEAF_SIZE, Svc::MIN_PURITY_INCREASE, Svc::PROBABILITY_SMOOTHING));
$out(sprintf('Seed data uji = %d, seed cross validation = %d', SEED_TEST, SEED_CV));
$out($line);

// ---------------------------------------------------------------------------
// [1] Hold-out test set independen untuk model produksi
// ---------------------------------------------------------------------------
mt_srand(SEED_TEST);
$test = app(DatasetGenerator::class)->generate(N_TEST);
$model = PersistentModel::load(new Filesystem(storage_path('app/ml/decision_tree.model')), new Native);
$unl = new Unlabeled($test['samples']);
$pred = $model->predict($unl);
// Confidence dievaluasi persis seperti yang ditampilkan aplikasi (setelah smoothing)
$svc = app(Svc::class);
$proba = array_map(fn ($p) => $svc->smoothProbabilities($p), $model->proba($unl));
$cm = confusion($test['labels'], $pred);
$m = metrics($cm);

$dist = array_count_values($test['labels']);
$majority = max($dist) / N_TEST;

$out();
$out(sprintf('[1] HOLD-OUT TEST SET INDEPENDEN - model produksi (storage/app/ml/decision_tree.model), n = %d', N_TEST));
$out('  Distribusi kelas: '.implode(', ', array_map(fn ($c) => "$c = ".($dist[$c] ?? 0), CLASSES)));
$out(sprintf('  Baseline (selalu tebak kelas mayoritas): accuracy %s', trim($pct($majority))));
$out();
$out('  Confusion Matrix:');
printMatrix($cm, $out);
$out();
$out('  Classification Report:');
printReport($m, $out, $pct);

// ---------------------------------------------------------------------------
// [2] Stratified K-Fold Cross Validation
// ---------------------------------------------------------------------------
mt_srand(SEED_CV);
$cvData = app(DatasetGenerator::class)->generate(N_CV);
$dataset = (new Labeled($cvData['samples'], $cvData['labels']))->randomize();
$folds = $dataset->stratifiedFold(K);

$foldRows = [];
$cvActual = [];
$cvPred = [];
$cvProba = [];
$trainAcc = [];
for ($i = 0; $i < K; $i++) {
    $testing = $folds[$i];
    $training = Labeled::quick();
    foreach ($folds as $j => $f) {
        if ($j !== $i) {
            $training = $training->merge($f);
        }
    }
    $tree = new ClassificationTree(Svc::MAX_HEIGHT, Svc::MAX_LEAF_SIZE, Svc::MIN_PURITY_INCREASE);
    $tree->train($training);
    $p = $tree->predict($testing);
    $pr = array_map(fn ($p) => $svc->smoothProbabilities($p), $tree->proba($testing));
    $fm = metrics(confusion($testing->labels(), $p));
    $trainAcc[] = metrics(confusion($training->labels(), $tree->predict($training)))['accuracy'];
    $foldRows[] = [$i + 1, $training->numSamples(), $testing->numSamples(), $fm['accuracy'], $fm['macro']['f1'], $fm['kappa'], $fm['mcc']];
    array_push($cvActual, ...$testing->labels());
    array_push($cvPred, ...$p);
    array_push($cvProba, ...$pr);
}
$stat = function (array $v) {
    $mu = array_sum($v) / count($v);

    return [$mu, sqrt(array_sum(array_map(fn ($x) => ($x - $mu) ** 2, $v)) / (count($v) - 1))];
};

$out();
$out($line);
$out(sprintf('[2] STRATIFIED %d-FOLD CROSS VALIDATION (n = %d, hyperparameter sama dengan model produksi)', K, N_CV));
$out(sprintf('  %-5s %8s %8s %10s %10s %8s %8s', 'Fold', 'Train', 'Test', 'Accuracy', 'Macro F1', 'Kappa', 'MCC'));
foreach ($foldRows as $r) {
    $out(sprintf('  %-5d %8d %8d %10s %10s %8.4f %8.4f', $r[0], $r[1], $r[2], $pct($r[3]), $pct($r[4]), $r[5], $r[6]));
}
foreach (['Accuracy' => 3, 'Macro F1' => 4, 'Kappa' => 5, 'MCC' => 6] as $label => $col) {
    [$mu, $sd] = $stat(array_column($foldRows, $col));
    $out(sprintf('  %-28s : %.4f +/- %.4f', "Rata-rata $label (mean +/- std)", $mu, $sd));
}
[$trMu] = $stat($trainAcc);
[$teMu] = $stat(array_column($foldRows, 3));
$out(sprintf('  Akurasi data latih rata-rata : %s  vs  data uji %s  -> selisih (gap overfitting) %s', trim($pct($trMu)), trim($pct($teMu)), trim($pct($trMu - $teMu))));

$cvCm = confusion($cvActual, $cvPred);
$cvM = metrics($cvCm);
$out();
$out('  Confusion Matrix gabungan (out-of-fold, seluruh sampel):');
printMatrix($cvCm, $out);
$out();
$out('  Classification Report gabungan:');
printReport($cvM, $out, $pct);

// ---------------------------------------------------------------------------
// [3] Uji confidence: metrik probabilistik & kalibrasi
// ---------------------------------------------------------------------------
$out();
$out($line);
$out('[3] UJI CONFIDENCE SCORE (probabilitas) - DISKRIMINASI & KALIBRASI');
foreach (['Model produksi (hold-out n='.N_TEST.')' => [$proba, $pred, $test['labels']], 'Cross validation out-of-fold (n='.N_CV.')' => [$cvProba, $cvPred, $cvActual]] as $label => [$pb, $pd, $ac]) {
    $c = calibration($pb, $pd, $ac);
    $out();
    $out("  $label");
    $out('  ROC-AUC one-vs-rest : '.implode(' | ', array_map(fn ($k, $v) => sprintf('%s %.4f', $k, $v), array_keys($c['auc']), $c['auc'])).sprintf(' | macro %.4f', $c['auc_macro']));
    $out(sprintf('  Log loss            : %.4f   (semakin kecil semakin baik)', $c['log_loss']));
    $out(sprintf('  Brier score         : %.4f   (0 = sempurna, multikelas: rentang 0-2)', $c['brier']));
    $out(sprintf('  ECE (10 bin)        : %.4f   (selisih confidence vs akurasi aktual)', $c['ece']));
    $out(sprintf('  Rata-rata confidence: %s | saat prediksi benar %s | saat salah %s (%d prediksi salah)', trim($pct($c['conf_mean'])), trim($pct($c['conf_correct'])), trim($pct($c['conf_wrong'])), $c['n_wrong']));
    $out(sprintf('  Prediksi dengan confidence 100%%: %s', trim($pct($c['conf_100']))));
    $out('  Reliability table:');
    $out(sprintf('    %-12s %8s %16s %16s %10s', 'Bin conf', 'Jumlah', 'Rata2 confidence', 'Akurasi aktual', 'Selisih'));
    foreach ($c['table'] as [$bin, $cnt, $avgC, $acc]) {
        $out(sprintf('    %-12s %8d %16s %16s %10s', $bin, $cnt, $pct($avgC), $pct($acc), $pct($avgC - $acc)));
    }
}

$out();
$out($line);
$out('SELESAI');
