<?php

namespace Database\Factories;

use App\Models\FinancialAnalysis;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FinancialAnalysis>
 */
class FinancialAnalysisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $income = $this->faker->randomFloat(2, 1000000, 20000000);
        $expense = $this->faker->randomFloat(2, 500000, $income * 1.2);
        $netCashFlow = $income - $expense;
        $expenseRatio = $income > 0 ? round($expense / $income, 4) : 0.0;
        $prediction = match (true) {
            $expenseRatio <= 0.70 && $netCashFlow > 0 => 'Sehat',
            $expenseRatio <= 0.90 => 'Perlu perhatian',
            default => 'Berisiko',
        };

        return [
            'user_id' => User::factory(),
            'period_start' => now()->subMonth()->startOfMonth(),
            'period_end' => now()->subMonth()->endOfMonth(),
            'total_income' => $income,
            'total_expense' => $expense,
            'net_cash_flow' => $netCashFlow,
            'expense_ratio' => $expenseRatio,
            'income_trend' => $this->faker->randomFloat(4, -0.3, 0.5),
            'cash_flow_trend' => $this->faker->randomFloat(4, -0.5, 0.5),
            'prediction_label' => $prediction,
            'confidence_score' => $this->faker->randomFloat(4, 0.70, 0.99),
            'key_factors' => ['Arus kas positif', 'Rasio pengeluaran efisien'],
            'model_version' => '1.0.0 (Decision Tree)',
        ];
    }

    /**
     * Healthy financial state.
     */
    public function healthy(): static
    {
        return $this->state(fn (array $attributes) => [
            'total_income' => 10000000,
            'total_expense' => 6000000,
            'net_cash_flow' => 4000000,
            'expense_ratio' => 0.60,
            'income_trend' => 0.15,
            'cash_flow_trend' => 0.10,
            'prediction_label' => 'Sehat',
            'confidence_score' => 0.95,
        ]);
    }

    /**
     * At-risk financial state.
     */
    public function atRisk(): static
    {
        return $this->state(fn (array $attributes) => [
            'total_income' => 5000000,
            'total_expense' => 5500000,
            'net_cash_flow' => -500000,
            'expense_ratio' => 1.10,
            'income_trend' => -0.20,
            'cash_flow_trend' => -0.30,
            'prediction_label' => 'Berisiko',
            'confidence_score' => 0.88,
        ]);
    }
}
