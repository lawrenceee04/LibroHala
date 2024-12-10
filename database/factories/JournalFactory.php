<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use function PHPSTORM_META\map;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Journal>
 */
class JournalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'issn' => fake()->randomNumber(8, true),
            'title' => fake()->sentence(3, false),
            // 'edition' => fake()->numberBetween(4, 10) . 'th',
            // 'author' => fake()->firstName() . ' ' . fake()->lastName(),
            'publisher' => fake()->company() . ' ' . fake()->companySuffix(),
            'language' => fake()->randomElement([
                "English",
                'Mandarin',
                'Hindi',
                'Spanish',
                'French',
                'Arabic',
            ]),
            'subject_area' => fake()->sentence(2, true),
            'start_year' => fake()->year(2022),
            'end_year' => fake()->year(2022),
            'is_peer_reviewed' => fake()->boolean(69),
            'publication_frequency' => fake()->randomElement([
                "Monthly",
                'Quarterly',
                'Biyearly',
                'Yearly'
            ]),
            'description' => fake()->sentence(10, false),
        ];
    }
}
