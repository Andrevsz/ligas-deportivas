<?php

namespace App\Http\Controllers;

use App\Models\Liga;
use Illuminate\Http\Request;

class LigaController extends Controller
{
    // 1. Mostrar la lista de todas las ligas
    public function index()
    {
        $ligas = Liga::all();
        return view('ligas.index', compact('ligas'));
    }

    // 2. Mostrar el formulario para crear una nueva liga
    public function create()
    {
        return view('ligas.create');
    }

    // 3. Recibir los datos del formulario, validarlos y guardarlos en la BD
    public function store(Request $request)
    {
        // Validación estricta
        $request->validate([
            'nombre' => 'required|string|max:255',
            'deporte' => 'required|string|max:255',
            'temporada' => 'required|digits:4|integer',
            'descripcion' => 'nullable|string'
        ]);

        // Guardar en base de datos
        Liga::create($request->all());

        // Redirigir a la lista con un mensaje de éxito
        return redirect()->route('ligas.index')->with('success', 'Liga creada exitosamente.');
    }

    // 4. Mostrar los detalles de una sola liga
    public function show(Liga $liga)
    {
        return view('ligas.show', compact('liga'));
    }

    // 5. Mostrar el formulario para editar una liga existente
    public function edit(Liga $liga)
    {
        return view('ligas.edit', compact('liga'));
    }

    // 6. Recibir los datos editados, validarlos y actualizar la BD
    public function update(Request $request, Liga $liga)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'deporte' => 'required|string|max:255',
            'temporada' => 'required|digits:4|integer',
            'descripcion' => 'nullable|string'
        ]);

        $liga->update($request->all());

        return redirect()->route('ligas.index')->with('success', 'Liga actualizada exitosamente.');
    }

    // 7. Eliminar la liga de la BD
    public function destroy(Liga $liga)
    {
        $liga->delete();
        return redirect()->route('ligas.index')->with('success', 'Liga eliminada exitosamente.');
    }
}