<?php

namespace Database\Seeders;

use App\Models\Casts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CastsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Casts::factory(10)->create();
    }
}
