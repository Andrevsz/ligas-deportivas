@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1 style="margin: 0;">Crear Nuevo Equipo</h1>
        <a href="{{ route('equipos.index') }}" class="btn-glass" style="background: rgba(255,255,255,0.05);">← Volver</a>
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

    <form action="{{ route('equipos.store') }}" method="POST">
        @csrf 

        <label for="liga_id">Seleccionar Liga</label>
        <select name="liga_id" id="liga_id" class="glass-input" required>
            <option value="" disabled selected style="color: black;">-- Elige una Liga --</option>
            @foreach($ligas as $liga)
                <option value="{{ $liga->id }}" style="color: black;">{{ $liga->nombre }} ({{ $liga->temporada }})</option>
            @endforeach
        </select>

        <label for="nombre">Nombre del Equipo</label>
        <input type="text" name="nombre" id="nombre" class="glass-input" value="{{ old('nombre') }}" placeholder="Ej: Los Halcones" required>

        <label for="ciudad">Ciudad</label>
        <input type="text" name="ciudad" id="ciudad" class="glass-input" value="{{ old('ciudad') }}" placeholder="Ej: Santiago" required>

        <label for="logo_url">URL del Logo (Opcional)</label>
        <input type="url" name="logo_url" id="logo_url" class="glass-input" value="{{ old('logo_url') }}" placeholder="https://...">

        <div style="margin-top: 30px; text-align: right;">
            <button type="submit" class="btn-glass" style="background: rgba(0, 200, 100, 0.2); border-color: rgba(0, 200, 100, 0.4);">Guardar Equipo</button>
        </div>
    </form>
@endsection