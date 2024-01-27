<?php

namespace Database\Factories;

use App\Models\Player;
use App\Models\Round;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Encounter>
 */
class EncounterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $players = Player::pluck('user_id')->toArray();
        $rounds = Round::pluck('number')->toArray();

        $player1_id = fake()->randomElement($players);
        $player2_id = fake()->randomElement(array_diff($players, [$player1_id]));
        $round_id = fake()->randomElement(($rounds));

        return [
            'round_id' => $round_id,
            'player1_id' =>  $player1_id,
            'player2_id' => $player2_id,
            'table' =>  fake()->numberBetween(1, 35),
        ];
    }
}
