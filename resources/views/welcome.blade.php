<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Ligas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#0f172a] text-white min-h-screen flex flex-col font-sans">

    <header class="w-full py-4 px-8 flex justify-between items-center border-b border-gray-800 bg-[#0f172a]/80 backdrop-blur-md fixed top-0 z-50">
        <div class="flex items-center gap-3">
            <img src="{{ asset('img/SZ.png') }}" class="h-10 w-auto object-contain" alt="Logo SZ">
        </div>
        
        <nav class="flex gap-6 items-center">
            @guest
                <a href="{{ route('login') }}" class="text-sm text-gray-300 hover:text-white font-medium transition">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="text-sm px-4 py-2 bg-green-600 hover:bg-green-500 text-white font-bold rounded-lg transition">Registrarse</a>
            @endguest
            @auth
                <a href="{{ route('dashboard') }}" class="text-sm text-gray-300 hover:text-white font-medium transition">Ir al Dashboard</a>
            @endauth
        </nav>
    </header>

    <main class="flex-grow w-full pt-32 pb-20">
        
        <div class="flex flex-col items-center justify-center text-center px-4 mb-24">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 drop-shadow-lg">
                Gestión de Ligas Profesionales
            </h1>
            
            <p class="text-xl text-gray-400 mb-10 max-w-2xl mx-auto">
                La plataforma definitiva para administrar torneos, controlar equipos y llevar el registro de tus partidos en tiempo real.
            </p>
            
            <div class="flex flex-wrap gap-4 justify-center">
                 @guest
                    <a href="{{ route('tester.login') }}" class="px-8 py-3 bg-white/10 hover:bg-white/20 border border-white/20 text-white font-bold rounded-lg transition duration-300 backdrop-blur-md flex items-center gap-2">
                        <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        Probar Demo Interactiva
                     </a>

                    <a href="{{ route('register') }}" class="px-8 py-3 bg-green-600 hover:bg-green-500 text-white font-bold rounded-lg transition duration-300 shadow-lg shadow-green-500/30">
                        Comenzar Ahora
                    </a>
                @endguest

                @auth
                    <a href="{{ route('dashboard') }}" class="px-8 py-3 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-lg transition duration-300 shadow-lg shadow-blue-500/30">
                         Entrar al Panel
                    </a>
                @endauth
            </div>
        </div>

        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-white mb-12">Ligas Activas</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @isset($ligasDestacadas)
                    @forelse ($ligasDestacadas as $liga)
                        <div class="bg-white/5 backdrop-blur-lg border border-white/10 p-8 rounded-2xl shadow-xl hover:bg-white/10 transition duration-300 transform hover:-translate-y-1">
                            <h3 class="text-2xl font-bold text-green-400 mb-2">{{ $liga->nombre }}</h3>
                            <p class="text-gray-300 mb-6">{{ $liga->deporte }} &bull; {{ $liga->temporada }}</p>
                            
                            <a href="{{ route('ligas.show', $liga->id) }}" class="inline-flex items-center text-sm font-bold text-blue-400 hover:text-blue-300 transition">
                                Ver posiciones 
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    @empty
                        <div class="col-span-3 text-center bg-white/5 backdrop-blur-lg border border-white/10 p-10 rounded-2xl shadow-xl">
                            <svg class="w-16 h-16 text-gray-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            <p class="text-gray-400 text-lg">Aún no hay ligas registradas en el sistema.</p>
                            <p class="text-gray-500 text-sm mt-2">Inicia sesión y crea tu primer torneo.</p>
                        </div>
                    @endforelse
                @endisset
            </div>
        </div>

    </main>

</body>
</html>