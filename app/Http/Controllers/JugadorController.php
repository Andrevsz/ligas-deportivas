<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'equipo_id' => 'required|exists:equipos,id',
            'nombre_completo' => 'required|string|max:255',
            'dorsal' => 'nullable|integer',
            'posicion' => 'nullable|string|max:255',
        ]);

        Jugador::create($request->all());

        // back() te regresa a la ficha del equipo sin recargar toda la navegación
        return back()->with('success', 'Jugador agregado a la plantilla.');
    }

    public function destroy(Jugador $jugador)
    {
        $jugador->delete();

        // Igual aquí, borramos y volvemos a la misma ficha del equipo
        return back()->with('success', 'Jugador eliminado de la plantilla.');
    }
}