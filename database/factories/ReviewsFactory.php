<?php

namespace Database\Factories;

use App\Models\Movies;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class reviewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'review' => $this->faker->text(),
            'rating' => $this->faker->numberBetween(1, 5),
            'user_id' => User::inRandomOrder()->first()->id,
            'movie_id' => Movies::inRandomOrder()->first()->id,
        ];
    }
}
