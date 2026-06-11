@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1 style="margin: 0;">Editar Liga</h1>
        <a href="{{ route('ligas.index') }}" class="btn-glass" style="background: rgba(255,255,255,0.05);">← Volver</a>
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

    <form action="{{ route('ligas.update', $liga->id) }}" method="POST">
        @csrf
        @method('PUT') 

        <label for="nombre">Nombre de la Liga</label>
        <input type="text" name="nombre" id="nombre" class="glass-input" value="{{ old('nombre', $liga->nombre) }}" required>

        <label for="deporte">Deporte</label>
        <input type="text" name="deporte" id="deporte" class="glass-input" value="{{ old('deporte', $liga->deporte) }}" required>

        <label for="temporada">Temporada (Año)</label>
        <input type="number" name="temporada" id="temporada" class="glass-input" value="{{ old('temporada', $liga->temporada) }}" required>

        <label for="descripcion">Descripción (Opcional)</label>
        <textarea name="descripcion" id="descripcion" rows="4" class="glass-input">{{ old('descripcion', $liga->descripcion) }}</textarea>

        <div style="margin-top: 30px; text-align: right;">
            <button type="submit" class="btn-glass" style="background: rgba(0, 150, 255, 0.2); border-color: rgba(0, 150, 255, 0.4);">Actualizar Liga</button>
        </div>
    </form>
@endsection