<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LigaController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\PartidoController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('ligas', LigaController::class);
Route::resource('equipos', EquipoController::class);
Route::resource('jugadores', JugadorController::class);
Route::resource('partidos', PartidoController::class);