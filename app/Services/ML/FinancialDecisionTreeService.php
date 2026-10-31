<?php

namespace App\Services\ML;

use App\Models\Transaction;
use Carbon\Carbon;
use Rubix\ML\Classifiers\ClassificationTree;
use Rubix\ML\CrossValidation\Metrics\Accuracy;
use Rubix\ML\CrossValidation\Reports\ConfusionMatrix;
use Rubix\ML\CrossValidation\Reports\MulticlassBreakdown;
use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Datasets\Unlabeled;
use Rubix\ML\PersistentModel;
use Rubix\ML\Persisters\Filesystem;
use Rubix\ML\Serializers\Native;

class FinancialDecisionTreeService
{
    public const MODEL_VERSION = '1.1.0 (Decision Tree)';

    // Hyperparameter dipilih lewat stratified 5-fold cross validation
    public const MAX_HEIGHT = 10;

    public const MAX_LEAF_SIZE = 5;

    public const MIN_PURITY_INCREASE = 1e-4;

    public const TRAINING_SAMPLES = 5000;

    // Additive smoothing probabilitas daun agar confidence tidak overconfident (100%)
    public const PROBABILITY_SMOOTHING = 0.02;

    protected string $modelPath;

    public function __construct(
        protected DatasetGenerator $datasetGenerator
    ) {
        $this->modelPath = storage_path('app/ml/decision_tree.model');
    }

