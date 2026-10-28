<?php

namespace App\Services\ML;

class DatasetGenerator
{
    /**
     * Generate synthetic but realistic UMKM financial dataset samples.
     *
     * @param  int  $count  Number of samples
     * @return array{samples: array<array<float>>, labels: array<string>}
     */
    public function generate(int $count = 1500): array
    {
        $samples = [];
        $labels = [];

        for ($i = 0; $i < $count; $i++) {
            // Skala pendapatan UMKM beragam: Rp 3.000.000 s/d Rp 150.000.000
            $totalIncome = (float) rand(3000, 150000) * 1000;

            // Generate expense ratio dengan variasi (0.30 s/d 1.40)
            $expenseRatio = rand(30, 140) / 100.0;

            // Tambahkan noise realistis
            $expenseRatio += (rand(-5, 5) / 100.0);
            $expenseRatio = max(0.20, min(1.60, round($expenseRatio, 4)));

            $totalExpense = round($totalIncome * $expenseRatio, 2);
            $netCashFlow = round($totalIncome - $totalExpense, 2);

            // Tren pendapatan & arus kas dibanding periode sebelumnya (-0.50 s/d +0.50)
            $incomeTrend = round(rand(-50, 50) / 100.0, 4);
            $cashFlowTrend = round(rand(-60, 60) / 100.0, 4);

            // Tentukan label ground-truth berdasarkan prinsip keuangan UMKM
            $label = $this->determineLabel($netCashFlow, $expenseRatio, $incomeTrend, $cashFlowTrend);

            // Fitur input: [total_income, total_expense, net_cash_flow, expense_ratio, income_trend, cash_flow_trend]
            $samples[] = [
                $totalIncome,
                $totalExpense,
                $netCashFlow,
                $expenseRatio,
                $incomeTrend,
                $cashFlowTrend,
            ];

            $labels[] = $label;
        }

        return [
            'samples' => $samples,
            'labels' => $labels,
        ];
    }

    /**
     * Ground truth labeling logic based on financial health indicators.
     */
    protected function determineLabel(float $netCashFlow, float $expenseRatio, float $incomeTrend, float $cashFlowTrend): string
    {
        if ($netCashFlow < 0 || $expenseRatio >= 0.95 || $cashFlowTrend <= -0.35) {
            return 'Berisiko';
        }

        if ($netCashFlow > 0 && $expenseRatio <= 0.75 && $incomeTrend >= -0.10 && $cashFlowTrend >= -0.10) {
            return 'Sehat';
        }

        return 'Perlu perhatian';
    }

    /**
     * Export generated dataset to CSV for inspection or external verification.
     */
    public function exportCsv(string $path, int $count = 1500): string
    {
        $dir = dirname($path);
        if (! is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $data = $this->generate($count);
        $fp = fopen($path, 'w');

        fputcsv($fp, [
            'total_income',
            'total_expense',
            'net_cash_flow',
            'expense_ratio',
            'income_trend',
            'cash_flow_trend',
            'label',
        ]);

        for ($i = 0; $i < count($data['samples']); $i++) {
            $row = $data['samples'][$i];
            $row[] = $data['labels'][$i];
            fputcsv($fp, $row);
        }

        fclose($fp);

        return $path;
    }
}
