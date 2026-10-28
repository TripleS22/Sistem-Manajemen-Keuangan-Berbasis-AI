<?php

namespace Database\Factories;

use App\Models\BusinessProfile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BusinessProfile>
 */
class BusinessProfileFactory extends Factory
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
            'business_name' => $this->faker->company().' UMKM',
            'business_type' => $this->faker->randomElement(['Kuliner', 'Retail', 'Jasa', 'Kerajinan', 'Pertanian']),
            'description' => $this->faker->sentence(10),
            'initial_capital' => $this->faker->randomFloat(2, 1_000_000, 100_000_000),
        ];
    }
}
