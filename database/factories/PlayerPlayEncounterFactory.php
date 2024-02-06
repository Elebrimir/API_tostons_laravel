<?php

namespace Database\Factories;

use App\Models\Encounter;
use App\Models\PlayerPlayEncounter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PlayerPlayEncounterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Obtener todos los IDs de encuentros
        $encounterIds = Encounter::pluck('id')->toArray();

        // Verificar si hay encuentros disponibles
        if (empty($encounterIds)) {
            return [];
        }

        // Seleccionar aleatoriamente un encuentro
        $encounterId = $this->faker->randomElement($encounterIds);
        $encounter = Encounter::findOrFail($encounterId);

        // Obtener los IDs de los jugadores asignados en el encuentro
        $playerIds = collect([$encounter->player1_id, $encounter->player2_id])->unique()->toArray();

        // Verificar si hay jugadores disponibles
        if (empty($playerIds)) {
            return [];
        }

        // Seleccionar aleatoriamente un jugador
        $playerId = $this->faker->randomElement($playerIds);

        // Verificar si ya existe un registro con la combinación de encounter_id y player_id en players_plays_encounters
        $existingRecord = PlayerPlayEncounter::where('player_id', $playerId)
            ->where('encounter_id', $encounter->id)
            ->exists();

        // Si ya existe un registro, devolver un array vacío para evitar la creación de un nuevo registro
        if ($existingRecord) {
            return [];
        }

        // Si no existe un registro, continuar con la creación del registro
        return [
            'player_id' => $playerId,
            'encounter_id' => $encounter->id,
            'td_player1' => $this->faker->numberBetween(0, 4),
            'td_player2' => $this->faker->numberBetween(0, 4),
            'cas_player1' => $this->faker->numberBetween(0, 16),
            'cas_player2' => $this->faker->numberBetween(0, 16),
            'triple_skull' => $this->faker->numberBetween(0, 1),
        ];
    }
}
