<?php

namespace App\Http\Controllers;

use App\Models\PlayerPlayEncounter;
use Illuminate\Http\Request;

class PlayerPlayEncounterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PlayerPlayEncounter::get();
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
    public function show(PlayerPlayEncounter $player_play_encounter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlayerPlayEncounter $player_play_encounter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PlayerPlayEncounter $player_play_encounter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlayerPlayEncounter $player_play_encounter)
    {
        //
    }
}
