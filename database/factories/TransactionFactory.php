<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement(['income', 'expense']);

        return [
            'user_id' => User::factory(),
            'transaction_category_id' => null,
            'type' => $type,
            'amount' => $this->faker->randomFloat(2, 50000, 5000000),
            'transaction_date' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'description' => $this->faker->sentence(4),
        ];
    }

    /**
     * Income transaction state.
     */
    public function income(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'income',
            'amount' => $this->faker->randomFloat(2, 500000, 10000000),
            'description' => 'Pemasukan: '.$this->faker->words(3, true),
        ]);
    }

    /**
     * Expense transaction state.
     */
    public function expense(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'expense',
            'amount' => $this->faker->randomFloat(2, 100000, 7000000),
            'description' => 'Pengeluaran: '.$this->faker->words(3, true),
        ]);
    }

    /**
     * Set transaction to a specific month.
     */
    public function inMonth(int $year, int $month): static
    {
        $start = Carbon::createFromDate($year, $month, 1)->startOfMonth();
        $end = $start->copy()->endOfMonth();

        return $this->state(fn (array $attributes) => [
            'transaction_date' => $this->faker->dateTimeBetween($start, $end),
        ]);
    }
}
