<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class CashFlowChartWidget extends ChartWidget
{
    protected ?string $heading = 'Grafik Arus Kas 6 Bulan Terakhir';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $userId = auth()->id();
        $labels = [];
        $incomeData = [];
        $expenseData = [];

        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $start = $month->copy()->startOfMonth();
            $end = $month->copy()->endOfMonth();

            $labels[] = $month->translatedFormat('M Y');

            $income = (float) Transaction::where('user_id', $userId)
                ->where('type', 'income')
                ->whereBetween('transaction_date', [$start, $end])
                ->sum('amount');

            $expense = (float) Transaction::where('user_id', $userId)
                ->where('type', 'expense')
                ->whereBetween('transaction_date', [$start, $end])
                ->sum('amount');

            $incomeData[] = $income;
            $expenseData[] = $expense;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Pemasukan (Rp)',
                    'data' => $incomeData,
                    'backgroundColor' => 'rgba(16, 185, 129, 0.85)',
                    'borderColor' => '#10b981',
                ],
                [
                    'label' => 'Pengeluaran (Rp)',
                    'data' => $expenseData,
                    'backgroundColor' => 'rgba(239, 68, 68, 0.85)',
                    'borderColor' => '#ef4444',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
