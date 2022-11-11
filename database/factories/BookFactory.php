<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'title' =>fake()->title(),
            'isbn' => fake()->numerify("##########"),
            'revision_number' => fake()->numerify("##########"),
            'publisher' => fake()->name(),
            'published_date' => fake()->dateTimeBetween('1990-01-01', '2021-12-31')
            ->format('Y-m-d'),
            'author' => fake()->name(),
            'genre' => fake()->title(),
            'date_added_to_library' => date('Y-m-d'),
            'cover_photo'=> 'photo.jpg'
        ];
    }
}