    /**
     * Train the Decision Tree classifier, evaluate performance, and save the model.
     *
     * @return array{
     *     accuracy: float,
     *     confusion_matrix: array<string, array<string, int>>,
     *     report: array<string, mixed>,
     *     train_samples_count: int,
     *     test_samples_count: int
     * }
     */
    public function train(int $sampleCount = self::TRAINING_SAMPLES, float $testSplit = 0.2): array
    {
        $dir = dirname($this->modelPath);
        if (! is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $generated = $this->datasetGenerator->generate($sampleCount);
        $dataset = new Labeled($generated['samples'], $generated['labels']);

        // Stratified split: training (80%) dan testing (20%) dengan proporsi kelas yang sama
        [$training, $testing] = $dataset->randomize()->stratifiedSplit(1.0 - $testSplit);

        // Inisialisasi Decision Tree Classifier
        // Max height = 10, max leaf size = 5 untuk mencegah overfitting
        $tree = new ClassificationTree(self::MAX_HEIGHT, self::MAX_LEAF_SIZE, self::MIN_PURITY_INCREASE);
        $estimator = new PersistentModel(
            $tree,
            new Filesystem($this->modelPath),
            new Native
        );

        // Latih model pada training set
        $estimator->train($training);

        // Evaluasi model pada testing set terpisah (Out-of-sample evaluation)
        $predictions = $estimator->predict($testing);

        $accuracyMetric = new Accuracy;
        $accuracy = $accuracyMetric->score($predictions, $testing->labels());

        $confusionMatrixReport = new ConfusionMatrix;
        $confusionMatrix = $confusionMatrixReport->generate($predictions, $testing->labels());

        $breakdownReport = new MulticlassBreakdown;
        $report = $breakdownReport->generate($predictions, $testing->labels());

        // Simpan model ke disk
        $estimator->save();

        return [
            'accuracy' => round($accuracy, 4),
            'confusion_matrix' => $confusionMatrix,
            'report' => $report,
            'train_samples_count' => $training->numSamples(),
            'test_samples_count' => $testing->numSamples(),
        ];
    }

    /**
     * Load trained model from disk or train if not present.
     */
    protected function getEstimator(): PersistentModel
    {
        if (! file_exists($this->modelPath)) {
            $this->train();
        }

        return PersistentModel::load(
            new Filesystem($this->modelPath),
            new Native
        );
    }

    /**
     * Calculate 6 financial features from real transactions for a given period.
     *
     * @return array{
     *     total_income: float,
     *     total_expense: float,
     *     net_cash_flow: float,
     *     expense_ratio: float,
     *     income_trend: float,
     *     cash_flow_trend: float
     * }
     */
    public function extractFeatures(?int $userId, Carbon $periodStart, Carbon $periodEnd): array
    {
        $baseQuery = fn () => Transaction::query()->when($userId !== null, fn ($q) => $q->where('user_id', $userId));

        // Periode saat ini
        $income = (float) $baseQuery()
            ->where('type', 'income')
            ->whereBetween('transaction_date', [$periodStart, $periodEnd])
            ->sum('amount');

        $expense = (float) $baseQuery()
            ->where('type', 'expense')
            ->whereBetween('transaction_date', [$periodStart, $periodEnd])
            ->sum('amount');

        $netCashFlow = $income - $expense;
        $expenseRatio = $income > 0 ? round($expense / $income, 4) : ($expense > 0 ? 1.5 : 0.0);

        // Hitung periode sebelumnya dengan durasi yang sama untuk perbandingan tren
        $durationInDays = $periodStart->diffInDays($periodEnd) + 1;
        $previousStart = $periodStart->copy()->subDays($durationInDays);
        $previousEnd = $periodStart->copy()->subDay();

        $prevIncome = (float) $baseQuery()
            ->where('type', 'income')
            ->whereBetween('transaction_date', [$previousStart, $previousEnd])
            ->sum('amount');

        $prevExpense = (float) $baseQuery()
            ->where('type', 'expense')
            ->whereBetween('transaction_date', [$previousStart, $previousEnd])
            ->sum('amount');

        $prevNetCashFlow = $prevIncome - $prevExpense;

        // Hitung tren (persentase perubahan)
        $incomeTrend = $prevIncome > 0
            ? round(($income - $prevIncome) / $prevIncome, 4)
            : ($income > 0 ? 0.20 : 0.0);

        $cashFlowTrend = abs($prevNetCashFlow) > 0
            ? round(($netCashFlow - $prevNetCashFlow) / abs($prevNetCashFlow), 4)
            : ($netCashFlow > 0 ? 0.20 : ($netCashFlow < 0 ? -0.20 : 0.0));

        return [
            'total_income' => round($income, 2),
            'total_expense' => round($expense, 2),
            'net_cash_flow' => round($netCashFlow, 2),
            'expense_ratio' => $expenseRatio,
            'income_trend' => $incomeTrend,
            'cash_flow_trend' => $cashFlowTrend,
        ];
    }

    /**
     * Run prediction using the genuine trained Decision Tree classifier.
     *
     * @param  array<string, float>  $features
     * @return array{
     *     prediction: string,
     *     probabilities: array<string, float>,
     *     confidence: float,
     *     key_factors: array<string>
     * }
     */
    public function predict(array $features): array
    {
        $estimator = $this->getEstimator();

        $sample = [
            $features['total_income'],
            $features['total_expense'],
            $features['net_cash_flow'],
            $features['expense_ratio'],
            $features['income_trend'],
            $features['cash_flow_trend'],
        ];

        $unlabeled = new Unlabeled([$sample]);

        $predictions = $estimator->predict($unlabeled);
        $prediction = $predictions[0];

        $probabilitiesList = $estimator->proba($unlabeled);
        $probabilities = $this->smoothProbabilities($probabilitiesList[0]);

        $confidence = isset($probabilities[$prediction]) ? (float) $probabilities[$prediction] : 0.90;

        // Analisis faktor penentu keputusan Decision Tree
        $keyFactors = $this->determineKeyFactors($features, $prediction);

        return [
            'prediction' => $prediction,
            'probabilities' => $probabilities,
            'confidence' => round($confidence, 4),
            'key_factors' => $keyFactors,
        ];
    }

    /**
     * Apply additive smoothing to leaf probabilities: p' = (1 - ε) · p + ε / K.
     * Urutan kelas (dan hasil prediksi) tidak berubah, hanya confidence yang dikalibrasi.
     *
     * @param  array<string, float>  $probabilities
     * @return array<string, float>
     */
    public function smoothProbabilities(array $probabilities): array
    {
        $classCount = count($probabilities);

        return array_map(
            fn (float $p) => (1 - self::PROBABILITY_SMOOTHING) * $p + self::PROBABILITY_SMOOTHING / $classCount,
            $probabilities
        );
    }

    /**
     * Determine key drivers from features that swayed the Decision Tree branch.
     *
     * @param  array<string, float>  $features
     * @return array<string>
     */
    protected function determineKeyFactors(array $features, string $prediction): array
    {
        $factors = [];

        if ($features['net_cash_flow'] < 0) {
            $factors[] = 'Arus kas operasional negatif (defisit Rp '.number_format(abs($features['net_cash_flow']), 0, ',', '.').')';
        } else {
            $factors[] = 'Arus kas operasional positif (surplus Rp '.number_format($features['net_cash_flow'], 0, ',', '.').')';
        }

        $expensePercentage = round($features['expense_ratio'] * 100, 1);
        if ($features['expense_ratio'] >= 0.90) {
            $factors[] = "Rasio pengeluaran tinggi ($expensePercentage%), menyerap hampir seluruh atau melebihi pemasukan";
        } elseif ($features['expense_ratio'] <= 0.70) {
            $factors[] = "Rasio pengeluaran efisien ($expensePercentage%), menyisakan margin kas yang sehat";
        } else {
            $factors[] = "Rasio pengeluaran moderat ($expensePercentage%), ruang cadangan kas terbatas";
        }

        if ($features['income_trend'] < -0.15) {
            $drop = abs(round($features['income_trend'] * 100, 1));
            $factors[] = "Penurunan omzet pemasukan sebesar $drop% dibanding periode sebelumnya";
        } elseif ($features['income_trend'] > 0.15) {
            $rise = round($features['income_trend'] * 100, 1);
            $factors[] = "Pertumbuhan omzet pemasukan sebesar $rise% dibanding periode sebelumnya";
        }

        if ($features['cash_flow_trend'] < -0.25) {
            $drop = abs(round($features['cash_flow_trend'] * 100, 1));
            $factors[] = "Penurunan arus kas bersih sebesar $drop%";
        }

        return $factors;
    }
}
