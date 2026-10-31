<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use App\Support\DashboardPeriod;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class CashFlowChartWidget extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?bool $isLazyLoaded = false;

    protected ?string $heading = 'Grafik Arus Kas';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $userId = \App\Support\TenantContext::getActiveTenantId() ?? auth()->id();
        $labels = [];
        $incomeData = [];
        $expenseData = [];

        // Untuk periode setahun, tampilkan 12 bulan kalender tahun berjalan;
        // untuk periode lainnya, tampilkan jendela 6 bulan yang berakhir pada bulan periode terpilih.
        $period = DashboardPeriod::resolve($this->pageFilters['period'] ?? 'this_month');
        $endMonth = $period['end']->copy()->startOfMonth();
        $monthCount = ($this->pageFilters['period'] ?? 'this_month') === 'this_year' ? 12 : 6;

        for ($i = $monthCount - 1; $i >= 0; $i--) {
            $month = $endMonth->copy()->subMonths($i);
            $start = $month->copy()->startOfMonth();
            $end = $month->copy()->endOfMonth();

            $labels[] = $month->translatedFormat($monthCount > 6 ? 'M' : 'M Y');

            $income = (float) Transaction::query()
                ->where('user_id', $userId)
                ->where('type', 'income')
                ->whereBetween('transaction_date', [$start, $end])
                ->sum('amount');

            $expense = (float) Transaction::query()
                ->where('user_id', $userId)
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
