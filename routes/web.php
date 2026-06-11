<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LigaController;
Route::get('/', function () {
    return view('welcome');
});

Route::resource('ligas', LigaController::class);