@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1 style="margin: 0;">Equipos Registrados</h1>
        <a href="{{ route('equipos.create') }}" class="btn-glass">+ Nuevo Equipo</a>
    </div>

    @if(session('success'))
        <div style="background: rgba(0, 255, 0, 0.1); border: 1px solid rgba(0, 255, 0, 0.3); padding: 15px; border-radius: 8px; margin-top: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Liga a la que pertenece</th>
                <th>Ciudad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipos as $equipo)
                <tr>
                    <td>{{ $equipo->id }}</td>
                    <td>{{ $equipo->nombre }}</td>
                    <td>{{ $equipo->liga->nombre }}</td>
                    <td>{{ $equipo->ciudad }}</td>
                    <td style="display: flex; gap: 10px;">
                        <a href="{{ route('equipos.edit', $equipo->id) }}" class="btn-glass">Editar</a>
                        <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-glass btn-danger" onclick="return confirm('¿Eliminar este equipo?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($equipos->isEmpty())
        <p style="text-align: center; margin-top: 30px; opacity: 0.7;">No hay equipos registrados todavía.</p>
    @endif
@endsection