<x-filament-panels::page>

    @php
        $report = $this->getReportData();
        $totalIncome  = $report['totalIncome'];
        $totalExpense = $report['totalExpense'];
        $netCashFlow  = $report['netCashFlow'];
        $expenseRatio = $report['expenseRatio'];
        $categoryBreakdown = $report['categoryBreakdown'];
        $transactions = $report['transactions'];
        $businessProfile = $report['businessProfile'];
    @endphp

    {{-- Header Info Bisnis --}}
    <div class="-mt-4 mb-2">
        <h2 class="text-lg font-bold text-gray-900 dark:text-white">
            {{ $businessProfile?->business_name ?? auth()->user()->name . ' Business' }}
        </h2>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
            {{ $businessProfile?->business_type ?? 'UMKM' }}
            &bull;
            Periode: {{ $report['startDate'] }} s/d {{ $report['endDate'] }}
        </p>
    </div>

    {{-- Filter & Aksi --}}
    <x-filament::section>
        <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">

            <div class="flex flex-col gap-4">
                {{-- Tombol Periode Cepat --}}
                <div class="flex flex-wrap items-center gap-2">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300 mr-1">Periode:</span>
                    @foreach([
                        'today'      => 'Hari Ini',
                        'this_month' => 'Bulan Ini',
                        'last_month' => 'Bulan Lalu',
                        'this_year'  => 'Tahun Ini',
                    ] as $value => $label)
                        <button
                            wire:click="$set('period', '{{ $value }}')"
                            class="px-3 py-1.5 text-sm rounded-lg border transition-colors
                                {{ $period === $value
                                    ? 'bg-primary-600 text-white border-primary-600 dark:bg-primary-500 dark:border-primary-500'
                                    : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-700' }}"
                        >
                            {{ $label }}
                        </button>
                    @endforeach
                </div>

                {{-- Input Tanggal Kustom --}}
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div class="w-full sm:w-auto">
                        <x-filament::input.wrapper>
                            <x-filament::input
                                type="date"
                                wire:model.live="startDate"
                            />
                        </x-filament::input.wrapper>
                    </div>
                    <span class="hidden sm:block text-gray-500">—</span>
                    <div class="w-full sm:w-auto">
                        <x-filament::input.wrapper>
                            <x-filament::input
                                type="date"
                                wire:model.live="endDate"
                            />
                        </x-filament::input.wrapper>
                    </div>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex items-center gap-3 mt-4 md:mt-0">
                <x-filament::button
                    color="gray"
                    icon="heroicon-m-printer"
                    tag="a"
                    :href="route('reports.print', ['start' => $startDate, 'end' => $endDate])"
                    target="_blank"
                >
                    Cetak PDF
                </x-filament::button>
                <x-filament::button
                    color="gray"
                    icon="heroicon-m-arrow-down-tray"
                    wire:click="exportCsv"
                >
                    Ekspor CSV
                </x-filament::button>
            </div>
        </div>
    </x-filament::section>    {{-- Style Tambahan untuk Border, Spacing, dan Grid Responsif --}}
    <style>
        .fin-grid-cards {
            display: grid;
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }
        @media (min-width: 640px) {
            .fin-grid-cards {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }
        @media (min-width: 1024px) {
            .fin-grid-cards {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }
        }

        .fin-stat-card {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 20px 22px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            transition: all 0.2s ease-in-out;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .fin-stat-card:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.08);
            border-color: #cbd5e1;
        }
        .dark .fin-stat-card {
            background-color: #18181b;
            border-color: #27272a;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
        }
        .dark .fin-stat-card:hover {
            border-color: #3f3f46;
        }

        .fin-card-income {
            border-left: 5px solid #10b981 !important;
        }
        .fin-card-expense {
            border-left: 5px solid #ef4444 !important;
        }
        .fin-card-cashflow {
            border-left: 5px solid #3b82f6 !important;
        }
        .fin-card-ratio {
            border-left: 5px solid #f59e0b !important;
        }

        .fin-table-container {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            margin-bottom: 24px;
        }
        .dark .fin-table-container {
            background-color: #18181b;
            border-color: #27272a;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
        }

        .fin-table-header {
            padding: 16px 20px;
            border-bottom: 1px solid #e2e8f0;
            background-color: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .dark .fin-table-header {
            background-color: #202024;
            border-bottom-color: #27272a;
        }

        .fin-custom-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            text-align: left;
        }
        .fin-custom-table th {
            padding: 14px 20px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #64748b;
            background-color: #f8fafc;
            border-bottom: 2px solid #e2e8f0;
            white-space: nowrap;
        }
        .dark .fin-custom-table th {
            color: #a1a1aa;
            background-color: #202024;
            border-bottom-color: #27272a;
        }

        .fin-custom-table td {
            padding: 15px 20px;
            font-size: 0.875rem;
            color: #1e293b;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }
        .dark .fin-custom-table td {
            color: #e4e4e7;
            border-bottom-color: #27272a;
        }

        .fin-custom-table tbody tr:last-child td {
            border-bottom: none;
        }
        .fin-custom-table tbody tr:hover td {
            background-color: #f8fafc;
        }
        .dark .fin-custom-table tbody tr:hover td {
            background-color: #27272a;
        }

        .fin-custom-table tfoot td {
            padding: 16px 20px;
            font-weight: 700;
            font-size: 0.9rem;
            background-color: #f8fafc;
            border-top: 2px solid #e2e8f0;
            color: #0f172a;
        }
        .dark .fin-custom-table tfoot td {
            background-color: #202024;
            border-top-color: #27272a;
            color: #f4f4f5;
        }
    </style>

    {{-- Kartu Ringkasan KPI --}}
    <div class="fin-grid-cards">
        {{-- Total Pemasukan --}}
        <div class="fin-stat-card fin-card-income">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Total Pemasukan</span>
                <span class="p-2 rounded-lg bg-emerald-50 text-emerald-600 dark:bg-emerald-950/40 dark:text-emerald-400">
                    <x-filament::icon icon="heroicon-o-arrow-trending-up" class="w-5 h-5" />
                </span>
            </div>
            <div class="mt-4">
                <div class="text-2xl font-extrabold text-emerald-600 dark:text-emerald-400 tracking-tight">
                    Rp {{ number_format($totalIncome, 0, ',', '.') }}
                </div>
                <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                    Arus kas masuk terverifikasi
                </div>
            </div>
        </div>

        {{-- Total Pengeluaran --}}
        <div class="fin-stat-card fin-card-expense">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Total Pengeluaran</span>
                <span class="p-2 rounded-lg bg-rose-50 text-rose-600 dark:bg-rose-950/40 dark:text-rose-400">
                    <x-filament::icon icon="heroicon-o-arrow-trending-down" class="w-5 h-5" />
                </span>
            </div>
            <div class="mt-4">
                <div class="text-2xl font-extrabold text-rose-600 dark:text-rose-400 tracking-tight">
                    Rp {{ number_format($totalExpense, 0, ',', '.') }}
                </div>
                <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                    Biaya operasional & modal
                </div>
            </div>
        </div>

        {{-- Arus Kas Bersih --}}
        <div class="fin-stat-card fin-card-cashflow">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Arus Kas Bersih</span>
                <span class="p-2 rounded-lg bg-blue-50 text-blue-600 dark:bg-blue-950/40 dark:text-blue-400">
                    <x-filament::icon icon="heroicon-o-banknotes" class="w-5 h-5" />
                </span>
            </div>
            <div class="mt-4">
                <div class="text-2xl font-extrabold {{ $netCashFlow >= 0 ? 'text-emerald-600 dark:text-emerald-400' : 'text-rose-600 dark:text-rose-400' }} tracking-tight">
                    {{ $netCashFlow < 0 ? '-' : '+' }}Rp {{ number_format(abs($netCashFlow), 0, ',', '.') }}
                </div>
                <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                    {{ $netCashFlow >= 0 ? 'Surplus (Kas Positif)' : 'Defisit (Kas Negatif)' }}
                </div>
            </div>
        </div>

        {{-- Rasio Pengeluaran --}}
        <div class="fin-stat-card fin-card-ratio">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Rasio Pengeluaran</span>
                <span class="p-2 rounded-lg bg-amber-50 text-amber-600 dark:bg-amber-950/40 dark:text-amber-400">
                    <x-filament::icon icon="heroicon-o-chart-pie" class="w-5 h-5" />
                </span>
            </div>
            <div class="mt-4">
                <div class="text-2xl font-extrabold tracking-tight
                    {{ $expenseRatio <= 0.70 ? 'text-emerald-600 dark:text-emerald-400' : ($expenseRatio <= 0.90 ? 'text-amber-600 dark:text-amber-400' : 'text-rose-600 dark:text-rose-400') }}">
                    {{ number_format($expenseRatio * 100, 1) }}%
                </div>
                <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                    {{ $expenseRatio <= 0.70 ? 'Optimal (≤ 70%)' : ($expenseRatio <= 0.90 ? 'Sedang (71-90%)' : 'Tinggi (> 90%)') }}
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Rekapitulasi per Kategori --}}
    <div class="fin-table-container">
        <div class="fin-table-header">
            <div>
                <h3 class="text-base font-bold text-gray-900 dark:text-white">Rekapitulasi per Kategori</h3>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Ringkasan transaksi yang dikelompokkan berdasarkan pos kategori</p>
            </div>
            <span class="text-xs font-medium px-2.5 py-1 rounded-md bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-300">
                {{ count($categoryBreakdown) }} Kategori
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="fin-custom-table">
                <thead>
                    <tr>
                        <th style="width: 35%;">Nama Kategori</th>
                        <th style="width: 20%; text-align: center;">Tipe</th>
                        <th style="width: 20%; text-align: center;">Jumlah Transaksi</th>
                        <th style="width: 25%; text-align: right;">Total Nominal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categoryBreakdown as $cat)
                        <tr>
                            <td class="font-semibold text-gray-900 dark:text-white">
                                {{ $cat['name'] }}
                            </td>
                            <td style="text-align: center;">
                                <x-filament::badge :color="$cat['type'] === 'income' ? 'success' : 'danger'" size="sm">
                                    {{ $cat['type'] === 'income' ? 'Pemasukan' : 'Pengeluaran' }}
                                </x-filament::badge>
                            </td>
                            <td style="text-align: center;" class="font-medium text-gray-600 dark:text-gray-300">
                                {{ $cat['count'] }}
                            </td>
                            <td style="text-align: right;" class="font-bold {{ $cat['type'] === 'income' ? 'text-emerald-600 dark:text-emerald-400' : 'text-rose-600 dark:text-rose-400' }}">
                                Rp {{ number_format($cat['total'], 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 36px 20px;" class="text-gray-500 dark:text-gray-400 italic">
                                Belum ada data transaksi pada periode yang dipilih.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Tabel Rincian Transaksi --}}
    <div class="fin-table-container">
        <div class="fin-table-header">
            <div>
                <h3 class="text-base font-bold text-gray-900 dark:text-white">Rincian Transaksi</h3>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Daftar kronologis seluruh arus transaksi pada periode aktif</p>
            </div>
            <span class="text-xs font-medium px-2.5 py-1 rounded-md bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-300">
                {{ $transactions->count() }} Transaksi
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="fin-custom-table">
                <thead>
                    <tr>
                        <th style="width: 15%;">Tanggal</th>
                        <th style="width: 15%; text-align: center;">Jenis</th>
                        <th style="width: 25%;">Kategori</th>
                        <th style="width: 25%;">Keterangan</th>
                        <th style="width: 20%; text-align: right;">Nominal (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transactions as $tx)
                        <tr>
                            <td class="font-medium text-gray-700 dark:text-gray-300" style="white-space: nowrap;">
                                {{ $tx->transaction_date->format('d M Y') }}
                            </td>
                            <td style="text-align: center;">
                                <x-filament::badge :color="$tx->type === 'income' ? 'success' : 'danger'" size="sm">
                                    {{ $tx->type === 'income' ? 'Pemasukan' : 'Pengeluaran' }}
                                </x-filament::badge>
                            </td>
                            <td class="font-medium text-gray-900 dark:text-white">
                                {{ $tx->category?->name ?? '—' }}
                            </td>
                            <td class="text-gray-600 dark:text-gray-400 text-sm">
                                {{ $tx->description ?? '—' }}
                            </td>
                            <td style="text-align: right; white-space: nowrap;" class="font-bold {{ $tx->type === 'income' ? 'text-emerald-600 dark:text-emerald-400' : 'text-rose-600 dark:text-rose-400' }}">
                                {{ $tx->type === 'expense' ? '-' : '+' }}Rp {{ number_format((float) $tx->amount, 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 36px 20px;" class="text-gray-500 dark:text-gray-400 italic">
                                Tidak ada transaksi pada periode yang dipilih.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                @if($transactions->count() > 0)
                <tfoot>
                    <tr>
                        <td colspan="4" class="font-bold">
                            Total Ringkasan ({{ $transactions->count() }} transaksi)
                        </td>
                        <td style="text-align: right; white-space: nowrap;" class="font-extrabold {{ $netCashFlow >= 0 ? 'text-emerald-600 dark:text-emerald-400' : 'text-rose-600 dark:text-rose-400' }}">
                            {{ $netCashFlow < 0 ? '-' : '+' }}Rp {{ number_format(abs($netCashFlow), 0, ',', '.') }}
                        </td>
                    </tr>
                </tfoot>
                @endif
            </table>
        </div>
    </div>

</x-filament-panels::page>