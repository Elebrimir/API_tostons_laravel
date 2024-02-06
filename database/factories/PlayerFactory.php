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
            'naf_number' => $this->faker->numberBetween(1000, 40000),
            'race' => $races[rand(0, count($races) - 1)],
            'win' => $this->faker->numberBetween(0, 4),
            'draw' => $this->faker->numberBetween(0, 4),
            'lose' => $this->faker->numberBetween(0, 4),
            'points' => $this->faker->numberBetween(0, 12),
            'touchdowns' => $this->faker->numberBetween(0, 40),
            'casualties' => $this->faker->numberBetween(0, 64),
            'triple_skull' => $this->faker->numberBetween(0, 4),
        ];
    }
}
