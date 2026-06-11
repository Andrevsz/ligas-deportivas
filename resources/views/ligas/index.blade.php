<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-400 leading-tight">
            {{ __('Mis Ligas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/5 backdrop-blur-lg border border-white/10 shadow-xl sm:rounded-2xl p-6 md:p-8">
                
                <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                    <h3 class="text-2xl font-bold text-white">Ligas Registradas</h3>
                    <a href="{{ route('ligas.create') }}" class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-500 text-white font-bold rounded-lg shadow-lg shadow-green-500/30 transition duration-300 transform hover:-translate-y-1">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Crear Nueva Liga
                    </a>
                </div>

                <div class="overflow-x-auto rounded-xl border border-white/10">
                    <table class="w-full text-left text-gray-300 border-collapse">
                        <thead class="bg-white/10 text-gray-100 text-sm uppercase tracking-wider">
                            <tr>
                                <th class="px-6 py-4 font-semibold">Nombre del Torneo</th>
                                <th class="px-6 py-4 font-semibold">Deporte</th>
                                <th class="px-6 py-4 font-semibold">Temporada</th>
                                <th class="px-6 py-4 font-semibold text-center">Estado</th>
                                <th class="px-6 py-4 font-semibold text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            @forelse ($ligas as $liga)
                                <tr class="hover:bg-white/5 transition duration-200">
                                    <td class="px-6 py-4 font-medium text-white">{{ $liga->nombre }}</td>
                                    <td class="px-6 py-4">{{ $liga->deporte }}</td>
                                    <td class="px-6 py-4">{{ $liga->temporada }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="px-3 py-1 text-xs font-bold bg-green-500/20 text-green-400 border border-green-500/30 rounded-full shadow-[0_0_10px_rgba(34,197,94,0.2)]">
                                            Activa
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right flex justify-end items-center gap-2">
                                        <a href="{{ route('ligas.edit', $liga->id) }}" class="text-blue-400 hover:text-blue-300 p-1 transition" title="Editar">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </a>
                                        
                                        <form action="{{ route('ligas.destroy', $liga->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta liga? Se borrarán todos sus equipos y partidos asociados.');">
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
                                        <p class="text-gray-400 text-lg">Aún no tienes ligas registradas en tu cuenta.</p>
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