<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/fecha', function () {
    return response()->json(['fecha' => date("d/m/y h:m:s")]);
});

Route::get('saludo/{nombre?}', function ($nombre = "Invitado") {
    return response()->json(['saludo' => "Hola, $nombre"]);
})->where('nombre', "[A-Za-z]+");
