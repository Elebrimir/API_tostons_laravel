<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $races = [
            'human',
            'old world alliance',
            'imperial nobility',
            'black orc',
            'snotlings',
            'orc',
            'dwarf',
            'high elf',
            'skaven',
            'dark elf',
            'chaos chosen',
            'chaos renegade',
            'dwarf chaos',
            'shambling undead',
            'amazons',
            'goblin',
            'halfling',
            'wood elf',
            'necromantic horror',
            'elven union',
            'lizardmen',
            'nurgle',
            'khorne',
            'bretonia',
            'vampire',
            'ogre',
            'norse',
            'khemri',
            'slann',
            'underworld'
        ];

        return [
            'user_id' => User::factory(),
            'naf_number' => fake()->numberBetween(1000, 40000),
            'race' => $races[rand(0, count($races) - 1)],
            'win' => fake()->numberBetween(0, 4),
            'draw' => fake()->numberBetween(0, 4),
            'lose' => fake()->numberBetween(0, 4),
            'points' => fake()->numberBetween(0, 12),
            'touchdowns' => fake()->numberBetween(0, 40),
            'casualties' => fake()->numberBetween(0, 64),
            'triple_skull' => fake()->numberBetween(0, 10),
        ];
    }
}
