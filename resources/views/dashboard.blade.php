<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-400 leading-tight">
            {{ __('Panel de Control') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="bg-white/5 backdrop-blur-lg border border-white/10 shadow-xl sm:rounded-2xl p-6 transition duration-300">
                <div class="flex items-center gap-4">
                    <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <div class="text-gray-200 text-lg">
                        ¡Bienvenido, <strong>{{ Auth::user()->name }}</strong>! Has iniciado sesión correctamente.
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-2xl font-bold text-white mb-6">Herramientas de Administración</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    
                    <a href="{{ route('ligas.index') }}" class="block bg-white/5 backdrop-blur-lg border border-white/10 p-6 rounded-2xl shadow-xl hover:bg-white/10 transition duration-300 transform hover:-translate-y-1 group">
                        <div class="w-12 h-12 bg-green-500/20 rounded-lg flex items-center justify-center mb-4 group-hover:bg-green-500/30 transition">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-white mb-2">Mis Ligas</h4>
                        <p class="text-gray-400 text-sm">Crea torneos, define temporadas y administra las categorías.</p>
                    </a>

                    <a href="{{ route('equipos.index') }}" class="block bg-white/5 backdrop-blur-lg border border-white/10 p-6 rounded-2xl shadow-xl hover:bg-white/10 transition duration-300 transform hover:-translate-y-1 group">
                        <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center mb-4 group-hover:bg-blue-500/30 transition">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-white mb-2">Equipos</h4>
                        <p class="text-gray-400 text-sm">Inscribe equipos, asigna directores técnicos y jugadores.</p>
                    </a>

                    <a href="{{ route('partidos.index') }}" class="block bg-white/5 backdrop-blur-lg border border-white/10 p-6 rounded-2xl shadow-xl hover:bg-white/10 transition duration-300 transform hover:-translate-y-1 group">
                        <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center mb-4 group-hover:bg-purple-500/30 transition">
                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-white mb-2">Partidos y Resultados</h4>
                        <p class="text-gray-400 text-sm">Programa fechas, registra marcadores y actualiza la tabla.</p>
                    </a>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>