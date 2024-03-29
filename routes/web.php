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

Route::middleware(['auth:sanctum'])->group(function () {

    Route::middleware(['admin'])->get('/usuarios', function () {
        return Inertia::render('Users/Users', [
            'users' => User::get()
        ]);
    })->name('usuarios');

    Route::get('/players', function () {
        return Inertia::render('Players/Players', [
            'players' => Player::get(),
            'users' => User::get()
        ]);
    })->name('players');

    Route::get('/partidos', function () {
        return Inertia::render('Encounters/Encounters', [
            'encounters' => Encounter::get(),
            'players' => Player::get(),
            'users' => User::get()
        ]);
    })->name('partidos');
});
