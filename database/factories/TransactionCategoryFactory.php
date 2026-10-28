<?php

namespace Database\Factories;

use App\Models\TransactionCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TransactionCategory>
 */
class TransactionCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->randomElement(['Penjualan', 'Jasa', 'Gaji', 'Sewa', 'Utilitas', 'Bahan Baku', 'Pemasaran']),
            'type' => $this->faker->randomElement(['income', 'expense']),
            'color' => $this->faker->hexColor(),
            'is_active' => true,
        ];
    }

    /**
     * Income category state.
     */
    public function income(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => $this->faker->randomElement(['Penjualan', 'Jasa Layanan', 'Pendapatan Lain']),
            'type' => 'income',
        ]);
    }

    /**
     * Expense category state.
     */
    public function expense(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => $this->faker->randomElement(['Bahan Baku', 'Gaji Karyawan', 'Sewa Tempat', 'Utilitas', 'Pemasaran']),
            'type' => 'expense',
        ]);
    }
}
