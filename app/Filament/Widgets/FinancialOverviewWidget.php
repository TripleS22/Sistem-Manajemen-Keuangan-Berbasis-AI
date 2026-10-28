<?php

namespace App\Filament\Widgets;

use App\Models\FinancialAnalysis;
use App\Models\Transaction;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class FinancialOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $userId = auth()->id();
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $monthlyIncome = (float) Transaction::where('user_id', $userId)
            ->where('type', 'income')
            ->whereBetween('transaction_date', [$startOfMonth, $endOfMonth])
            ->sum('amount');

        $monthlyExpense = (float) Transaction::where('user_id', $userId)
            ->where('type', 'expense')
            ->whereBetween('transaction_date', [$startOfMonth, $endOfMonth])
            ->sum('amount');

        $netCashFlow = $monthlyIncome - $monthlyExpense;

        $latestAnalysis = FinancialAnalysis::where('user_id', $userId)
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
            Stat::make('Pemasukan Bulan Ini', 'Rp '.number_format($monthlyIncome, 0, ',', '.'))
                ->description($startOfMonth->format('d M').' - '.$endOfMonth->format('d M Y'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),

            Stat::make('Pengeluaran Bulan Ini', 'Rp '.number_format($monthlyExpense, 0, ',', '.'))
                ->description($startOfMonth->format('d M').' - '.$endOfMonth->format('d M Y'))
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
