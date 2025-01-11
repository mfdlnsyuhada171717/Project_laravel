<?php

namespace Database\Seeders;

use App\Models\Profiles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profiles::factory(10)->create();
    }
}
