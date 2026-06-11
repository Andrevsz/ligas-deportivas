@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1 style="margin: 0;">Gestionar Partido</h1>
        <a href="{{ route('partidos.index') }}" class="btn-glass" style="background: rgba(255,255,255,0.05);">← Volver</a>
    </div>

    @if ($errors->any())
        <div style="background: rgba(255, 50, 50, 0.2); border: 1px solid rgba(255, 50, 50, 0.4); padding: 15px; border-radius: 8px; margin-bottom: 20px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('partidos.update', $partido->id) }}" method="POST">
        @csrf
        @method('PUT') 

        <label for="liga_id">Liga / Torneo</label>
        <select name="liga_id" id="liga_id" class="glass-input" required>
            @foreach($ligas as $liga)
                <option value="{{ $liga->id }}" style="color: black;" {{ $partido->liga_id == $liga->id ? 'selected' : '' }}>
                    {{ $liga->nombre }}
                </option>
            @endforeach
        </select>

        <div style="display: flex; gap: 20px; margin-top: 15px;">
            <div style="flex: 1;">
                <label for="equipo_local_id">Equipo Local</label>
                <select name="equipo_local_id" id="equipo_local_id" class="glass-input" required>
                    @foreach($equipos as $equipo)
                        <option value="{{ $equipo->id }}" style="color: black;" {{ $partido->equipo_local_id == $equipo->id ? 'selected' : '' }}>
                            {{ $equipo->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="flex: 1;">
                <label for="equipo_visitante_id">Equipo Visitante</label>
                <select name="equipo_visitante_id" id="equipo_visitante_id" class="glass-input" required>
                    @foreach($equipos as $equipo)
                        <option value="{{ $equipo->id }}" style="color: black;" {{ $partido->equipo_visitante_id == $equipo->id ? 'selected' : '' }}>
                            {{ $equipo->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <label for="fecha_hora">Fecha y Hora</label>
        <input type="datetime-local" name="fecha_hora" id="fecha_hora" class="glass-input" value="{{ old('fecha_hora', date('Y-m-d\TH:i', strtotime($partido->fecha_hora))) }}" required>

        <div style="margin-top: 25px; padding: 20px; background: rgba(255,255,255,0.02); border: 1px dashed rgba(255,255,255,0.1); border-radius: 10px;">
            <h3 style="margin-top: 0; color: #00d2ff;">Resultado Final (Opcional)</h3>
            <div style="display: flex; gap: 20px; align-items: center;">
                <div style="flex: 1;">
                    <label for="resultado_local">Puntuación Local</label> <input type="number" name="resultado_local" id="resultado_local" class="glass-input" value="{{ old('resultado_local', $partido->resultado_local) }}" min="0" placeholder="-">
                </div>
                <div style="font-size: 2em; margin-top: 25px; opacity: 0.5;">X</div>
                <div style="flex: 1;">
                    <label for="resultado_visitante">Puntuación Visitante</label> <input type="number" name="resultado_visitante" id="resultado_visitante" class="glass-input" value="{{ old('resultado_visitante', $partido->resultado_visitante) }}" min="0" placeholder="-">
                </div>
            </div>
        </div>

        <div style="margin-top: 30px; text-align: right;">
            <button type="submit" class="btn-glass" style="background: rgba(0, 150, 255, 0.2); border-color: rgba(0, 150, 255, 0.4);">Actualizar Partido</button>
        </div>
    </form>
@endsection