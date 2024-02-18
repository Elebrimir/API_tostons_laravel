<?php

namespace App\Http\Controllers;

use App\Models\Encounter;
use App\Models\Player;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class EncounterViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los encuentros
        $encounters = Encounter::all();

        // Verificar si hay datos relacionados en la tabla players_plays_encounters para cada encuentro
        foreach ($encounters as $encounter) {
            $hasRelatedData = DB::table('players_plays_encounters')
                ->where('encounter_id', $encounter->id)
                ->exists();
            // Agregar una propiedad 'canDelete' al encuentro que indica si se puede eliminar o no
            $encounter->canDelete = !$hasRelatedData;
        }

        // Pasar los encuentros a la vista
        return Inertia::render('Encounters/Encounters', [
            'encounters' => $encounters,
            'players' => Player::all(),
            'users' => User::all(),
        ]);
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
    public function show(Encounter $encounter)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Encounter $encounter)
    {
        Log::info('Solicitud DELETE recibida para eliminar el encuentro con ID: ' . $encounter->id);

        $encounter->delete();

        return redirect()->back()->with('success', 'Encounter deleted successfully');
    }
}
