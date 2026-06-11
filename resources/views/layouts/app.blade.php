<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración Deportiva</title>
    <style>
        /* Fondo Animado */
        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(45deg, #0f2027, #203a43, #2c5364);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Contenedor Efecto Cristal (Glassmorphism) */
        .glass-container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            width: 100%;
            max-width: 1000px;
        }

        /* Estilos de Tablas y Botones */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        th {
            background: rgba(255, 255, 255, 0.1);
        }
        .btn-glass {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }
        .btn-glass:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }
        .btn-danger {
            background: rgba(255, 50, 50, 0.2);
            border-color: rgba(255, 50, 50, 0.4);
        }
        /* Estilos para Formularios Glassmorphism */
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #eeeeee;
        }
        .glass-input {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            color: white;
            outline: none;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }
        .glass-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }
        .glass-input:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }
        
        .btn-danger:hover {
            background: rgba(255, 50, 50, 0.4);
        }
    </style>
</head>
<body>

    <div class="glass-container">
        <nav style="display: flex; gap: 15px; margin-bottom: 30px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 15px;">
            <a href="{{ route('ligas.index') }}" class="btn-glass">Ligas</a>
            <a href="{{ route('equipos.index') }}" class="btn-glass">Equipos</a>
            <a href="{{ route('jugadores.index') }}" class="btn-glass">Jugadores</a>
            <a href="{{ route('partidos.index') }}" class="btn-glass">Partidos</a>
        </nav>
        @yield('content')
    </div>

</body>
</html>