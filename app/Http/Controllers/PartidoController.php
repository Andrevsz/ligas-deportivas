<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use App\Models\Liga;   // Importamos Liga
use App\Models\Equipo; // Importamos Equipo
use Illuminate\Http\Request;

class PartidoController extends Controller
{
    public function index()
    {
        // Traemos partidos cargando sus 3 relaciones (Eager Loading para eficiencia)
        $partidos = Partido::with(['liga', 'equipoLocal', 'equipoVisitante'])->get();
        return view('partidos.index', compact('partidos'));
    }

    public function create()
    {
        // Necesitamos Ligas y Equipos para los formularios
        $ligas = Liga::all();
        $equipos = Equipo::all();
        return view('partidos.create', compact('ligas', 'equipos'));
    }

    public function store(Request $request)
    {
        // Validación estricta
        $request->validate([
            'liga_id' => 'required|exists:ligas,id',
            'equipo_local_id' => 'required|exists:equipos,id|different:equipo_visitante_id', // ¡No pueden ser el mismo equipo!
            'equipo_visitante_id' => 'required|exists:equipos,id',
            'fecha_hora' => 'required|date',
            'resultado_local' => 'nullable|integer|min:0',
            'resultado_visitante' => 'nullable|integer|min:0',
        ], [
            // Mensaje personalizado para cuando eligen el mismo equipo
            'equipo_local_id.different' => 'El equipo local y el visitante no pueden ser el mismo.'
        ]);

        Partido::create($request->all());
        return redirect()->route('partidos.index')->with('success', 'Partido programado exitosamente.');
    }

    public function show(Partido $partido)
    {
        return view('partidos.show', compact('partido'));
    }

    public function edit(Partido $partido)
    {
        $ligas = Liga::all();
        $equipos = Equipo::all();
        return view('partidos.edit', compact('partido', 'ligas', 'equipos'));
    }

    public function update(Request $request, Partido $partido)
    {
        $request->validate([
            'liga_id' => 'required|exists:ligas,id',
            'equipo_local_id' => 'required|exists:equipos,id|different:equipo_visitante_id',
            'equipo_visitante_id' => 'required|exists:equipos,id',
            'fecha_hora' => 'required|date',
            'resultado_local' => 'nullable|integer|min:0',
            'resultado_visitante' => 'nullable|integer|min:0',
        ], [
            'equipo_local_id.different' => 'El equipo local y el visitante no pueden ser el mismo.'
        ]);

        $partido->update($request->all());
        return redirect()->route('partidos.index')->with('success', 'Partido actualizado.');
    }

    public function destroy(Partido $partido)
    {
        $partido->delete();
        return redirect()->route('partidos.index')->with('success', 'Partido eliminado.');
    }
}