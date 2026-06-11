<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-400 leading-tight">
            {{ __('Editar Equipo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="bg-blue-500/10 border border-blue-500/30 rounded-2xl p-4 flex flex-col sm:flex-row justify-between items-center gap-4 backdrop-blur-md">
                <div class="flex items-center gap-3 text-left">
                    <div class="p-2 bg-blue-500/20 rounded-lg text-blue-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-white font-bold">¿Deseas gestionar la plantilla?</h4>
                        <p class="text-gray-400 text-xs">Añade, edita o elimina los jugadores pertenecientes a este equipo.</p>
                    </div>
                </div>
                <a href="{{ route('equipos.show', $equipo->id) }}" class="w-full sm:w-auto px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white font-bold text-sm rounded-xl shadow-lg shadow-blue-500/20 transition duration-200 text-center">
                    Ir a Control de Jugadores
                </a>
            </div>

            <div class="bg-white/5 backdrop-blur-lg border border-white/10 shadow-2xl overflow-hidden sm:rounded-2xl p-8">
                
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-white">Modificar Ficha</h3>
                    <p class="text-gray-400 text-sm mt-1">Cambia el nombre o la liga de asignación del equipo.</p>
                </div>

                <form method="POST" action="{{ route('equipos.update', $equipo->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="col-span-1 md:col-span-2">
                            <label for="liga_id" class="block font-medium text-sm text-gray-300">Torneo a participar *</label>
                            <select id="liga_id" name="liga_id" required
                                class="block mt-1 w-full bg-[#0f172a]/50 border border-gray-600 text-white rounded-lg focus:ring-blue-500 focus:border-blue-500 py-2 px-3 [&>option]:bg-[#0f172a]">
                                @foreach($ligas as $liga)
                                    <option value="{{ $liga->id }}" {{ $equipo->liga_id == $liga->id ? 'selected' : '' }}>
                                        {{ $liga->nombre }} ({{ $liga->temporada }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="nombre" class="block font-medium text-sm text-gray-300">Nombre del Equipo *</label>
                            <input id="nombre" type="text" name="nombre" value="{{ $equipo->nombre }}" required
                                class="block mt-1 w-full bg-[#0f172a]/50 border border-gray-600 text-white rounded-lg focus:ring-blue-500 focus:border-blue-500 py-2 px-3">
                        </div>

                        <div>
                            <label for="entrenador" class="block font-medium text-sm text-gray-300">Entrenador / DT</label>
                            <input id="entrenador" type="text" name="entrenador" value="{{ $equipo->entrenador }}"
                                class="block mt-1 w-full bg-[#0f172a]/50 border border-gray-600 text-white rounded-lg focus:ring-blue-500 focus:border-blue-500 py-2 px-3">
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-8 border-t border-white/10 pt-6">
                        <a href="{{ route('equipos.index') }}" class="text-sm text-gray-400 hover:text-white mr-6">Cancelar</a>
                        <button type="submit" class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-500 rounded-lg font-bold text-sm text-white shadow-lg shadow-blue-500/30">
                            Actualizar Equipo
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>