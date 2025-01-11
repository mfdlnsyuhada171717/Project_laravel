<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(GenresSeeder::class);
        $this->call(MoviesSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(ProfilesSeeder::class);
        $this->call(CastsSeeder::class);
        $this->call(CastMoviesSeeder::class);
        $this->call(ReviewsSeeder::class);
    }
}
