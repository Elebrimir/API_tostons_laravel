<?php

namespace App\Http\Controllers;

use App\Models\Player_play_encounter;
use Illuminate\Http\Request;

class PlayerPlayEncounterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Player_play_encounter::get();
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Player_play_encounter $player_play_encounter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player_play_encounter $player_play_encounter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player_play_encounter $player_play_encounter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player_play_encounter $player_play_encounter)
    {
        //
    }
}
