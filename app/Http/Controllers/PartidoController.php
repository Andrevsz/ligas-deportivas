<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 

class PartidoController extends Controller
{
    public function index()
    {
        $partidos = Partido::whereHas('equipoLocal.liga', function($q) {
            $q->where('user_id', Auth::id());
        })->with(['equipoLocal', 'equipoVisitante'])->get();

        return view('partidos.index', compact('partidos'));
    }

    public function create()
    {
        $equipos = Equipo::whereHas('liga', function($q) {
            $q->where('user_id', Auth::id());
        })->get();

        return view('partidos.create', compact('equipos'));
    }

    /**
     * CREAR: Programar Partido protegido con Transacción
     */
    public function store(Request $request)
    {
        $request->validate([
            'equipo_local_id' => 'required|exists:equipos,id',
            'equipo_visitante_id' => 'required|exists:equipos,id|different:equipo_local_id',
            'resultado_local' => 'nullable|string|max:255',
            'resultado_visitante' => 'nullable|string|max:255',
            'fecha_hora' => 'required|date',
        ], [
            'equipo_visitante_id.different' => 'Un equipo no puede jugar contra sí mismo.',
            'fecha_hora.required' => 'Debes ingresar la fecha y hora.'
        ]);

        // Iniciamos el bloque seguro try-catch para atrapar cualquier fallo inesperado
        try {
            // Abrimos la transacción en la base de datos
            DB::beginTransaction();

            $datos = $request->all();
            $equipoLocal = Equipo::findOrFail($request->equipo_local_id);
            $datos['liga_id'] = $equipoLocal->liga_id;

            // Operación CRUD
            Partido::create($datos);

            // Si todo fue exitoso, consolidamos los cambios
            DB::commit();

            return redirect()->route('partidos.index')->with('success', 'Partido programado con éxito.');

        } catch (\Exception $e) {
            // Si ocurre CUALQUIER error de sistema, deshacemos todo lo que alcanzó a cambiar
            DB::rollBack();

            // Devolvemos al usuario a la pantalla anterior con un mensaje técnico contextualizado
            return back()->withErrors(['Error' => 'No se pudo guardar el partido debido a un problema interno: ' . $e->getMessage()])->withInput();
        }
    }

    public function edit(Partido $partido)
    {
        if ($partido->equipoLocal->liga->user_id !== Auth::id()) { abort(403); }

        return view('partidos.edit', compact('partido'));
    }

    /**
     * ACTUALIZAR: Procesar Multimarcador protegido con Transacción
     */
    public function update(Request $request, Partido $partido)
    {
        if ($partido->equipoLocal->liga->user_id !== Auth::id()) { abort(403); }

        $request->validate([
            'resultado_local' => 'required|array',
            'resultado_visitante' => 'required|array',
        ], [
            'resultado_local.required' => 'Ingresa el marcador local.',
            'resultado_visitante.required' => 'Ingresa el marcador visitante.'
        ]);

        try {
            // Iniciamos transacción
            DB::beginTransaction();

            $localFiltrado = array_filter($request->resultado_local, function($val) { return $val !== null && $val !== ''; });
            $visitanteFiltrado = array_filter($request->resultado_visitante, function($val) { return $val !== null && $val !== ''; });

            $resLocal = implode(' | ', $localFiltrado);
            $resVisitante = implode(' | ', $visitanteFiltrado);

            // Operación CRUD
            $partido->update([
                'resultado_local' => $resLocal,
                'resultado_visitante' => $resVisitante
            ]);

            // Consolidamos cambios
            DB::commit();

            return redirect()->route('partidos.index')->with('success', 'Resultado oficial actualizado.');

        } catch (\Exception $e) {
            // Revertimos en caso de fallo
            DB::rollBack();
            return back()->withErrors(['Error' => 'Error al procesar el marcador: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * ELIMINAR: Cancelar Partido protegido con Transacción
     */
    public function destroy(Partido $partido)
    {
        if ($partido->equipoLocal->liga->user_id !== Auth::id()) { abort(403); }

        try {
            DB::beginTransaction();

            // Operación CRUD
            $partido->delete();

            DB::commit();
            return redirect()->route('partidos.index')->with('success', 'Partido cancelado correctamente.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('partidos.index')->with('error', 'No se pudo cancelar el partido.');
        }
    }
}