<?php

namespace App\Console\Commands;

use App\Services\ML\FinancialDecisionTreeService;
use Illuminate\Console\Command;

class TrainDecisionTreeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ml:train-decision-tree {--samples=1500 : Number of training samples}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Train the Decision Tree model for UMKM financial classification and output evaluation metrics';

    /**
     * Execute the console command.
     */
    public function handle(FinancialDecisionTreeService $service): int
    {
        $samples = (int) $this->option('samples');
        $this->info("Melatih Decision Tree Classifier dengan $samples sampel data UMKM...");

        $result = $service->train($samples);

        $this->newLine();
        $this->info('=== HASIL EVALUASI MODEL DECISION TREE ===');
        $this->table(
            ['Metrik', 'Nilai'],
            [
                ['Sampel Training (80%)', $result['train_samples_count']],
                ['Sampel Testing (20%)', $result['test_samples_count']],
                ['Akurasi Testing (Accuracy)', ($result['accuracy'] * 100).'%'],
            ]
        );

        $this->newLine();
        $this->info('=== BREAKDOWN PRECISI / RECALL / F1-SCORE ===');
        $classes = ['Sehat', 'Perlu perhatian', 'Berisiko'];
        $reportData = [];

        foreach ($classes as $cls) {
            $classReport = $result['report']['classes'][$cls] ?? [];
            $reportData[] = [
                $cls,
                isset($classReport['precision']) ? round($classReport['precision'] * 100, 2).'%' : 'N/A',
                isset($classReport['recall']) ? round($classReport['recall'] * 100, 2).'%' : 'N/A',
                isset($classReport['f1_score']) ? round($classReport['f1_score'] * 100, 2).'%' : 'N/A',
                $classReport['cardinality'] ?? '—',
            ];
        }

        $this->table(
            ['Kelas', 'Precision', 'Recall', 'F1-Score', 'Jumlah Sampel Uji'],
            $reportData
        );

        $this->newLine();
        $this->info('Model berhasil disimpan ke disk di storage/app/ml/decision_tree.model');

        return Command::SUCCESS;
    }
}
