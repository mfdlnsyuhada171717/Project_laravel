<?php

namespace Database\Seeders;

use App\Models\Genres;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genres::insert([
            ['id' => Str::uuid(), 'name' => 'Action'],
            ['id' => Str::uuid(), 'name' => 'Drama'],
            ['id' => Str::uuid(), 'name' => 'Comedy'],
            ['id' => Str::uuid(), 'name' => 'Horor'],
            ['id' => Str::uuid(), 'name' => 'Thriller'],
            ['id' => Str::uuid(), 'name' => 'Romance'],
        ]);
    }
}
