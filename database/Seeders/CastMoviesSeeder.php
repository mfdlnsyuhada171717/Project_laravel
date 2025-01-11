<?php

namespace Database\Seeders;

use App\Models\CastMovies;
use App\Models\Casts;
use App\Models\Movies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CastMoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CastMovies::factory(10)->create();
    }
}
