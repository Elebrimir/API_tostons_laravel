<?php

use App\Http\Controllers\EditionController;
use App\Http\Controllers\EncounterController;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PlayerPlayEditionController;
use App\Http\Controllers\PlayerPlayEncounterController;
use App\Http\Controllers\RoundController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::apiResource('/v1/users', UserController::class);
Route::apiResource('/v1/staffs', StaffController::class);
Route::apiResource('/v1/players', PlayerController::class);
Route::apiResource('/v1/editionsPlayed', PlayerPlayEditionController::class);
Route::apiResource('/v1/encountersPlayed', PlayerPlayEncounterController::class);
Route::apiResource('/v1/edition', EditionController::class);
Route::apiResource('/v1/rounds', RoundController::class);
Route::apiResource('/v1/encounter', EncounterController::class);
Route::apiResource('/v1/gifts', GiftController::class);

Route::get('/v1/players-with-users', [PlayerController::class, 'indexPlayerWithUser']);
