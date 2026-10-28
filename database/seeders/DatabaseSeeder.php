<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Urutan eksekusi penting karena ada relasi antar tabel:
     * 1. UserSeeder           — buat akun demo
     * 2. BusinessProfileSeeder — profil usaha (butuh user)
     * 3. TransactionCategorySeeder — kategori (butuh user)
     * 4. TransactionSeeder    — transaksi 6 bulan (butuh user + kategori)
     * 5. FinancialAnalysisSeeder  — kosong, dibuat via UI
     * 6. AnalysisExplanationSeeder — kosong, dibuat via UI
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            BusinessProfileSeeder::class,
            TransactionCategorySeeder::class,
            TransactionSeeder::class,
            FinancialAnalysisSeeder::class,
            AnalysisExplanationSeeder::class,
        ]);
    }
}
