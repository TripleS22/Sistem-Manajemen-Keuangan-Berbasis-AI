<?php

namespace App\Filament\Widgets;

use App\Models\FinancialAnalysis;
use App\Models\Transaction;
use App\Support\DashboardPeriod;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class FinancialOverviewWidget extends BaseWidget
{
    use InteractsWithPageFilters;

    protected static ?bool $isLazyLoaded = false;

    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $userId = \App\Support\TenantContext::getActiveTenantId() ?? auth()->id();

        $period = DashboardPeriod::resolve($this->pageFilters['period'] ?? 'this_month');
        [$start, $end] = [$period['start'], $period['end']];

        $txQuery = Transaction::query()->where('user_id', $userId);

        $income = (float) (clone $txQuery)
            ->where('type', 'income')
            ->whereBetween('transaction_date', [$start, $end])
            ->sum('amount');

        $expense = (float) (clone $txQuery)
            ->where('type', 'expense')
            ->whereBetween('transaction_date', [$start, $end])
            ->sum('amount');

        $netCashFlow = $income - $expense;

        $latestAnalysis = FinancialAnalysis::query()
            ->where('user_id', $userId)
            ->latest()
            ->first();

        $statusLabel = $latestAnalysis ? $latestAnalysis->prediction_label : 'Belum Ada Analisis';
        $statusColor = match (strtolower($statusLabel)) {
            'sehat' => 'success',
            'perlu perhatian' => 'warning',
            'berisiko' => 'danger',
            default => 'gray',
        };

        return [
            Stat::make('Total Pemasukan', 'Rp '.number_format($income, 0, ',', '.'))
                ->description($period['label'])
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),

            Stat::make('Total Pengeluaran', 'Rp '.number_format($expense, 0, ',', '.'))
                ->description($period['label'])
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),

            Stat::make('Arus Kas Bersih (Net Cash Flow)', 'Rp '.number_format($netCashFlow, 0, ',', '.'))
                ->description($netCashFlow >= 0 ? 'Surplus Operasional' : 'Defisit Operasional')
                ->descriptionIcon($netCashFlow >= 0 ? 'heroicon-m-check-circle' : 'heroicon-m-exclamation-triangle')
                ->color($netCashFlow >= 0 ? 'success' : 'danger'),

            Stat::make('Kesehatan Keuangan AI', $statusLabel)
                ->description($latestAnalysis ? 'Hasil klasifikasi Decision Tree' : 'Jalankan analisis AI')
                ->descriptionIcon('heroicon-m-sparkles')
                ->color($statusColor),
        ];
    }
}
