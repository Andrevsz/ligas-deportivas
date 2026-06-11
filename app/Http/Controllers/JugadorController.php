<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use App\Models\Equipo; // Importamos Equipo para los menús desplegables
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    public function index()
    {
        // Traemos los jugadores con la información de su equipo
        $jugadores = Jugador::with('equipo')->get();
        return view('jugadores.index', compact('jugadores'));
    }

    public function create()
    {
        // Enviamos todos los equipos a la vista
        $equipos = Equipo::all();
        return view('jugadores.create', compact('equipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'equipo_id' => 'required|exists:equipos,id',
            'nombre_completo' => 'required|string|max:255',
            'posicion' => 'required|string|max:100',
            'dorsal' => 'required|integer|min:1|max:99'
        ]);

        Jugador::create($request->all());
        return redirect()->route('jugadores.index')->with('success', 'Jugador registrado exitosamente.');
    }

    public function show(Jugador $jugador)
    {
        return view('jugadores.show', compact('jugador'));
    }

    public function edit(Jugador $jugador)
    {
        $equipos = Equipo::all();
        return view('jugadores.edit', compact('jugador', 'equipos'));
    }

    public function update(Request $request, Jugador $jugador)
    {
        $request->validate([
            'equipo_id' => 'required|exists:equipos,id',
            'nombre_completo' => 'required|string|max:255',
            'posicion' => 'required|string|max:100',
            'dorsal' => 'required|integer|min:1|max:99'
        ]);

        $jugador->update($request->all());
        return redirect()->route('jugadores.index')->with('success', 'Jugador actualizado.');
    }

    public function destroy(Jugador $jugador)
    {
        $jugador->delete();
        return redirect()->route('jugadores.index')->with('success', 'Jugador eliminado.');
    }
}