<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ligas Deportivas | Gestión Profesional</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased text-gray-200 min-h-screen flex flex-col selection:bg-blue-500 selection:text-white bg-[#0f172a] bg-cover bg-center bg-no-repeat bg-fixed" style="background-image: url('{{ asset('img/Greenglass.jpg') }}');">
    <header class="fixed w-full top-0 z-50 bg-[#0f172a]/80 backdrop-blur-md border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                
                <div class="flex-shrink-0 flex items-center gap-2">
                    <a href="{{ url('/') }}" class="flex items-center gap-3 group focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg p-1">
                        <img src="{{ asset('img/SZ.png') }}" alt="Logo SZ" class="w-10 h-10 object-cover rounded-xl shadow-lg shadow-blue-500/20 border border-white/10 group-hover:scale-105 transition transform">
                        <span class="font-bold text-xl tracking-wider text-white">LigasPRO</span>
                    </a>
                </div>

                <nav aria-label="Navegación principal">
                    @if (Route::has('login'))
                        <div class="flex items-center gap-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-gray-300 hover:text-white transition focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg px-2 py-1" tabindex="0">
                                    Ir al Panel
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-300 hover:text-white transition focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg px-2 py-1" tabindex="0">
                                    Iniciar Sesión
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-sm font-bold bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded-lg shadow-lg shadow-blue-500/30 transition transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-[#0f172a] focus:ring-blue-500" tabindex="0">
                                        Crear Cuenta
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </nav>
            </div>
        </div>
    </header>

    <main class="flex-grow flex flex-col justify-center pt-24 pb-12">
        
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row items-center justify-between gap-12 w-full">
            
            <div class="w-full lg:w-1/2 text-center lg:text-left space-y-8">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-tight" aria-label="Administra tus torneos deportivos como un profesional">
                    Administra tus torneos como un <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-green-400">Profesional</span>
                </h1>
                
                <p class="text-lg sm:text-xl text-gray-400 max-w-2xl mx-auto lg:mx-0">
                    LigasPRO es la plataforma definitiva para gestionar equipos, programar partidos y calcular tablas de posiciones en tiempo real. Todo desde una interfaz rápida, segura y adaptable a cualquier dispositivo.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="{{ route('register') }}" class="inline-flex justify-center items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transition duration-300 transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-[#0f172a] focus:ring-blue-500" tabindex="0">
                        Comenzar Gratis
                    </a>
                </div>
            </div>

            <div class="w-full lg:w-1/2 relative">
                <div class="absolute inset-0 bg-gradient-to-tr from-blue-500/20 to-green-500/20 blur-3xl rounded-full" aria-hidden="true"></div>
                
                <div class="relative bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-6 shadow-2xl overflow-hidden">
                    <div class="flex items-center justify-between border-b border-white/10 pb-4 mb-4">
                        <h3 class="text-white font-bold text-lg">Tabla en Vivo</h3>
                        <span class="flex h-3 w-3 relative">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                        </span>
                    </div>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between items-center bg-white/5 p-3 rounded-lg border border-white/5 hover:bg-white/10 transition cursor-default">
                            <span class="font-bold text-white flex items-center gap-3"><span class="text-blue-400">1</span> Los Leones FC</span>
                            <span class="font-bold text-green-400">15 pts</span>
                        </div>
                        <div class="flex justify-between items-center bg-white/5 p-3 rounded-lg border border-white/5 hover:bg-white/10 transition cursor-default">
                            <span class="font-bold text-gray-300 flex items-center gap-3"><span class="text-gray-500">2</span> Atlético Sur</span>
                            <span class="font-bold text-gray-300">12 pts</span>
                        </div>
                        <div class="flex justify-between items-center bg-white/5 p-3 rounded-lg border border-white/5 hover:bg-white/10 transition cursor-default">
                            <span class="font-bold text-gray-300 flex items-center gap-3"><span class="text-gray-500">3</span> Real Norte</span>
                            <span class="font-bold text-gray-300">10 pts</span>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </main>

    <footer class="border-t border-white/10 bg-[#0f172a]/50 py-8 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-gray-500">
            <p>&copy; {{ date('Y') }} LigasPRO. Todos los derechos reservados.</p>
            <p>Plataforma desarrollada para evaluación técnica.</p>
        </div>
    </footer>

</body>
</html>