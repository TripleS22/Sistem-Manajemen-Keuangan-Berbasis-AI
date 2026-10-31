<?php

namespace Tests\Unit;

use App\Services\ML\DatasetGenerator;
use App\Services\ML\FinancialDecisionTreeService;
use Rubix\ML\Classifiers\ClassificationTree;
use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Datasets\Unlabeled;
use Rubix\ML\PersistentModel;
use Rubix\ML\Persisters\Filesystem;
use Rubix\ML\Serializers\Native;
use Tests\TestCase;

/**
 * FR-05: Evaluasi standar Decision Tree – confusion matrix, metrik klasifikasi,
 * stratified cross validation, dan validitas confidence score.
 * Tidak menimpa model produksi di storage/app/ml/decision_tree.model.
 */
class DecisionTreeEvaluationTest extends TestCase
{
    private const CLASSES = ['Sehat', 'Perlu perhatian', 'Berisiko'];

    private static ?array $holdOut = null;

    /**
     * Prediksi model produksi pada 1000 data uji independen dengan seed tetap.
     *
     * @return array{actual: array<string>, pred: array<string>, proba: array<array<string, float>>}
     */
    private function holdOut(): array
    {
        if (self::$holdOut === null) {
            mt_srand(2026);
            $data = app(DatasetGenerator::class)->generate(1000);
            $model = PersistentModel::load(new Filesystem(storage_path('app/ml/decision_tree.model')), new Native);
            $samples = new Unlabeled($data['samples']);

            self::$holdOut = [
                'actual' => $data['labels'],
                'pred' => $model->predict($samples),
                'proba' => $model->proba($samples),
            ];
        }

        return self::$holdOut;
    }

    /**
     * @param  array<string>  $actual
     * @param  array<string>  $pred
     * @return array<string, array<string, int>>
     */
    private function confusionMatrix(array $actual, array $pred): array
    {
        $cm = array_fill_keys(self::CLASSES, array_fill_keys(self::CLASSES, 0));
        foreach ($actual as $i => $label) {
            $cm[$label][$pred[$i]]++;
        }

        return $cm;
    }

    /**
     * @param  array<string, array<string, int>>  $cm
     * @return array<string, array{precision: float, recall: float, f1: float}>
     */
    private function perClassMetrics(array $cm): array
    {
        $result = [];
        foreach (self::CLASSES as $class) {
            $tp = $cm[$class][$class];
            $predicted = array_sum(array_column($cm, $class));
            $actual = array_sum($cm[$class]);
            $precision = $predicted ? $tp / $predicted : 0.0;
            $recall = $actual ? $tp / $actual : 0.0;
            $result[$class] = [
                'precision' => $precision,
                'recall' => $recall,
                'f1' => $precision + $recall ? 2 * $precision * $recall / ($precision + $recall) : 0.0,
            ];
        }

        return $result;
    }

    /** @param array<string, array<string, int>> $cm */
    private function accuracy(array $cm): float
    {
        $correct = array_sum(array_map(fn ($c) => $cm[$c][$c], self::CLASSES));

        return $correct / array_sum(array_map('array_sum', $cm));
    }

    /** @test */
    public function test_confusion_matrix_is_square_and_totals_match_samples(): void
    {
        $data = $this->holdOut();
        $cm = $this->confusionMatrix($data['actual'], $data['pred']);

        $this->assertSame(self::CLASSES, array_keys($cm));
        foreach ($cm as $row) {
            $this->assertSame(self::CLASSES, array_keys($row));
        }
        $this->assertSame(count($data['actual']), array_sum(array_map('array_sum', $cm)));

        // Total per baris = jumlah label aktual tiap kelas
        $counts = array_count_values($data['actual']);
        foreach (self::CLASSES as $class) {
            $this->assertSame($counts[$class] ?? 0, array_sum($cm[$class]));
        }
    }

    /** @test */
    public function test_production_model_accuracy_meets_threshold_and_beats_baseline(): void
    {
        $data = $this->holdOut();
        $accuracy = $this->accuracy($this->confusionMatrix($data['actual'], $data['pred']));
        $baseline = max(array_count_values($data['actual'])) / count($data['actual']);

        $this->assertGreaterThanOrEqual(0.85, $accuracy);
        $this->assertGreaterThan($baseline + 0.20, $accuracy, 'Model harus jauh lebih baik dari tebakan kelas mayoritas');
    }

    /** @test */
    public function test_production_model_per_class_metrics_meet_thresholds(): void
    {
        $data = $this->holdOut();
        $metrics = $this->perClassMetrics($this->confusionMatrix($data['actual'], $data['pred']));

        foreach ($metrics as $class => $m) {
            $this->assertGreaterThanOrEqual(0.75, $m['precision'], "Precision $class");
            $this->assertGreaterThanOrEqual(0.75, $m['recall'], "Recall $class");
            $this->assertGreaterThanOrEqual(0.75, $m['f1'], "F1 $class");
        }

        // Kelas Berisiko paling kritis untuk peringatan dini: recall minimal 90%
        $this->assertGreaterThanOrEqual(0.90, $metrics['Berisiko']['recall']);

        $macroF1 = array_sum(array_column($metrics, 'f1')) / count($metrics);
        $this->assertGreaterThanOrEqual(0.85, $macroF1);
    }

