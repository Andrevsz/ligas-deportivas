<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-400 leading-tight">
            {{ __('Calendario y Resultados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/5 backdrop-blur-lg border border-white/10 shadow-xl sm:rounded-2xl p-6 md:p-8">
                
                <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                    <h3 class="text-2xl font-bold text-white">Encuentros</h3>
                    <a href="{{ route('partidos.create') }}" class="px-6 py-3 bg-purple-600 hover:bg-purple-500 text-white font-bold rounded-lg shadow-lg shadow-purple-500/30 transition duration-300">
                        Programar Partido
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @forelse($partidos as $partido)
                        <div class="bg-white/5 border border-white/10 p-6 rounded-2xl flex flex-col justify-between relative group">
                            <div class="text-xs text-gray-400 mb-4">{{ date('d/m/Y H:i', strtotime($partido->fecha)) }}</div>
                            
                            <div class="flex items-center justify-between text-white font-bold text-lg my-2">
                                <span class="w-2/5 truncate">{{ $partido->equipoLocal->nombre }}</span>
                                <span class="bg-[#0f172a] px-4 py-2 rounded-lg text-purple-400 border border-white/10">
                                    {{ $partido->resultado_local ?? '-' }} : {{ $partido->resultado_visitante ?? '-' }}
                                </span>
                                <span class="w-2/5 text-right truncate">{{ $partido->equipoVisitante->nombre }}</span>
                            </div>

                            <div class="flex justify-end items-center gap-4 mt-4 pt-4 border-t border-white/5">
                                <a href="{{ route('partidos.edit', $partido->id) }}" class="text-sm text-blue-400 hover:underline">Ingresar Marcador</a>
                                <form action="{{ route('partidos.destroy', $partido->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-sm text-red-400 hover:underline">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-1 md:col-span-2 text-center py-12 text-gray-400">
                            No hay encuentros agendados todavía.
                        </div>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</x-app-layout>