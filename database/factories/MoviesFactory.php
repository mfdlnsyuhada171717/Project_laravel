<?php

namespace Database\Factories;

use App\Models\Genres;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movies>
 */
class MoviesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'synopsis' => $this->faker->paragraph,
            'poster' => $this->faker->imageUrl,
            'year' => $this->faker->year,
            'available' => $this->faker->boolean,
            'genre_id' => Genres::inRandomOrder()->first()->id,
        ];
    }
}
