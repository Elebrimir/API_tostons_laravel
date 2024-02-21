<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Player::get();
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
    public function store(Request $request)
    {
        $player = new Player();
        $player->user_id = $request->user_id;
        $player->naf_number = $request->naf_number;
        $player->race = $request->race;
        $player->win = $request->win;
        $player->draw = $request->draw;
        $player->lose = $request->lose;
        $player->points = $request->points;
        $player->touchdowns = $request->touchdowns;
        $player->casualties = $request->casualties;
        $player->triple_skull = $request->triple_skull;
        $player->save();

        return response()->json($player, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        return $player;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        try {
            $player->race = $request->race;
            $player->win = $request->win;
            $player->draw = $request->draw;
            $player->lose = $request->lose;
            $player->points = $request->points;
            $player->touchdowns = $request->touchdowns;
            $player->casualties = $request->casualties;
            $player->triple_skull = $request->triple_skull;
            $player->save();

            return response()->json($player, 200);
        } catch (\Exception $e) {
            // Loguear el error para propósitos de depuración
            logger()->error('Error al actualizar el jugador: ' . $e->getMessage());

            // Devolver una respuesta de error
            return response()->json([
                'message' => 'Error al actualizar el jugador',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        $player->delete();
        return response()->json([
            'message' => 'Jugador Eliminado',
            'player' => $player
        ]);
    }
}
