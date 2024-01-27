<?php

namespace Database\Factories;

use App\Models\Player_play_encounter;
use App\Models\Encounter;
use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Player_play_encounterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $players_ids = Player::pluck('user_id')->toArray();
        $encounters_ids = Encounter::pluck('id')->toArray();

        $faker = \Faker\Factory::create();

        $player_id = $faker->randomElement($players_ids);
        $encounter_id = $faker->randomElement($encounters_ids);

        return [
            'player_id' => $player_id,
            'encounter_id' => $encounter_id,
            'td_player1' => $faker->numberBetween(0, 5),
            'td_player2' => $faker->numberBetween(0, 5),
            'cas_player1' => $faker->numberBetween(0, 16),
            'cas_player2' => $faker->numberBetween(0, 16),
            'triple_skull' => $faker->numberBetween(0, 3),
        ];
    }
}
