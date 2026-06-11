@extends('layouts.app')

@section('content')
    <div style="text-align: center; padding: 40px 20px;">
        <h1 style="font-size: 3em; margin-bottom: 10px; text-shadow: 0 2px 10px rgba(0,0,0,0.3);">
            📊 Panel de Administración Multideporte
        </h1>
        <p style="font-size: 1.2em; opacity: 0.8; margin-bottom: 40px;">
            Panel de control Full-Stack para la administración de torneos.
        </p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 30px;">
            
            <div style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); padding: 30px; border-radius: 15px; transition: transform 0.3s;">
                <h2>🏆 Ligas</h2>
                <p style="opacity: 0.7; font-size: 0.9em;">Gestiona las temporadas y torneos activos.</p>
                <a href="{{ route('ligas.index') }}" class="btn-glass" style="margin-top: 15px; width: 100%; box-sizing: border-box; text-align: center;">Entrar</a>
            </div>

            <div style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); padding: 30px; border-radius: 15px; transition: transform 0.3s;">
                <h2>🛡️ Equipos</h2>
                <p style="opacity: 0.7; font-size: 0.9em;">Registra clubes y asígnalos a sus ligas.</p>
                <a href="{{ route('equipos.index') }}" class="btn-glass" style="margin-top: 15px; width: 100%; box-sizing: border-box; text-align: center;">Entrar</a>
            </div>

            <div style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); padding: 30px; border-radius: 15px; transition: transform 0.3s;">
                <h2>🏃 Jugadores</h2>
                <p style="opacity: 0.7; font-size: 0.9em;">Administra las plantillas y los dorsales.</p>
                <a href="{{ route('jugadores.index') }}" class="btn-glass" style="margin-top: 15px; width: 100%; box-sizing: border-box; text-align: center;">Entrar</a>
            </div>

            <div style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); padding: 30px; border-radius: 15px; transition: transform 0.3s;">
                <h2>📅 Partidos</h2>
                <p style="opacity: 0.7; font-size: 0.9em;">Programa encuentros y registra resultados.</p>
                <a href="{{ route('partidos.index') }}" class="btn-glass" style="margin-top: 15px; width: 100%; box-sizing: border-box; text-align: center;">Entrar</a>
            </div>

        </div>
    </div>
@endsection