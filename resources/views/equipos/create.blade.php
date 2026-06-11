<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-400 leading-tight">
            {{ __('Inscribir Equipo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/5 backdrop-blur-lg border border-white/10 shadow-2xl overflow-hidden sm:rounded-2xl p-8">
                
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-white">Ficha de Inscripción</h3>
                    <p class="text-gray-400 text-sm mt-1">Asigna el nuevo equipo a una liga activa.</p>
                </div>

                <form method="POST" action="{{ route('equipos.store') }}">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div class="col-span-1 md:col-span-2">
                            <label for="liga_id" class="block font-medium text-sm text-gray-300">Torneo a participar *</label>
                            <select id="liga_id" name="liga_id" required
                                class="block mt-1 w-full bg-[#0f172a]/50 border border-gray-600 text-white rounded-lg focus:ring-blue-500 focus:border-blue-500 py-2 px-3 [&>option]:bg-[#0f172a] transition">
                                <option value="" disabled selected>Selecciona la liga correspondiente...</option>
                                @foreach($ligas as $liga)
                                    <option value="{{ $liga->id }}">{{ $liga->nombre }} ({{ $liga->temporada }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="nombre" class="block font-medium text-sm text-gray-300">Nombre del Equipo *</label>
                            <input id="nombre" type="text" name="nombre" required placeholder="Ej: Los Leones FC"
                                class="block mt-1 w-full bg-[#0f172a]/50 border border-gray-600 text-white rounded-lg focus:ring-blue-500 focus:border-blue-500 py-2 px-3 transition">
                        </div>

                        <div>
                            <label for="entrenador" class="block font-medium text-sm text-gray-300">Entrenador / DT</label>
                            <input id="entrenador" type="text" name="entrenador" placeholder="Ej: Marcelo Bielsa"
                                class="block mt-1 w-full bg-[#0f172a]/50 border border-gray-600 text-white rounded-lg focus:ring-blue-500 focus:border-blue-500 py-2 px-3 transition">
                        </div>

                    </div>

                    <div class="flex items-center justify-end mt-8 border-t border-white/10 pt-6">
                        <a href="{{ route('equipos.index') }}" class="text-sm text-gray-400 hover:text-white transition duration-150 ease-in-out mr-6">
                            Cancelar
                        </a>

                        <button type="submit" class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-500 rounded-lg font-bold text-sm text-white focus:outline-none transition ease-in-out duration-150 shadow-lg shadow-blue-500/30">
                            Guardar Equipo
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>