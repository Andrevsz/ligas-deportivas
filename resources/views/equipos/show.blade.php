<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('equipos.index') }}" class="p-2 text-gray-400 hover:text-blue-400 bg-white/5 hover:bg-white/10 rounded-lg border border-white/10 transition duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-semibold text-xl text-blue-400 leading-tight">
                {{ __('Plantilla: ') }} <span class="text-white">{{ $equipo->nombre }}</span>
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="col-span-1">
                <div class="bg-white/5 backdrop-blur-lg border border-white/10 shadow-xl rounded-2xl p-6 sticky top-6">
                    <h3 class="text-xl font-bold text-white mb-4">Fichar Jugador</h3>
                    
                    <form method="POST" action="{{ route('jugadores.store') }}">
                        @csrf
                        <input type="hidden" name="equipo_id" value="{{ $equipo->id }}">

                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm text-gray-300">Nombre Completo *</label>
                                <input type="text" name="nombre_completo" required placeholder="Ej: Juan Pérez" class="block mt-1 w-full bg-[#0f172a]/50 border border-gray-600 text-white rounded-lg py-2 px-3 focus:ring-blue-500 focus:border-blue-500 transition">
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm text-gray-300">Dorsal (#)</label>
                                    <input type="number" name="dorsal" min="0" placeholder="10" class="block mt-1 w-full bg-[#0f172a]/50 border border-gray-600 text-white rounded-lg py-2 px-3 focus:ring-blue-500 focus:border-blue-500 transition">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-300">Posición</label>
                                    <input type="text" name="posicion" placeholder="Ej: Delantero" class="block mt-1 w-full bg-[#0f172a]/50 border border-gray-600 text-white rounded-lg py-2 px-3 focus:ring-blue-500 focus:border-blue-500 transition">
                                </div>
                            </div>

                            <button type="submit" class="w-full mt-4 py-3 bg-blue-600 hover:bg-blue-500 rounded-lg font-bold text-sm text-white shadow-lg shadow-blue-500/30 transition">
                                Agregar a Plantilla
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-span-1 lg:col-span-2">
                <div class="bg-white/5 backdrop-blur-lg border border-white/10 shadow-xl rounded-2xl p-6">
                    <h3 class="text-xl font-bold text-white mb-4">Jugadores Inscritos ({{ $equipo->jugadores->count() }})</h3>
                    
                    <div class="overflow-x-auto rounded-xl border border-white/10">
                        <table class="w-full text-left text-gray-300 border-collapse">
                            <thead class="bg-white/10 text-gray-100 text-sm uppercase">
                                <tr>
                                    <th class="px-4 py-3 text-center w-16">#</th>
                                    <th class="px-4 py-3">Nombre</th>
                                    <th class="px-4 py-3">Posición</th>
                                    <th class="px-4 py-3 text-right">Baja</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/10">
                                @forelse($equipo->jugadores as $jugador)
                                    <tr class="hover:bg-white/5 transition">
                                        <td class="px-4 py-3 text-center font-bold text-blue-400">{{ $jugador->dorsal ?? '-' }}</td>
                                        <td class="px-4 py-3 font-medium text-white">{{ $jugador->nombre_completo }}</td>
                                        <td class="px-4 py-3">{{ $jugador->posicion ?? 'No definida' }}</td>
                                        <td class="px-4 py-3 text-right">
                                            <form action="{{ route('jugadores.destroy', $jugador->id) }}" method="POST" onsubmit="return confirm('¿Remover a este jugador del equipo?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-400 hover:text-red-300 transition" title="Dar de baja">
                                                    <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-8 text-center text-gray-400">
                                            Aún no hay jugadores registrados en este equipo.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>