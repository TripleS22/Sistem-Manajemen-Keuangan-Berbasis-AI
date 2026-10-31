<?php

/**
 * Pengujian langsung (live) fitur ML Decision Tree dan LLM (Groq / Llama).
 *
 * Jalankan dari root proyek:
 *   php dokumentasi/Dokumen_Pendukung/test_live_fitur.php
 *
 * Script ini TIDAK menulis ke database dan TIDAK melatih ulang model:
 * - Model yang diuji adalah model tersimpan: storage/app/ml/decision_tree.model
 * - Pemanggilan LLM memakai GROQ_API_KEY dari file .env
 */

use App\Models\BusinessProfile;
use App\Services\AI\GroqExplanationService;
use App\Services\ML\DatasetGenerator;
use App\Services\ML\FinancialDecisionTreeService;
use Rubix\ML\Datasets\Unlabeled;
use Rubix\ML\PersistentModel;
use Rubix\ML\Persisters\Filesystem;
use Rubix\ML\Serializers\Native;

require __DIR__.'/../../vendor/autoload.php';
$app = require __DIR__.'/../../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$line = str_repeat('=', 78);
$out = fn (string $s = '') => print($s.PHP_EOL);

$out($line);
$out('PENGUJIAN LANGSUNG FITUR ML (DECISION TREE) & AI (LLM)');
$out('Waktu uji : '.now()->format('Y-m-d H:i:s'));
$out('PHP       : '.PHP_VERSION);
$out($line);

// ---------------------------------------------------------------------------
// BAGIAN A - Evaluasi model tersimpan pada data uji baru (out-of-sample)
// ---------------------------------------------------------------------------
$out();
$out('[A] EVALUASI MODEL DECISION TREE TERSIMPAN PADA 1000 DATA UJI BARU');

$model = PersistentModel::load(new Filesystem(storage_path('app/ml/decision_tree.model')), new Native);
$data = app(DatasetGenerator::class)->generate(1000);

$t0 = microtime(true);
$pred = $model->predict(new Unlabeled($data['samples']));
$ms = (microtime(true) - $t0) * 1000;

$classes = ['Sehat', 'Perlu perhatian', 'Berisiko'];
$cm = [];
foreach ($classes as $a) {
    foreach ($classes as $p) {
        $cm[$a][$p] = 0;
    }
}
$correct = 0;
foreach ($data['labels'] as $i => $actual) {
    $cm[$actual][$pred[$i]]++;
    $correct += $actual === $pred[$i] ? 1 : 0;
}
$n = count($data['labels']);

$out(sprintf('Jumlah data uji     : %d', $n));
$out(sprintf('Prediksi benar      : %d', $correct));
$out(sprintf('Akurasi             : %.2f%%', $correct / $n * 100));
$out(sprintf('Waktu inferensi     : %.1f ms total (%.3f ms / sampel)', $ms, $ms / $n));
$out();
$out('Confusion Matrix (baris = label asli, kolom = prediksi):');
$out(sprintf('%-18s %10s %16s %10s', '', 'Sehat', 'Perlu perhatian', 'Berisiko'));
foreach ($classes as $a) {
    $out(sprintf('%-18s %10d %16d %10d', $a, $cm[$a]['Sehat'], $cm[$a]['Perlu perhatian'], $cm[$a]['Berisiko']));
}
$out();
$out(sprintf('%-18s %10s %10s %10s %8s', 'Kelas', 'Precision', 'Recall', 'F1-Score', 'Support'));
foreach ($classes as $c) {
    $tp = $cm[$c][$c];
    $fp = array_sum(array_column($cm, $c)) - $tp;
    $fn = array_sum($cm[$c]) - $tp;
    $p = $tp + $fp > 0 ? $tp / ($tp + $fp) : 0;
    $r = $tp + $fn > 0 ? $tp / ($tp + $fn) : 0;
    $f1 = $p + $r > 0 ? 2 * $p * $r / ($p + $r) : 0;
    $out(sprintf('%-18s %9.2f%% %9.2f%% %9.2f%% %8d', $c, $p * 100, $r * 100, $f1 * 100, array_sum($cm[$c])));
}

// ---------------------------------------------------------------------------
// BAGIAN B - Uji fitur prediksi dengan 3 skenario UMKM
// ---------------------------------------------------------------------------
$scenarios = [
    'Skenario 1 - Usaha sehat' => [
        'expected' => 'Sehat',
        'features' => ['total_income' => 25_000_000, 'total_expense' => 15_000_000, 'net_cash_flow' => 10_000_000, 'expense_ratio' => 0.60, 'income_trend' => 0.12, 'cash_flow_trend' => 0.08],
    ],
    'Skenario 2 - Margin tipis' => [
        'expected' => 'Perlu perhatian',
        'features' => ['total_income' => 20_000_000, 'total_expense' => 17_000_000, 'net_cash_flow' => 3_000_000, 'expense_ratio' => 0.85, 'income_trend' => -0.05, 'cash_flow_trend' => -0.15],
    ],
    'Skenario 3 - Defisit' => [
        'expected' => 'Berisiko',
        'features' => ['total_income' => 12_000_000, 'total_expense' => 15_000_000, 'net_cash_flow' => -3_000_000, 'expense_ratio' => 1.25, 'income_trend' => -0.30, 'cash_flow_trend' => -0.50],
    ],
];

