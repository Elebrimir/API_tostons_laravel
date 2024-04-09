<?php

namespace App\Http\Controllers;

use App\Models\Encounter;
use App\Models\Player;
use App\Services\PlayerMatchingService;
use Illuminate\Http\Request;

class EncounterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Encounter::get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, PlayerMatchingService $playerMatchingService)
    {
        // Obtener la colección de todos los jugadores
        $players = Player::all();

        // Emparejar a los jugadores utilizando el servicio
        $pairings = $playerMatchingService->matchPlayers($players);

        // Verificar si hay al menos un par de jugadores emparejados
        if (count($pairings) < 1) {
            return response()->json(['error' => 'No hay suficientes jugadores emparejados para crear un encuentro'], 400);
        }

        // Aplicar criterios adicionales de emparejamiento si es necesario
        $pairings = $playerMatchingService->matchPlayersByCriteria($pairings, $players);

        // Inicializar un arreglo para almacenar los encuentros creados
        $encounters = [];

        // Inicializar la variable de contador
        $tableNumber = 1;

        // Iterar sobre todos los emparejamientos y crear un encuentro para cada uno
        foreach ($pairings as $pairing) {
            // Crear un nuevo encuentro con los jugadores emparejados
            $encounter = new Encounter();
            $encounter->table = $tableNumber;
            $encounter->round_id = $request->round_id;
            $encounter->player1_id = $pairing[0]->id;
            $encounter->player2_id = $pairing[1] ? $pairing[1]->id : null;
            $encounter->save();

            // Incrementar el contador de la mesa para la próxima iteración
            $tableNumber++;

            // Agregar el encuentro creado al arreglo de encuentros
            $encounters[] = $encounter;
        }

        // Devolver la respuesta con los encuentros creados
        return response()->json($encounters, 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Encounter $encounter)
    {
        return $encounter;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Encounter $encounter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Encounter $encounter)
    {
        $encounter->table = $request->table;
        $encounter->round_id = $request->round_id;
        $encounter->player1_id = $request->player1_id;
        $encounter->player2_id = $request->player2_id;
        $encounter->save();

        return response()->json($encounter, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Encounter $encounter)
    {
        $encounter->delete();
        return response()->json([
            'message'  => 'Encuentro eliminado correctamente',
            'encuentro' => $encounter
        ]);
    }
}
