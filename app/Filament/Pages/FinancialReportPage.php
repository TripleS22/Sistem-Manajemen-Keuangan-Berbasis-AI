<?php

namespace App\Filament\Pages;

use App\Models\BusinessProfile;
use App\Models\Transaction;
use BackedEnum;
use Carbon\Carbon;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Symfony\Component\HttpFoundation\StreamedResponse;
use UnitEnum;
use YacoubAlhaidari\FilamentTour\Concerns\HasTourSteps;

class FinancialReportPage extends Page
{
    use HasTourSteps;

    public static function getTourStepId(): ?string
    {
        return 'financial-report';
    }

    public static function getTourStepTitle(): ?string
    {
        return 'Laporan Keuangan & Cetak PDF';
    }

    public static function getTourStepDescription(): ?string
    {
        return 'Tinjau performa keuangan berkala (Laba Rugi & Arus Kas) serta cetak laporan resmi usaha.';
    }

    public static function getTourStepFeatures(): array
    {
        return [
            'Filter periode laporan bulanan, tahunan, atau rentang tanggal kustom',
            'Rekapitulasi Laba/Rugi bersih dan rincian per kategori transaksi',
            'Cetak dokumen laporan keuangan resmi siap cetak / simpan ke format PDF',
        ];
    }

    public static function getTourStepSort(): int
    {
        return 60;
    }

    protected static ?string $title = 'Laporan Keuangan';

    protected static ?string $navigationLabel = 'Laporan Keuangan';

    protected static string|UnitEnum|null $navigationGroup = 'Laporan & Analisis AI';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentChartBar;

    protected static ?int $navigationSort = 1;

    protected string $view = 'filament.pages.financial-report-page';

    public string $period = 'this_month';

    public ?string $startDate = null;

    public ?string $endDate = null;

    public function mount(): void
    {
        $this->setPeriodDates();
    }

    public function updatedPeriod(): void
    {
        $this->setPeriodDates();
    }

    public function updatedStartDate(): void
    {
        $this->period = 'custom';
    }

    public function updatedEndDate(): void
    {
        $this->period = 'custom';
    }

    protected function setPeriodDates(): void
    {
        $now = Carbon::now();

        match ($this->period) {
            'today' => [
                $this->startDate = $now->copy()->format('Y-m-d'),
                $this->endDate = $now->copy()->format('Y-m-d'),
            ],
            'this_month' => [
                $this->startDate = $now->copy()->startOfMonth()->format('Y-m-d'),
                $this->endDate = $now->copy()->endOfMonth()->format('Y-m-d'),
            ],
            'last_month' => [
                $this->startDate = $now->copy()->subMonth()->startOfMonth()->format('Y-m-d'),
                $this->endDate = $now->copy()->subMonth()->endOfMonth()->format('Y-m-d'),
            ],
            'this_year' => [
                $this->startDate = $now->copy()->startOfYear()->format('Y-m-d'),
                $this->endDate = $now->copy()->endOfYear()->format('Y-m-d'),
            ],
            default => null,
        };
    }

    /**
     * @return array<string, mixed>
     */
    public function getReportData(): array
    {
        $userId = \App\Support\TenantContext::getActiveTenantId() ?? auth()->id();
        $start = Carbon::parse($this->startDate)->startOfDay();
        $end = Carbon::parse($this->endDate)->endOfDay();

        $transactionsQuery = Transaction::with('category')
            ->where('user_id', $userId)
            ->whereBetween('transaction_date', [$start, $end]);

        $transactions = (clone $transactionsQuery)
            ->orderBy('transaction_date', 'asc')
            ->get();

        $totalIncome = (float) (clone $transactionsQuery)->where('type', 'income')->sum('amount');
        $totalExpense = (float) (clone $transactionsQuery)->where('type', 'expense')->sum('amount');
        $netCashFlow = $totalIncome - $totalExpense;
        $expenseRatio = $totalIncome > 0 ? ($totalExpense / $totalIncome) : 0;

        // Group by category
        $categoryBreakdown = [];
        foreach ($transactions as $t) {
            $catName = $t->category?->name ?? 'Tanpa Kategori';
            if (! isset($categoryBreakdown[$catName])) {
                $categoryBreakdown[$catName] = [
                    'name' => $catName,
                    'type' => $t->type,
                    'total' => 0,
                    'count' => 0,
                ];
            }
            $categoryBreakdown[$catName]['total'] += (float) $t->amount;
            $categoryBreakdown[$catName]['count']++;
        }

        $businessProfile = BusinessProfile::where('user_id', $userId)->first();

        return [
            'startDate' => $start->format('d M Y'),
            'endDate' => $end->format('d M Y'),
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense,
            'netCashFlow' => $netCashFlow,
            'expenseRatio' => $expenseRatio,
            'transactions' => $transactions,
            'categoryBreakdown' => $categoryBreakdown,
            'businessProfile' => $businessProfile,
        ];
    }

    public function exportCsv(): StreamedResponse
    {
        $data = $this->getReportData();
        $filename = 'laporan-keuangan-'.Carbon::parse($this->startDate)->format('Ymd').'-'.Carbon::parse($this->endDate)->format('Ymd').'.csv';

        return response()->streamDownload(function () use ($data) {
            $handle = fopen('php://output', 'w');
            // Add UTF-8 BOM for Excel compatibility
            fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));

            fputcsv($handle, ['LAPORAN KEUANGAN UMKM']);
            fputcsv($handle, ['Nama Usaha', $data['businessProfile']?->business_name ?? '-']);
            fputcsv($handle, ['Periode', $data['startDate'].' s/d '.$data['endDate']]);
            fputcsv($handle, []);

            fputcsv($handle, ['RINGKASAN']);
            fputcsv($handle, ['Total Pemasukan', $data['totalIncome']]);
            fputcsv($handle, ['Total Pengeluaran', $data['totalExpense']]);
            fputcsv($handle, ['Arus Kas Bersih', $data['netCashFlow']]);
            fputcsv($handle, ['Rasio Pengeluaran', number_format($data['expenseRatio'] * 100, 2).'%']);
            fputcsv($handle, []);

            fputcsv($handle, ['RINCIAN TRANSAKSI']);
            fputcsv($handle, ['No', 'Tanggal', 'Jenis', 'Kategori', 'Nominal (Rp)', 'Keterangan']);

            $no = 1;
            foreach ($data['transactions'] as $tx) {
                fputcsv($handle, [
                    $no++,
                    $tx->transaction_date->format('Y-m-d'),
                    $tx->type === 'income' ? 'Pemasukan' : 'Pengeluaran',
                    $tx->category?->name ?? '—',
                    $tx->amount,
                    $tx->description ?? '—',
                ]);
            }

            fclose($handle);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}