$out();
$out($line);
$out('[B] UJI FITUR PREDIKSI (FinancialDecisionTreeService::predict)');
$ml = app(FinancialDecisionTreeService::class);
$mlResults = [];
foreach ($scenarios as $name => $s) {
    $r = $ml->predict($s['features']);
    $mlResults[$name] = $r;
    $f = $s['features'];
    $out();
    $out($name);
    $out(sprintf('  Input     : pemasukan Rp %s | pengeluaran Rp %s | rasio %.2f | tren omzet %+.0f%% | tren kas %+.0f%%',
        number_format($f['total_income'], 0, ',', '.'), number_format($f['total_expense'], 0, ',', '.'),
        $f['expense_ratio'], $f['income_trend'] * 100, $f['cash_flow_trend'] * 100));
    $out(sprintf('  Harapan   : %s', $s['expected']));
    $out(sprintf('  Prediksi  : %s (confidence %.2f%%)  => %s', $r['prediction'], $r['confidence'] * 100, $r['prediction'] === $s['expected'] ? 'LULUS' : 'TIDAK SESUAI'));
    $out('  Probabilitas: '.implode(', ', array_map(fn ($k, $v) => "$k=".round($v * 100, 1).'%', array_keys($r['probabilities']), $r['probabilities'])));
    foreach ($r['key_factors'] as $kf) {
        $out('   - '.$kf);
    }
}

// ---------------------------------------------------------------------------
// BAGIAN C - Uji fitur penjelasan LLM via Groq (model Llama)
// ---------------------------------------------------------------------------
$out();
$out($line);
$out('[C] UJI FITUR PENJELASAN AI (GroqExplanationService::explain) - PANGGILAN API ASLI');

$profile = new BusinessProfile(['business_name' => 'Warung Kopi Sejahtera', 'business_type' => 'Kuliner']);
$models = array_unique(['llama-3.3-70b-versatile', config('services.groq.model')]);

foreach ($models as $llmModel) {
    config(['services.groq.model' => $llmModel]);
    foreach ($scenarios as $name => $s) {
        $t0 = microtime(true);
        $res = app(GroqExplanationService::class)->explain($profile, $s['features'], $mlResults[$name]);
        $sec = microtime(true) - $t0;

        $text = $res['explanation'];
        $netStr = number_format($s['features']['net_cash_flow'], 0, ',', '.');
        $checks = [
            'Status success (bukan fallback)' => $res['status'] === 'success',
            'Output JSON berisi explanation' => strlen($text) > 50,
            'Rekomendasi >= 3 poin' => count($res['recommendations']) >= 3,
            'Label model tidak diubah' => stripos($text, $mlResults[$name]['prediction']) !== false,
            'Angka arus kas sesuai data' => str_contains($text, ltrim($netStr, '-')),
        ];

        $out();
        $out(sprintf('Model: %s | %s | waktu respon %.2f detik', $llmModel, $name, $sec));
        $out('  Provider : '.$res['provider']);
        foreach ($checks as $label => $ok) {
            $out(sprintf('  [%s] %s', $ok ? 'LULUS' : 'GAGAL', $label));
        }
        $out('  Penjelasan:');
        $out('    '.wordwrap($text, 100, PHP_EOL.'    '));
        $out('  Rekomendasi:');
        foreach ($res['recommendations'] as $i => $rec) {
            $out('    '.($i + 1).'. '.$rec);
        }
    }
}

// ---------------------------------------------------------------------------
// BAGIAN D - Uji ketahanan: API key salah => fallback rule-based
// ---------------------------------------------------------------------------
$out();
$out($line);
$out('[D] UJI KETAHANAN - API KEY TIDAK VALID (harus fallback, aplikasi tetap jalan)');
config(['services.groq.api_key' => 'gsk_invalid_key_for_testing']);
$name = array_key_first($scenarios);
$res = app(GroqExplanationService::class)->explain($profile, $scenarios[$name]['features'], $mlResults[$name]);
$out('  Status   : '.$res['status']);
$out('  Provider : '.$res['provider']);
$out(sprintf('  [%s] Sistem tetap mengembalikan penjelasan & %d rekomendasi', $res['status'] === 'fallback' ? 'LULUS' : 'GAGAL', count($res['recommendations'])));

$out();
$out($line);
$out('SELESAI');
