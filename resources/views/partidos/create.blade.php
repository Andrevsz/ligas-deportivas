@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1 style="margin: 0;">Programar Partido</h1>
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

    <form action="{{ route('partidos.store') }}" method="POST">
        @csrf 

        <label for="liga_id">Seleccionar Liga / Torneo</label>
        <select name="liga_id" id="liga_id" class="glass-input" required>
            <option value="" disabled selected style="color: black;">-- Elige una Torneo --</option>
            @foreach($ligas as $liga)
                <option value="{{ $liga->id }}" style="color: black;">{{ $liga->nombre }} ({{ $liga->temporada }})</option>
            @endforeach
        </select>

        <div style="display: flex; gap: 20px; margin-top: 15px;">
            <div style="flex: 1;">
                <label for="equipo_local_id">Equipo Local</label>
                <select name="equipo_local_id" id="equipo_local_id" class="glass-input" required>
                    <option value="" disabled selected style="color: black;">-- Seleccione Local --</option>
                    @foreach($equipos as $equipo)
                        <option value="{{ $equipo->id }}" style="color: black;">{{ $equipo->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div style="flex: 1;">
                <label for="equipo_visitante_id">Equipo Visitante</label>
                <select name="equipo_visitante_id" id="equipo_visitante_id" class="glass-input" required>
                    <option value="" disabled selected style="color: black;">-- Seleccione Visitante --</option>
                    @foreach($equipos as $equipo)
                        <option value="{{ $equipo->id }}" style="color: black;">{{ $equipo->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <label for="fecha_hora">Fecha y Hora del Encuentro</label>
        <input type="datetime-local" name="fecha_hora" id="fecha_hora" class="glass-input" value="{{ old('fecha_hora') }}" required>

        <div style="margin-top: 30px; text-align: right;">
            <button type="submit" class="btn-glass" style="background: rgba(0, 200, 100, 0.2); border-color: rgba(0, 200, 100, 0.4);">Programar Encuentro</button>
        </div>
    </form>
@endsection