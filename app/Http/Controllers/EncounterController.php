<?php

namespace App\Http\Controllers;

use App\Models\Encounter;
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
    public function store(Request $request)
    {
        $encounter = new Encounter();
        $encounter->table = $request->table;
        $encounter->round_id = $request->round_id;
        $encounter->player1_id = $request->player1_id;
        $encounter->player2_id = $request->player2_id;
        $encounter->save();

        return response()->json($encounter, 201);
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
