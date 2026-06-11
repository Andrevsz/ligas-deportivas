<?php

namespace App\Http\Controllers;

use App\Models\Liga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Vital para saber quién está logueado

class LigaController extends Controller
{
    // 1. LEER: Mostrar solo las ligas del usuario conectado
    public function index()
    {
        $ligas = Liga::where('user_id', Auth::id())->get();
        return view('ligas.index', compact('ligas'));
    }

    // 2. CREAR: Mostrar formulario
    public function create()
    {
        return view('ligas.create');
    }

    // 3. GUARDAR NUEVA: Asignando el usuario automáticamente
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'deporte' => 'required|string|max:255',
            'temporada' => 'required|string|max:50',
            'descripcion' => 'nullable|string',
        ]);

        // Clonamos los datos del formulario y le inyectamos el ID del usuario
        $datos = $request->all();
        $datos['user_id'] = Auth::id(); 

        Liga::create($datos);

        return redirect()->route('ligas.index')->with('success', 'Liga creada con éxito.');
    }

    // 4. EDITAR: Mostrar formulario con los datos actuales
    public function edit(Liga $liga)
    {
        // Seguridad extra: ¿Esta liga es tuya? Si no, te bloqueo.
        if ($liga->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar esta liga.');
        }

        return view('ligas.edit', compact('liga'));
    }

    // 5. ACTUALIZAR: Guardar los cambios editados
    public function update(Request $request, Liga $liga)
    {
        if ($liga->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'deporte' => 'required|string|max:255',
            'temporada' => 'required|string|max:50',
            'descripcion' => 'nullable|string',
        ]);

        $liga->update($request->all());

        return redirect()->route('ligas.index')->with('success', 'Liga actualizada correctamente.');
    }

    // 6. ELIMINAR: Borrar registro
    public function destroy(Liga $liga)
    {
        if ($liga->user_id !== Auth::id()) {
            abort(403);
        }

        $liga->delete();

        return redirect()->route('ligas.index')->with('success', 'Liga eliminada definitivamente.');
    }
}