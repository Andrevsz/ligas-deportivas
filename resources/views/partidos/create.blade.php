<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-400 leading-tight">
            {{ __('Programar Partido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/5 backdrop-blur-lg border border-white/10 shadow-2xl rounded-2xl p-8">
                
                <form method="POST" action="{{ route('partidos.store') }}">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm text-gray-300">Equipo Local *</label>
                            <select name="equipo_local_id" required class="block mt-1 w-full bg-[#0f172a]/50 border border-gray-600 text-white rounded-lg py-2 px-3 [&>option]:bg-[#0f172a]">
                                <option value="" disabled selected>Selecciona Local</option>
                                @foreach($equipos as $equipo)
                                    <option value="{{ $equipo->id }}">{{ $equipo->nombre }} ({{ $equipo->liga->nombre }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm text-gray-300">Equipo Visitante *</label>
                            <select name="equipo_visitante_id" required class="block mt-1 w-full bg-[#0f172a]/50 border border-gray-600 text-white rounded-lg py-2 px-3 [&>option]:bg-[#0f172a]">
                                <option value="" disabled selected>Selecciona Visitante</option>
                                @foreach($equipos as $equipo)
                                    <option value="{{ $equipo->id }}">{{ $equipo->nombre }} ({{ $equipo->liga->nombre }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <label class="block text-sm text-gray-300">Fecha y Hora del Encuentro *</label>
                            <input type="datetime-local" name="fecha" required class="block mt-1 w-full bg-[#0f172a]/50 border border-gray-600 text-white rounded-lg py-2 px-3">
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-8 border-t border-white/10 pt-6">
                        <a href="{{ route('partidos.index') }}" class="text-sm text-gray-400 hover:text-white mr-6">Cancelar</a>
                        <button type="submit" class="px-6 py-3 bg-purple-600 hover:bg-purple-500 rounded-lg font-bold text-sm text-white shadow-lg">
                            Agendar Partido
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>