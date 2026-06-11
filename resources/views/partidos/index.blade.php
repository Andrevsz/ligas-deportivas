@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1 style="margin: 0;">Calendario de Partidos</h1>
        <a href="{{ route('partidos.create') }}" class="btn-glass">+ Programar Partido</a>
    </div>

    @if(session('success'))
        <div style="background: rgba(0, 255, 0, 0.1); border: 1px solid rgba(0, 255, 0, 0.3); padding: 15px; border-radius: 8px; margin-top: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Liga</th>
                <th>Fecha y Hora</th>
                <th style="text-align: right;">Local</th>
                <th style="text-align: center; width: 100px;">Marcador</th>
                <th style="text-align: left;">Visitante</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($partidos as $partido)
                <tr>
                    <td><small style="opacity: 0.8;">{{ $partido->liga->nombre }}</small></td>
                    <td>{{ date('d/m/Y H:i', strtotime($partido->fecha_hora)) }}</td>
                    
                    <td style="text-align: right;"><strong>{{ $partido->equipoLocal->nombre }}</strong></td>
                    
                    <td style="text-align: center;">
                        <span style="background: rgba(255,255,255,0.1); padding: 5px 10px; border-radius: 5px; font-weight: bold;">
                            {{ $partido->resultado_local ?? '-' }}
                        </span>
                        :
                        <span style="background: rgba(255,255,255,0.1); padding: 5px 10px; border-radius: 5px; font-weight: bold;">
                            {{ $partido->resultado_visitante ?? '-' }}
                        </span>
                    </td>
                    
                    <td style="text-align: left;"><strong>{{ $partido->equipoVisitante->nombre }}</strong></td>
                    
                    <td style="display: flex; gap: 10px;">
                        <a href="{{ route('partidos.edit', $partido->id) }}" class="btn-glass">Editar / Resultado</a>
                        <form action="{{ route('partidos.destroy', $partido->id) }}" method="POST" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-glass btn-danger" onclick="return confirm('¿Suspender este partido?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($partidos->isEmpty())
        <p style="text-align: center; margin-top: 30px; opacity: 0.7;">No hay partidos programados todavía.</p>
    @endif
@endsection