<?php

namespace Database\Factories;

use App\Models\Movies;
use App\Models\Casts;
use Illuminate\Database\Eloquent\Factories\Factory;

class CastMoviesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'movie_id' => Movies::inRandomOrder()->first()->id,
            'cast_id' => Casts::inRandomOrder()->first()->id,  
        ];
    }
}
