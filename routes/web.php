<?php

use App\Models\Encounter;
use App\Models\Player;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


Route::middleware('auth:sanctum')->get('/players', function () {
    return Inertia::render('Players/Players', [
        'players' => Player::get(),
        'users' => User::get()
    ]);
})->name('players');

Route::middleware('auth:sanctum')->get('/partidos', function () {
    return Inertia::render('Encounters/Encounters', [
        'encounters' => Encounter::get(),
        'players' => Player::get(),
        'users' => User::get()
    ]);
})->name('partidos');

Route::delete('/partidos/{id}', function () {
    return Inertia::render(('Encounters/Encounters'));
})->name('partidos.destroy');
