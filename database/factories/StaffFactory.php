<?php

namespace Database\Factories;

use  App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rols = [
            'founder',
            'veteran_staff',
            'new_staff',
        ];
        return [
            'user_id' => User::factory(),
            'rol' => $rols[rand(0, count($rols) - 1)],
        ];
    }
}
