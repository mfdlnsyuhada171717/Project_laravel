<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class profilesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'biodata' => $this->faker->text(),
            'age' => $this->faker->numberBetween(1, 50),
            'avatar' => $this->faker->imageUrl(),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
