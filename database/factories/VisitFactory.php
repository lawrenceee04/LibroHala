<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VisitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patron_id' => fake()->numberBetween(1, 10),
            'check_in_date' => fake()->date(),
            'check_in_time' => fake()->time(),
            'check_out_date' => fake()->date(),
            'check_out_time' => fake()->time(),
        ];
    }
}
