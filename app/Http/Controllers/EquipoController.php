<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Liga; // Necesitamos importar Liga para llenar los formularios
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function index()
    {
        // Traemos todos los equipos E INCLUIMOS la información de su liga asociada
        $equipos = Equipo::with('liga')->get();
        return view('equipos.index', compact('equipos'));
    }

    public function create()
    {
        // Buscamos todas las ligas para mandarlas al menú desplegable del formulario
        $ligas = Liga::all();
        return view('equipos.create', compact('ligas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'liga_id' => 'required|exists:ligas,id', // Validamos que la liga exista
            'nombre' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'logo_url' => 'nullable|url'
        ]);

        Equipo::create($request->all());
        return redirect()->route('equipos.index')->with('success', 'Equipo registrado exitosamente.');
    }

    public function show(Equipo $equipo)
    {
        return view('equipos.show', compact('equipo'));
    }

    public function edit(Equipo $equipo)
    {
        // Mandamos el equipo a editar, y también TODAS las ligas para el menú desplegable
        $ligas = Liga::all();
        return view('equipos.edit', compact('equipo', 'ligas'));
    }

    public function update(Request $request, Equipo $equipo)
    {
        $request->validate([
            'liga_id' => 'required|exists:ligas,id',
            'nombre' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'logo_url' => 'nullable|url'
        ]);

        $equipo->update($request->all());
        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado.');
    }

    public function destroy(Equipo $equipo)
    {
        $equipo->delete();
        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado.');
    }
}