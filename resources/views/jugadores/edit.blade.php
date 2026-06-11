@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1 style="margin: 0;">Editar Jugador</h1>
        <a href="{{ route('jugadores.index') }}" class="btn-glass" style="background: rgba(255,255,255,0.05);">← Volver</a>
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

    <form action="{{ route('jugadores.update', $jugador->id) }}" method="POST">
        @csrf
        @method('PUT') 

        <label for="equipo_id">Seleccionar Equipo</label>
        <select name="equipo_id" id="equipo_id" class="glass-input" required>
            @foreach($equipos as $equipo)
                <option value="{{ $equipo->id }}" style="color: black;" {{ $jugador->equipo_id == $equipo->id ? 'selected' : '' }}>
                    {{ $equipo->nombre }} ({{ $equipo->liga->nombre }})
                </option>
            @endforeach
        </select>

        <label for="nombre_completo">Nombre Completo</label>
        <input type="text" name="nombre_completo" id="nombre_completo" class="glass-input" value="{{ old('nombre_completo', $jugador->nombre_completo) }}" required>

        <label for="posicion">Posición en el campo</label>
        <input type="text" name="posicion" id="posicion" class="glass-input" value="{{ old('posicion', $jugador->posicion) }}" required>

        <label for="dorsal">Número de Dorsal</label>
        <input type="number" name="dorsal" id="dorsal" class="glass-input" value="{{ old('dorsal', $jugador->dorsal) }}" min="1" max="99" required>

        <div style="margin-top: 30px; text-align: right;">
            <button type="submit" class="btn-glass" style="background: rgba(0, 150, 255, 0.2); border-color: rgba(0, 150, 255, 0.4);">Actualizar Jugador</button>
        </div>
    </form>
@endsection