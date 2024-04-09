<?php

namespace App\Services;

use App\Models\Player;

class PlayerMatchingService
{
    public function matchPlayers($players)
    {
        // Ordenar jugadores por puntos en el torneo
        usort($players, function ($a, $b) {
            return $b->points - $a->points;
        });

        // Inicializar arreglo para registrar emparejamientos
        $pairings = [];

        // Emparejar jugadores por puntos en el torneo
        $count = count($players);
        for ($i = 0; $i < $count; $i += 2) {
            if ($i + 1 < $count) {
                $pairings[] = [$players[$i], $players[$i + 1]];
            } else {
                // Si hay un número impar de jugadores, el último jugador descansa
                // o se empareja con el siguiente jugador con menos puntos
                // (en este ejemplo, descansa)
                $pairings[] = [$players[$i], null];
            }
        }

        // Si todos los jugadores están emparejados, detenerse aquí
        if (count($pairings) === ceil($count / 2)) {
            return $pairings;
        }

        // Emparejar jugadores por puntos del rival, diferencia de goles, y diferencia de bajas
        // (implementa los criterios adicionales según sea necesario)

        return $pairings;
    }

    public function matchPlayersByCriteria($pairings, $players)
    {
        // Agrupar jugadores con la misma cantidad de puntos en el torneo
        $groupedPlayers = [];
        foreach ($players as $player) {
            $groupedPlayers[$player->points][] = $player;
        }

        // Emparejar jugadores dentro de cada grupo utilizando criterios de desempate
        foreach ($groupedPlayers as $group) {
            // Si solo hay un jugador en el grupo, no se puede emparejar
            if (count($group) === 1) {
                continue;
            }

            // Ordenar jugadores dentro del grupo por criterios de desempate
            usort($group, function ($a, $b) {
                // Comparar por diferencia de goles a favor
                $goalDifferenceA = $a->goalsFor - $a->goalsAgainst;
                $goalDifferenceB = $b->goalsFor - $b->goalsAgainst;
                if ($goalDifferenceA !== $goalDifferenceB) {
                    return $goalDifferenceB - $goalDifferenceA; // Orden descendente
                }

                // Comparar por número de bajas
                if ($a->casualties !== $b->casualties) {
                    return $a->casualties - $b->casualties; // Orden ascendente
                }

                // Si todavía hay empate, no hay diferencia significativa, devolver 0
                return 0;
            });

            // Emparejar jugadores en el grupo
            $count = count($group);
            for ($i = 0; $i < $count; $i += 2) {
                if ($i + 1 < $count) {
                    // Comprobar si los jugadores ya se han enfrentado antes
                    $player1 = $group[$i];
                    $player2 = $group[$i + 1];
                    if (!$this->playersAlreadyPaired($pairings, $player1, $player2)) {
                        $pairings[] = [$player1, $player2];
                    }
                } else {
                    // Si hay un número impar de jugadores en el grupo, el último jugador descansa
                    $pairings[] = [$group[$i], null];
                }
            }
        }

        return $pairings;
    }

    private function playersAlreadyPaired($pairings, $player1, $player2)
    {
        foreach ($pairings as [$pairedPlayer1, $pairedPlayer2]) {
            if (($pairedPlayer1 === $player1 && $pairedPlayer2 === $player2) ||
                ($pairedPlayer1 === $player2 && $pairedPlayer2 === $player1)
            ) {
                return true;
            }
        }
        return false;
    }
}
