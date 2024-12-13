<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'accession_number' => 'B' . fake()->randomNumber(5, true),
            'title' => fake()->sentence(6, false),
            'edition' => fake()->numberBetween(4, 10) . 'th',
            'author' => fake()->firstName() . ' ' . fake()->lastName(),
            'publisher' => fake()->company() . ' ' . fake()->companySuffix(),
            'isbn' => fake()->isbn13(),
            'class' => fake()->randomLetter() . '' . fake()->randomLetter(),
            'topic_area' => fake()->randomFloat(3, 1),
            'cutter_number' => fake()->randomLetter() . '' . fake()->randomNumber(3, false),
            'publication_year' => fake()->year(),
            'copies' => 'C-' . fake()->numberBetween(1, 10),
            'status' => fake()->randomElement(["Available", "Unavailable"]),
            'genre' => fake()->randomElement([
                "Science Fiction",
                "Fantasy",
                "Mystery",
                "Thriller",
                "Romance",
                "Western",
                "Dystopian",
                "Contemporary",
                "Historical Fiction",
                "Horror",
                "Literary Fiction",
                "Magical Realism",
                "Graphic Novel",
                "Short Story",
                "Young Adult",
                "Children's",
                "Memoir",
                "Biography",
                "Self-Help",
                "True Crime"
            ]),
            'description' => fake()->sentence(15, false),
        ];
    }
}
