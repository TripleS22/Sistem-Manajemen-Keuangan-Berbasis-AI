<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FinancialAnalysisSeeder extends Seeder
{
    /**
     * Hasil analisis keuangan dibuat melalui UI Analisis AI (bukan di-seed),
     * karena proses ini melibatkan kalkulasi Decision Tree dan pemanggilan LLM.
     *
     * Jalankan analisis pertama melalui menu "Analisis AI" di dashboard,
     * atau via: php artisan ml:train-decision-tree untuk melatih model terlebih dahulu.
     */
    public function run(): void
    {
        // Intentionally empty — analisis dibuat melalui UI.
    }
}
