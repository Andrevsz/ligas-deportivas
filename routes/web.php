<?php

use App\Http\Controllers\{LigaController, EquipoController, JugadorController, PartidoController};
use App\Models\Liga;
use App\Models\User; // Importante para poder crear el tester
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Importante para iniciar sesión

// Ruta pública de inicio
Route::get('/', function () {
    $ligasDestacadas = Liga::latest()->take(3)->get(); 
    return view('welcome', compact('ligasDestacadas'));
});

// RUTA MÁGICA DEL TESTER
Route::get('/modo-tester', function () {
    // 1. Busca un usuario con este correo, si no existe, lo crea al instante
    $tester = User::firstOrCreate(
        ['email' => 'tester@sistemaligas.com'],
        [
            'name' => 'Evaluador Invitado',
            'password' => bcrypt('tester1234') // Contraseña segura por defecto
        ]
    );

    // 2. Fuerza el inicio de sesión con ese usuario
    Auth::login($tester);

    // 3. Lo redirige directamente al panel de control
    return redirect()->route('dashboard');
})->name('tester.login');

// Rutas protegidas (Login requerido)
Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/dashboard', function () { 
        return view('dashboard'); 
    })->name('dashboard');

    // Genera automáticamente ligas.index, ligas.create, ligas.store, etc.
    Route::resource('ligas', LigaController::class);
    Route::resource('equipos', EquipoController::class);
    Route::resource('jugadores', JugadorController::class);
    Route::resource('partidos', PartidoController::class);
    
});

require __DIR__.'/auth.php';