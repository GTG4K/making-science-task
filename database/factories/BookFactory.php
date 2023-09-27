<?php

namespace Database\Factories;

use App\Models\Author;
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
    public function definition(): array
    {

        $authorId = Author::inRandomOrder()->first()->id;

        return [
            'name'=> $this->faker->word(),
            'release_date'=> rand(1990, 2023),
            'status'=> rand(1,2) == 2 ? 'available': 'taken',
        ];
    }
}
