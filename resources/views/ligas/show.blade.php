@extends('layouts.app')

@section('content')
<div class="glass-container" style="padding: 20px; max-width: 800px; margin: auto;">
    <h2 style="color: white; margin-bottom: 20px;">Tabla de Posiciones: {{ $liga->nombre }}</h2>
    
    <table style="width: 100%; border-collapse: collapse; color: white;">
        <thead>
            <tr style="border-bottom: 1px solid rgba(255,255,255,0.3);">
                <th style="padding: 10px; text-align: left;">Equipo</th>
                <th style="padding: 10px; text-align: center;">Puntos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipos as $equipo)
            <tr style="border-bottom: 1px solid rgba(255,255,255,0.1);">
                <td style="padding: 10px;">{{ $equipo->nombre }}</td>
                <td style="padding: 10px; text-align: center;"><strong>{{ $equipo->puntos }}</strong></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection