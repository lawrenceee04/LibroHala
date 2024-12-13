<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PatronFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patron_id' => '23' . '-0000' . fake()->numberBetween(0, 9),
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->lastName(),
            'last_name' => fake()->lastName(),
        ];
    }
}
