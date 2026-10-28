<?php

namespace Database\Factories;

use App\Models\AnalysisExplanation;
use App\Models\FinancialAnalysis;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AnalysisExplanation>
 */
class AnalysisExplanationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'financial_analysis_id' => FinancialAnalysis::factory(),
            'explanation' => $this->faker->paragraph(3),
            'recommendations' => [
                $this->faker->sentence(),
                $this->faker->sentence(),
                $this->faker->sentence(),
            ],
            'provider' => 'gemini',
            'status' => 'success',
            'error_message' => null,
        ];
    }

    /**
     * Fallback (rule-based) state when Gemini API is unavailable.
     */
    public function fallback(): static
    {
        return $this->state(fn (array $attributes) => [
            'provider' => 'rule_based_fallback',
            'status' => 'fallback',
            'explanation' => 'Penjelasan otomatis: analisis berdasarkan aturan kondisi keuangan.',
            'recommendations' => ['Pantau pengeluaran secara berkala.', 'Siapkan cadangan kas operasional.'],
        ]);
    }

    /**
     * Error state when API call failed entirely.
     */
    public function apiError(): static
    {
        return $this->state(fn (array $attributes) => [
            'provider' => 'gemini',
            'status' => 'error',
            'explanation' => 'Layanan AI sementara tidak tersedia.',
            'recommendations' => [],
            'error_message' => 'API request timed out.',
        ]);
    }
}
