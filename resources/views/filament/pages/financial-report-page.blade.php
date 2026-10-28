<x-filament-panels::page>
    @php
        $report = $this->getReportData();
    @endphp

    {{-- Filter & Actions Bar --}}
    <div class="fi-section rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 print:hidden">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div class="flex flex-wrap items-center gap-3">
                <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Pilihan Periode:</span>
                <button
                    type="button"
                    wire:click="$set('period', 'today')"
                    class="rounded-lg px-3 py-1.5 text-xs font-medium transition {{ $period === 'today' ? 'bg-primary-600 text-white shadow' : 'bg-gray-100 text-gray-700 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-300' }}">
                    Hari Ini
                </button>
                <button
                    type="button"
                    wire:click="$set('period', 'this_month')"
                    class="rounded-lg px-3 py-1.5 text-xs font-medium transition {{ $period === 'this_month' ? 'bg-primary-600 text-white shadow' : 'bg-gray-100 text-gray-700 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-300' }}">
                    Bulan Ini
                </button>
                <button
                    type="button"
                    wire:click="$set('period', 'last_month')"
                    class="rounded-lg px-3 py-1.5 text-xs font-medium transition {{ $period === 'last_month' ? 'bg-primary-600 text-white shadow' : 'bg-gray-100 text-gray-700 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-300' }}">
                    Bulan Lalu
                </button>
                <button
                    type="button"
                    wire:click="$set('period', 'this_year')"
                    class="rounded-lg px-3 py-1.5 text-xs font-medium transition {{ $period === 'this_year' ? 'bg-primary-600 text-white shadow' : 'bg-gray-100 text-gray-700 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-300' }}">
                    Tahun Ini
                </button>
            </div>

            <div class="flex flex-wrap items-center gap-3">
                <div class="flex items-center gap-2 text-xs">
                    <label class="font-medium text-gray-600 dark:text-gray-400">Dari:</label>
                    <input
                        type="date"
                        wire:model.live="startDate"
                        class="rounded-lg border-gray-300 text-xs shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200"
                    />
                </div>
                <div class="flex items-center gap-2 text-xs">
                    <label class="font-medium text-gray-600 dark:text-gray-400">Sampai:</label>
                    <input
                        type="date"
                        wire:model.live="endDate"
                        class="rounded-lg border-gray-300 text-xs shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200"
                    />
                </div>

                <div class="flex items-center gap-2">
                    <button
                        type="button"
                        wire:click="exportCsv"
                        class="inline-flex items-center gap-1.5 rounded-lg bg-emerald-600 px-3 py-2 text-xs font-semibold text-white shadow hover:bg-emerald-500 transition">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Ekspor CSV
                    </button>
                    <button
                        type="button"
                        onclick="window.print()"
                        class="inline-flex items-center gap-1.5 rounded-lg bg-gray-800 px-3 py-2 text-xs font-semibold text-white shadow hover:bg-gray-700 dark:bg-gray-700 dark:hover:bg-gray-600 transition">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                        </svg>
                        Cetak / PDF
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Report Header (Visible in print) --}}
    <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between border-b border-gray-100 pb-5 dark:border-gray-800">
            <div>
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                    {{ $report['businessProfile']?->business_name ?? 'Laporan Keuangan Usaha' }}
                </h2>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                    Bidang Usaha: {{ $report['businessProfile']?->business_type ?? 'UMKM' }} &bull; Periode: <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $report['startDate'] }} s/d {{ $report['endDate'] }}</span>
                </p>
            </div>
            <div class="mt-3 md:mt-0 text-left md:text-right">
                <span class="inline-block rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700 dark:bg-emerald-950/50 dark:text-emerald-400">
                    Total: {{ count($report['transactions']) }} Transaksi
                </span>
            </div>
        </div>

        {{-- Summary Cards --}}
        <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <div class="rounded-lg bg-emerald-50/60 p-4 ring-1 ring-emerald-500/10 dark:bg-emerald-950/20">
                <p class="text-xs font-medium text-emerald-800 dark:text-emerald-300">Total Pemasukan</p>
                <p class="mt-1.5 text-lg font-bold text-emerald-700 dark:text-emerald-400">
                    Rp {{ number_format($report['totalIncome'], 0, ',', '.') }}
                </p>
            </div>
            <div class="rounded-lg bg-rose-50/60 p-4 ring-1 ring-rose-500/10 dark:bg-rose-950/20">
                <p class="text-xs font-medium text-rose-800 dark:text-rose-300">Total Pengeluaran</p>
                <p class="mt-1.5 text-lg font-bold text-rose-700 dark:text-rose-400">
                    Rp {{ number_format($report['totalExpense'], 0, ',', '.') }}
                </p>
            </div>
            <div class="rounded-lg p-4 ring-1 {{ $report['netCashFlow'] >= 0 ? 'bg-emerald-50/40 ring-emerald-500/10' : 'bg-rose-50/40 ring-rose-500/10' }}">
                <p class="text-xs font-medium {{ $report['netCashFlow'] >= 0 ? 'text-emerald-800 dark:text-emerald-300' : 'text-rose-800 dark:text-rose-300' }}">
                    Arus Kas Bersih (Saldo)
                </p>
                <p class="mt-1.5 text-lg font-bold {{ $report['netCashFlow'] >= 0 ? 'text-emerald-700 dark:text-emerald-400' : 'text-rose-700 dark:text-rose-400' }}">
                    Rp {{ number_format($report['netCashFlow'], 0, ',', '.') }}
                </p>
            </div>
            <div class="rounded-lg bg-gray-50 p-4 ring-1 ring-gray-950/5 dark:bg-gray-800/40 dark:ring-white/10">
                <p class="text-xs font-medium text-gray-600 dark:text-gray-400">Rasio Pengeluaran</p>
                <p class="mt-1.5 text-lg font-bold text-gray-900 dark:text-white">
                    {{ number_format($report['expenseRatio'] * 100, 1) }}%
                </p>
            </div>
        </div>

        {{-- Category Breakdown --}}
        <div class="mt-8">
            <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-3">
                Rekapitulasi per Kategori
            </h3>
            <div class="overflow-hidden rounded-lg ring-1 ring-gray-200 dark:ring-gray-800">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800 text-left text-xs">
                    <thead class="bg-gray-50 dark:bg-gray-800/60 font-semibold text-gray-700 dark:text-gray-300">
                        <tr>
                            <th class="px-4 py-3">Nama Kategori</th>
                            <th class="px-4 py-3">Tipe</th>
                            <th class="px-4 py-3 text-center">Jumlah Transaksi</th>
                            <th class="px-4 py-3 text-right">Total Nominal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800/60 bg-white dark:bg-gray-900">
                        @forelse ($report['categoryBreakdown'] as $cat)
                            <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-800/30">
                                <td class="px-4 py-2.5 font-medium text-gray-900 dark:text-gray-100">{{ $cat['name'] }}</td>
                                <td class="px-4 py-2.5">
                                    <span class="inline-block rounded px-2 py-0.5 font-semibold text-[11px] {{ $cat['type'] === 'income' ? 'bg-emerald-100 text-emerald-800 dark:bg-emerald-950 dark:text-emerald-300' : 'bg-rose-100 text-rose-800 dark:bg-rose-950 dark:text-rose-300' }}">
                                        {{ $cat['type'] === 'income' ? 'Pemasukan' : 'Pengeluaran' }}
                                    </span>
                                </td>
                                <td class="px-4 py-2.5 text-center text-gray-600 dark:text-gray-400">{{ $cat['count'] }}</td>
                                <td class="px-4 py-2.5 text-right font-semibold {{ $cat['type'] === 'income' ? 'text-emerald-600 dark:text-emerald-400' : 'text-rose-600 dark:text-rose-400' }}">
                                    Rp {{ number_format($cat['total'], 0, ',', '.') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-4 text-center text-gray-500">Belum ada data kategori pada periode ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Detailed Transaction Log --}}
        <div class="mt-8">
            <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-3">
                Rincian Transaksi
            </h3>
            <div class="overflow-hidden rounded-lg ring-1 ring-gray-200 dark:ring-gray-800">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800 text-left text-xs">
                    <thead class="bg-gray-50 dark:bg-gray-800/60 font-semibold text-gray-700 dark:text-gray-300">
                        <tr>
                            <th class="px-4 py-3">Tanggal</th>
                            <th class="px-4 py-3">Jenis</th>
                            <th class="px-4 py-3">Kategori</th>
                            <th class="px-4 py-3">Keterangan</th>
                            <th class="px-4 py-3 text-right">Nominal (Rp)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800/60 bg-white dark:bg-gray-900">
                        @forelse ($report['transactions'] as $tx)
                            <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-800/30">
                                <td class="px-4 py-2.5 text-gray-600 dark:text-gray-400 whitespace-nowrap">{{ $tx->transaction_date->format('d/m/Y') }}</td>
                                <td class="px-4 py-2.5">
                                    <span class="inline-block rounded px-2 py-0.5 font-semibold text-[11px] {{ $tx->type === 'income' ? 'bg-emerald-100 text-emerald-800 dark:bg-emerald-950 dark:text-emerald-300' : 'bg-rose-100 text-rose-800 dark:bg-rose-950 dark:text-rose-300' }}">
                                        {{ $tx->type === 'income' ? 'Pemasukan' : 'Pengeluaran' }}
                                    </span>
                                </td>
                                <td class="px-4 py-2.5 text-gray-700 dark:text-gray-300">{{ $tx->category?->name ?? '—' }}</td>
                                <td class="px-4 py-2.5 text-gray-500 dark:text-gray-400">{{ $tx->description ?? '—' }}</td>
                                <td class="px-4 py-2.5 text-right font-semibold {{ $tx->type === 'income' ? 'text-emerald-600 dark:text-emerald-400' : 'text-rose-600 dark:text-rose-400' }}">
                                    {{ $tx->type === 'income' ? '+' : '-' }} Rp {{ number_format($tx->amount, 0, ',', '.') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-4 text-center text-gray-500">Tidak ada transaksi pada periode yang dipilih.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-filament-panels::page>