    /** @test */
    public function test_probabilities_are_valid_distributions_and_match_prediction(): void
    {
        $data = $this->holdOut();

        foreach ($data['proba'] as $i => $dist) {
            $this->assertEqualsCanonicalizing(self::CLASSES, array_keys($dist));
            foreach ($dist as $p) {
                $this->assertGreaterThanOrEqual(0.0, $p);
                $this->assertLessThanOrEqual(1.0, $p);
            }
            $this->assertEqualsWithDelta(1.0, array_sum($dist), 1e-6);

            // Kelas prediksi selalu memiliki probabilitas tertinggi
            $this->assertEqualsWithDelta(max($dist), $dist[$data['pred'][$i]], 1e-9);
        }
    }

    /** @test */
    public function test_confidence_is_higher_for_correct_predictions_than_wrong_ones(): void
    {
        $data = $this->holdOut();
        $correct = [];
        $wrong = [];

        foreach ($data['pred'] as $i => $pred) {
            $confidence = $data['proba'][$i][$pred];
            $pred === $data['actual'][$i] ? $correct[] = $confidence : $wrong[] = $confidence;
        }

        $this->assertNotEmpty($correct);
        $this->assertNotEmpty($wrong);
        $this->assertGreaterThan(array_sum($wrong) / count($wrong), array_sum($correct) / count($correct));
    }

    /** @test */
    public function test_smoothed_confidence_is_calibrated_and_never_absolute(): void
    {
        $data = $this->holdOut();
        $service = app(FinancialDecisionTreeService::class);
        $n = count($data['actual']);
        $bins = [];

        foreach ($data['pred'] as $i => $pred) {
            $dist = $service->smoothProbabilities($data['proba'][$i]);
            $confidence = $dist[$pred];

            $this->assertLessThan(1.0, $confidence, 'Confidence tidak boleh 100%');
            $this->assertEqualsWithDelta(1.0, array_sum($dist), 1e-6);
            $this->assertSame($pred, array_search(max($dist), $dist, true), 'Smoothing tidak boleh mengubah prediksi');

            $bin = min(9, (int) floor($confidence * 10));
            $bins[$bin][] = [$confidence, $pred === $data['actual'][$i] ? 1.0 : 0.0];
        }

        // Expected Calibration Error (10 bin)
        $ece = 0.0;
        foreach ($bins as $items) {
            $meanConfidence = array_sum(array_column($items, 0)) / count($items);
            $accuracy = array_sum(array_column($items, 1)) / count($items);
            $ece += count($items) / $n * abs($accuracy - $meanConfidence);
        }

        $this->assertLessThanOrEqual(0.05, $ece, 'ECE harus <= 0.05 (terkalibrasi baik)');
    }

    /** @test */
    public function test_service_confidence_equals_probability_of_predicted_class(): void
    {
        $result = app(FinancialDecisionTreeService::class)->predict([
            'total_income' => 20_000_000,
            'total_expense' => 17_000_000,
            'net_cash_flow' => 3_000_000,
            'expense_ratio' => 0.85,
            'income_trend' => -0.05,
            'cash_flow_trend' => -0.15,
        ]);

        $this->assertContains($result['prediction'], self::CLASSES);
        $this->assertGreaterThanOrEqual(0.0, $result['confidence']);
        $this->assertLessThanOrEqual(1.0, $result['confidence']);
        $this->assertEqualsWithDelta(round($result['probabilities'][$result['prediction']], 4), $result['confidence'], 1e-9);
    }

    /** @test */
    public function test_stratified_five_fold_cross_validation_is_stable(): void
    {
        mt_srand(42);
        $data = app(DatasetGenerator::class)->generate(1000);
        $folds = (new Labeled($data['samples'], $data['labels']))->randomize()->stratifiedFold(5);

        $scores = [];
        foreach ($folds as $i => $testing) {
            $training = Labeled::quick();
            foreach ($folds as $j => $fold) {
                if ($j !== $i) {
                    $training = $training->merge($fold);
                }
            }

            $tree = new ClassificationTree(
                FinancialDecisionTreeService::MAX_HEIGHT,
                FinancialDecisionTreeService::MAX_LEAF_SIZE,
                FinancialDecisionTreeService::MIN_PURITY_INCREASE
            );
            $tree->train($training);
            $scores[] = $this->accuracy($this->confusionMatrix($testing->labels(), $tree->predict($testing)));
        }

        $mean = array_sum($scores) / count($scores);
        $std = sqrt(array_sum(array_map(fn ($s) => ($s - $mean) ** 2, $scores)) / (count($scores) - 1));

        $this->assertGreaterThanOrEqual(0.85, $mean);
        $this->assertLessThanOrEqual(0.06, $std, 'Akurasi antar-fold harus stabil');
        $this->assertGreaterThanOrEqual(0.80, min($scores));
    }
}
