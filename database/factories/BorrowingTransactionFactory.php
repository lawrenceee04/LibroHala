<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BorrowingTransaction>
 */
class BorrowingTransactionFactory extends Factory
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
            'book_id' => fake()->numberBetween(1, 100),
            'borrow_date' => fake()->dateTimeBetween('-15 days', 'now'),
            'due_date' => fake()->dateTimeBetween('-5 days', 'now'),
            'return_date' => fake()->dateTimeBetween('-2 days', 'now'),
            'status' => 'borrowed',
        ];
    }
}
