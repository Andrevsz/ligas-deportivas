<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-400 leading-tight">
            {{ __('Gestión de Equipos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/5 backdrop-blur-lg border border-white/10 shadow-xl sm:rounded-2xl p-6 md:p-8">
                
                <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                    <h3 class="text-2xl font-bold text-white">Equipos Registrados</h3>
                    <a href="{{ route('equipos.create') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-lg shadow-lg shadow-blue-500/30 transition duration-300 transform hover:-translate-y-1">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Inscribir Equipo
                    </a>
                </div>

                <div class="overflow-x-auto rounded-xl border border-white/10">
                    <table class="w-full text-left text-gray-300 border-collapse">
                        <thead class="bg-white/10 text-gray-100 text-sm uppercase tracking-wider">
                            <tr>
                                <th class="px-6 py-4 font-semibold">Equipo</th>
                                <th class="px-6 py-4 font-semibold">Liga (Torneo)</th>
                                <th class="px-6 py-4 font-semibold">Entrenador (DT)</th>
                                <th class="px-6 py-4 font-semibold text-center">Puntos</th>
                                <th class="px-6 py-4 font-semibold text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            @forelse ($equipos as $equipo)
                                <tr class="hover:bg-white/5 transition duration-200">
                                    <td class="px-6 py-4 font-bold text-white">{{ $equipo->nombre }}</td>
                                    <td class="px-6 py-4 text-green-400">{{ $equipo->liga->nombre }}</td>
                                    <td class="px-6 py-4">{{ $equipo->entrenador ?? 'No asignado' }}</td>
                                    <td class="px-6 py-4 text-center font-bold text-blue-400">{{ $equipo->puntos }}</td>
                                    
                                    <td class="px-6 py-4 text-right flex justify-end items-center gap-3">
                                        
                                        <a href="{{ route('equipos.show', $equipo->id) }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-bold bg-blue-500/10 hover:bg-blue-500/20 text-blue-400 border border-blue-500/30 rounded-lg transition duration-200" title="Gestionar Plantilla">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                                            Agregar Jugadores
                                        </a>

                                        <a href="{{ route('equipos.edit', $equipo->id) }}" class="text-gray-400 hover:text-white p-1 transition" title="Editar Equipo">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </a>

                                        <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este equipo?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-300 p-1 transition" title="Eliminar">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <p class="text-gray-400 text-lg">Aún no hay equipos inscritos en tus ligas.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>