<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AnalysisExplanationSeeder extends Seeder
{
    /**
     * Penjelasan LLM dibuat secara otomatis saat analisis dijalankan melalui UI.
     * Seeder ini dikosongkan agar tidak men-generate teks palsu
     * yang tidak melewati model Decision Tree maupun LLM sungguhan.
     */
    public function run(): void
    {
        // Intentionally empty — explanation dibuat melalui UI Analisis AI.
    }
}
