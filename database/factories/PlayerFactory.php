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

        $userId = User::inRandomOrder()->value('id') ?? User::factory()->create()->id;

        return [
            'user_id' => $userId,
            'race' => fake()->name(),
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
