<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

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
        $player->race = $request->race;
        $player->win = $request->win;
        $player->draw = $request->draw;
        $player->loss = $request->loss;
        $player->points = $request->points;
        $player->touchdowns = $request->tounchdowns;
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
        $player->race = $request->race;
        $player->win = $request->win;
        $player->draw = $request->draw;
        $player->loss = $request->loss;
        $player->points = $request->points;
        $player->touchdowns = $request->tounchdowns;
        $player->casualties = $request->casualties;
        $player->triple_skull = $request->triple_skull;
        $player->save();

        return response()->json($player, 200);
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
