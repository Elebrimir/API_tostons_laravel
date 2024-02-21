<?php

namespace Database\Factories;

use App\Models\Edition;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Round>
 */
class RoundFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $editionId = Edition::inRandomOrder()->value('id') ?? Edition::factory()->create()->id;

        return [
            'number' => $this->faker->numberBetween(1, 1),
            'edition_id' => $editionId,
        ];
    }
}
