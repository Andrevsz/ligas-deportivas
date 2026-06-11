<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Liga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipoController extends Controller
{
    // LEER: Solo equipos de las ligas del usuario conectado
    public function index()
    {
        $equipos = Equipo::whereHas('liga', function($query) {
            $query->where('user_id', Auth::id());
        })->with('liga')->get();

        return view('equipos.index', compact('equipos'));
    }

    // CREAR: Solo mandamos al formulario las ligas de este usuario
    public function create()
    {
        $ligas = Liga::where('user_id', Auth::id())->where('estado_activa', true)->get();
        return view('equipos.create', compact('ligas'));
    }

    public function store(Request $request)
    {
        // Validación de pertenencia: el torneo seleccionado debe ser del usuario logueado
        $request->validate([
            'liga_id' => [
                'required',
                'exists:ligas,id',
                function ($attribute, $value, $fail) {
                    $liga = Liga::find($value);
                    if ($liga && $liga->user_id !== Auth::id()) {
                        $fail('No tienes autorización para añadir equipos a esta liga.');
                    }
                }
            ],
            'nombre' => 'required|string|max:255',
            'entrenador' => 'nullable|string|max:255',
        ]);

        Equipo::create($request->all());
        return redirect()->route('equipos.index')->with('success', 'Equipo inscrito con éxito.');
    }

    // MOSTRAR: Ficha técnica del equipo (Plantilla de Jugadores)
    public function show(Equipo $equipo)
    {
        // Seguridad: Verificar que el equipo pertenezca a una liga tuya
        if ($equipo->liga->user_id !== Auth::id()) { 
            abort(403, 'No tienes permiso para ver este equipo.'); 
        }

        // Cargamos el equipo junto con todos sus jugadores
        $equipo->load('jugadores'); 
        
        return view('equipos.show', compact('equipo'));
    }

    public function update(Request $request, Equipo $equipo)
    {
        if ($equipo->liga->user_id !== Auth::id()) { abort(403); }

        $request->validate([
            'liga_id' => 'required|exists:ligas,id',
            'nombre' => 'required|string|max:255',
            'entrenador' => 'nullable|string|max:255',
        ]);

        $equipo->update($request->all());
        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado.');
    }

    public function destroy(Equipo $equipo)
    {
        if ($equipo->liga->user_id !== Auth::id()) { abort(403); }

        $equipo->delete();
        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado.');
    }
}