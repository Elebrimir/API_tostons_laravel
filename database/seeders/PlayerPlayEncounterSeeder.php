<?php

namespace Database\Seeders;

use App\Models\PlayerPlayEncounter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerPlayEncounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PlayerPlayEncounter::factory(5)->create();
    }
}
