<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan — {{ $businessProfile?->business_name ?? 'UMKM' }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #1f2937;
            font-size: 12px;
            padding: 32px;
        }
        .report-header { text-align: center; border-bottom: 2px solid #111827; padding-bottom: 16px; margin-bottom: 20px; }
        .report-header h1 { font-size: 20px; margin-bottom: 4px; }
        .report-header p { color: #6b7280; font-size: 12px; }
        .summary { display: flex; gap: 12px; margin-bottom: 20px; }
        .summary-box { flex: 1; border: 1px solid #d1d5db; border-radius: 6px; padding: 12px; }
        .summary-box .label { font-size: 11px; color: #6b7280; margin-bottom: 4px; }
        .summary-box .value { font-size: 16px; font-weight: bold; }
        .value.positive { color: #047857; }
        .value.negative { color: #b91c1c; }
        h2 { font-size: 14px; margin-bottom: 8px; margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 12px; }
        th, td { border: 1px solid #d1d5db; padding: 6px 8px; text-align: left; }
        th { background: #f3f4f6; font-size: 11px; text-transform: uppercase; letter-spacing: 0.03em; }
        td.num, th.num { text-align: right; }
        tfoot td { font-weight: bold; background: #f9fafb; }
        .footer { margin-top: 24px; color: #6b7280; font-size: 11px; text-align: center; }
        @media print {
            body { padding: 0; }
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    <div class="no-print" style="text-align: right; margin-bottom: 12px;">
        <button onclick="window.print()" style="padding: 8px 16px; cursor: pointer;">Cetak / Simpan PDF</button>
    </div>

    <div class="report-header">
        <h1>{{ $businessProfile?->business_name ?? auth()->user()->name.' Business' }}</h1>
        <p>{{ $businessProfile?->business_type ?? 'UMKM' }} &bull; Laporan Keuangan</p>
        <p>Periode: {{ $startDate }} s/d {{ $endDate }}</p>
    </div>

    <div class="summary">
        <div class="summary-box">
            <div class="label">Total Pemasukan</div>
            <div class="value positive">Rp {{ number_format($totalIncome, 0, ',', '.') }}</div>
        </div>
        <div class="summary-box">
            <div class="label">Total Pengeluaran</div>
            <div class="value negative">Rp {{ number_format($totalExpense, 0, ',', '.') }}</div>
        </div>
        <div class="summary-box">
            <div class="label">Arus Kas Bersih</div>
            <div class="value {{ $netCashFlow >= 0 ? 'positive' : 'negative' }}">
                {{ $netCashFlow < 0 ? '-' : '' }}Rp {{ number_format(abs($netCashFlow), 0, ',', '.') }}
            </div>
        </div>
    </div>

    <h2>Rekapitulasi per Kategori</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Kategori</th>
                <th>Tipe</th>
                <th class="num">Jumlah Transaksi</th>
                <th class="num">Total Nominal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categoryBreakdown as $cat)
                <tr>
                    <td>{{ $cat['name'] }}</td>
                    <td>{{ $cat['type'] === 'income' ? 'Pemasukan' : 'Pengeluaran' }}</td>
                    <td class="num">{{ $cat['count'] }}</td>
                    <td class="num">{{ $cat['type'] === 'expense' ? '-' : '' }}Rp {{ number_format($cat['total'], 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center; font-style: italic;">Belum ada data transaksi pada periode ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h2>Rincian Transaksi</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jenis</th>
                <th>Kategori</th>
                <th>Keterangan</th>
                <th class="num">Nominal (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transactions as $tx)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tx->transaction_date->format('d M Y') }}</td>
                    <td>{{ $tx->type === 'income' ? 'Pemasukan' : 'Pengeluaran' }}</td>
                    <td>{{ $tx->category?->name ?? '—' }}</td>
                    <td>{{ $tx->description ?? '—' }}</td>
                    <td class="num">{{ $tx->type === 'expense' ? '-' : '+' }}{{ number_format((float) $tx->amount, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; font-style: italic;">Tidak ada transaksi pada periode yang dipilih.</td>
                </tr>
            @endforelse
        </tbody>
        @if($transactions->count() > 0)
        <tfoot>
            <tr>
                <td colspan="5">Total Arus Kas Bersih ({{ $transactions->count() }} transaksi)</td>
                <td class="num">{{ $netCashFlow < 0 ? '-' : '+' }}{{ number_format(abs($netCashFlow), 0, ',', '.') }}</td>
            </tr>
        </tfoot>
        @endif
    </table>

    <div class="footer">
        Dicetak pada {{ $printedAt }} &bull; Dokumen ini dihasilkan otomatis oleh SIM Keuangan
    </div>

    <script>
        window.addEventListener('load', function () {
            // Buka dialog cetak otomatis; pengguna dapat memilih "Save as PDF".
            if (! window.location.search.includes('noprint=1')) {
                window.print();
            }
        });
    </script>
</body>
</html>
