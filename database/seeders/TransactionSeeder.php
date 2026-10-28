<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\TransactionCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Seed data transaksi realistis selama 6 bulan terakhir
     * agar Dashboard, Laporan, dan Analisis AI punya data bermakna.
     */
    public function run(): void
    {
        $user = User::where('email', 'admin@umkm.com')->firstOrFail();

        // Skip jika sudah ada data transaksi
        if (Transaction::where('user_id', $user->id)->exists()) {
            $this->command->info('Transaksi sudah ada, dilewati.');

            return;
        }

        /** @var array<string, TransactionCategory> $categories */
        $categories = TransactionCategory::where('user_id', $user->id)
            ->get()
            ->keyBy('name');

        $now = Carbon::now();

        /**
         * Data transaksi per bulan selama 6 bulan terakhir.
         * Pola: pertumbuhan bertahap dengan sedikit fluktuasi
         * agar model Decision Tree mendapat variasi kondisi keuangan.
         *
         * @var array<int, array<int, array{cat: string, type: string, amount: int, desc: string}>>
         */
        $monthlyData = [
            // 5 bulan lalu — Berisiko (expense ratio tinggi, net negatif)
            5 => [
                ['cat' => 'Penjualan Produk', 'type' => 'income', 'amount' => 8_500_000, 'desc' => 'Penjualan produk bulan ke-1'],
                ['cat' => 'Pendapatan Jasa / Katering', 'type' => 'income', 'amount' => 1_200_000, 'desc' => 'Jasa katering kecil'],
                ['cat' => 'Pembelian Bahan Baku', 'type' => 'expense', 'amount' => 5_800_000, 'desc' => 'Bahan baku kopi dan makanan'],
                ['cat' => 'Gaji & Upah Karyawan', 'type' => 'expense', 'amount' => 4_000_000, 'desc' => 'Gaji 2 karyawan'],
                ['cat' => 'Sewa Tempat & Utilitas (Listrik/Air/Internet)', 'type' => 'expense', 'amount' => 2_200_000, 'desc' => 'Sewa dan utilitas'],
                ['cat' => 'Operasional & Perlengkapan', 'type' => 'expense', 'amount' => 800_000, 'desc' => 'Perlengkapan operasional'],
            ],

            // 4 bulan lalu — Perlu Perhatian
            4 => [
                ['cat' => 'Penjualan Produk', 'type' => 'income', 'amount' => 11_000_000, 'desc' => 'Penjualan produk meningkat'],
                ['cat' => 'Pendapatan Jasa / Katering', 'type' => 'income', 'amount' => 2_500_000, 'desc' => 'Katering acara perusahaan'],
                ['cat' => 'Pembelian Bahan Baku', 'type' => 'expense', 'amount' => 6_200_000, 'desc' => 'Bahan baku bulanan'],
                ['cat' => 'Gaji & Upah Karyawan', 'type' => 'expense', 'amount' => 4_000_000, 'desc' => 'Gaji karyawan'],
                ['cat' => 'Sewa Tempat & Utilitas (Listrik/Air/Internet)', 'type' => 'expense', 'amount' => 2_200_000, 'desc' => 'Sewa dan utilitas'],
                ['cat' => 'Pemasaran & Promosi', 'type' => 'expense', 'amount' => 600_000, 'desc' => 'Iklan media sosial'],
            ],

            // 3 bulan lalu — Sehat
            3 => [
                ['cat' => 'Penjualan Produk', 'type' => 'income', 'amount' => 16_500_000, 'desc' => 'Penjualan produk peak season'],
                ['cat' => 'Pendapatan Jasa / Katering', 'type' => 'income', 'amount' => 4_000_000, 'desc' => 'Katering acara pernikahan'],
                ['cat' => 'Pembelian Bahan Baku', 'type' => 'expense', 'amount' => 7_500_000, 'desc' => 'Bahan baku meningkat'],
                ['cat' => 'Gaji & Upah Karyawan', 'type' => 'expense', 'amount' => 4_500_000, 'desc' => 'Gaji + bonus karyawan'],
                ['cat' => 'Sewa Tempat & Utilitas (Listrik/Air/Internet)', 'type' => 'expense', 'amount' => 2_300_000, 'desc' => 'Utilitas naik'],
                ['cat' => 'Transportasi & Logistik', 'type' => 'expense', 'amount' => 500_000, 'desc' => 'Ongkir bahan baku'],
            ],

            // 2 bulan lalu — Sehat
            2 => [
                ['cat' => 'Penjualan Produk', 'type' => 'income', 'amount' => 18_000_000, 'desc' => 'Penjualan terbaik'],
                ['cat' => 'Pendapatan Jasa / Katering', 'type' => 'income', 'amount' => 3_500_000, 'desc' => 'Katering kantor rutin'],
                ['cat' => 'Pembelian Bahan Baku', 'type' => 'expense', 'amount' => 7_800_000, 'desc' => 'Stok bahan baku lebih banyak'],
                ['cat' => 'Gaji & Upah Karyawan', 'type' => 'expense', 'amount' => 4_500_000, 'desc' => 'Gaji 3 karyawan'],
                ['cat' => 'Sewa Tempat & Utilitas (Listrik/Air/Internet)', 'type' => 'expense', 'amount' => 2_400_000, 'desc' => 'Sewa dan utilitas'],
                ['cat' => 'Pemasaran & Promosi', 'type' => 'expense', 'amount' => 800_000, 'desc' => 'Kampanye promo akhir bulan'],
                ['cat' => 'Operasional & Perlengkapan', 'type' => 'expense', 'amount' => 700_000, 'desc' => 'Peralatan dapur'],
            ],

            // 1 bulan lalu — Perlu Perhatian (sedikit turun)
            1 => [
                ['cat' => 'Penjualan Produk', 'type' => 'income', 'amount' => 14_500_000, 'desc' => 'Penjualan turun sedikit'],
                ['cat' => 'Pendapatan Jasa / Katering', 'type' => 'income', 'amount' => 2_800_000, 'desc' => 'Pesanan katering berkurang'],
                ['cat' => 'Pembelian Bahan Baku', 'type' => 'expense', 'amount' => 7_200_000, 'desc' => 'Bahan baku bulanan'],
                ['cat' => 'Gaji & Upah Karyawan', 'type' => 'expense', 'amount' => 4_500_000, 'desc' => 'Gaji karyawan'],
                ['cat' => 'Sewa Tempat & Utilitas (Listrik/Air/Internet)', 'type' => 'expense', 'amount' => 2_400_000, 'desc' => 'Tagihan utilitas'],
                ['cat' => 'Pemasaran & Promosi', 'type' => 'expense', 'amount' => 500_000, 'desc' => 'Iklan sosmed'],
                ['cat' => 'Transportasi & Logistik', 'type' => 'expense', 'amount' => 350_000, 'desc' => 'Ongkir pengiriman'],
            ],

            // Bulan berjalan — Sehat
            0 => [
                ['cat' => 'Penjualan Produk', 'type' => 'income', 'amount' => 12_500_000, 'desc' => 'Penjualan minggu ke-3'],
                ['cat' => 'Penjualan Produk', 'type' => 'income', 'amount' => 9_800_000, 'desc' => 'Penjualan minggu ke-2'],
                ['cat' => 'Pendapatan Jasa / Katering', 'type' => 'income', 'amount' => 3_500_000, 'desc' => 'Pesanan katering acara kantor'],
                ['cat' => 'Pembelian Bahan Baku', 'type' => 'expense', 'amount' => 7_200_000, 'desc' => 'Biji kopi, susu, dan bahan masakan'],
                ['cat' => 'Sewa Tempat & Utilitas (Listrik/Air/Internet)', 'type' => 'expense', 'amount' => 2_500_000, 'desc' => 'Tagihan listrik dan internet'],
                ['cat' => 'Gaji & Upah Karyawan', 'type' => 'expense', 'amount' => 4_500_000, 'desc' => 'Gaji 2 barista'],
                ['cat' => 'Pemasaran & Promosi', 'type' => 'expense', 'amount' => 500_000, 'desc' => 'Iklan media sosial'],
            ],
        ];

        foreach ($monthlyData as $monthsAgo => $transactions) {
            $baseDate = $now->copy()->subMonths($monthsAgo);

            foreach ($transactions as $index => $trx) {
                if (! isset($categories[$trx['cat']])) {
                    continue;
                }

                // Sebar tanggal transaksi secara acak dalam bulan itu
                $day = random_int(1, min(28, $baseDate->daysInMonth));
                $transactionDate = $baseDate->copy()->day($day);

                Transaction::create([
                    'user_id' => $user->id,
                    'transaction_category_id' => $categories[$trx['cat']]->id,
                    'type' => $trx['type'],
                    'amount' => $trx['amount'],
                    'transaction_date' => $transactionDate->format('Y-m-d'),
                    'description' => $trx['desc'],
                ]);
            }
        }
    }
}
