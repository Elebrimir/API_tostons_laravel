<?php

namespace Database\Seeders;

use App\Models\Player_play_encounter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Player_play_encounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Player_play_encounter::factory(10)->create();
    }
}
