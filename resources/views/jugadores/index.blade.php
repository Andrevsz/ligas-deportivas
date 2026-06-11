@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1 style="margin: 0;">Jugadores Registrados</h1>
        <a href="{{ route('jugadores.create') }}" class="btn-glass">+ Nuevo Jugador</a>
    </div>

    @if(session('success'))
        <div style="background: rgba(0, 255, 0, 0.1); border: 1px solid rgba(0, 255, 0, 0.3); padding: 15px; border-radius: 8px; margin-top: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Dorsal</th>
                <th>Nombre Completo</th>
                <th>Equipo</th>
                <th>Posición</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jugadores as $jugador)
                <tr>
                    <td><strong style="font-size: 1.2em;">#{{ $jugador->dorsal }}</strong></td>
                    <td>{{ $jugador->nombre_completo }}</td>
                    <td>{{ $jugador->equipo->nombre }}</td>
                    <td>{{ $jugador->posicion }}</td>
                    <td style="display: flex; gap: 10px;">
                        <a href="{{ route('jugadores.edit', $jugador->id) }}" class="btn-glass">Editar</a>
                        <form action="{{ route('jugadores.destroy', $jugador->id) }}" method="POST" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-glass btn-danger" onclick="return confirm('¿Eliminar a este jugador?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($jugadores->isEmpty())
        <p style="text-align: center; margin-top: 30px; opacity: 0.7;">No hay jugadores registrados todavía.</p>
    @endif
@endsection