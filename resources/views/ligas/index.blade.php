@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1 style="margin: 0;">Ligas Registradas</h1>
        <a href="{{ route('ligas.create') }}" class="btn-glass">+ Nueva Liga</a>
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
                <th>Nombre de la Liga</th>
                <th>Deporte</th>
                <th>Temporada</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ligas as $liga)
                <tr>
                    <td>{{ $liga->id }}</td>
                    <td>{{ $liga->nombre }}</td>
                    <td>{{ $liga->temporada }}</td>
                    <td>{{ $liga->descripcion }}</td>
                    <td style="display: flex; gap: 10px;">
                        <a href="{{ route('ligas.edit', $liga->id) }}" class="btn-glass">Editar</a>
                        
                        <form action="{{ route('ligas.destroy', $liga->id) }}" method="POST" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-glass btn-danger" onclick="return confirm('¿Seguro que deseas eliminar esta liga?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    @if($ligas->isEmpty())
        <p style="text-align: center; margin-top: 30px; opacity: 0.7;">No hay ligas registradas todavía.</p>
    @endif
@endsection