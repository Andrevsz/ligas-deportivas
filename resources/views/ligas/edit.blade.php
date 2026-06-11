<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-400 leading-tight">
            {{ __('Editar Liga') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/5 backdrop-blur-lg border border-white/10 shadow-2xl overflow-hidden sm:rounded-2xl p-8">
                
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-white">Modificar Torneo</h3>
                    <p class="text-gray-400 text-sm mt-1">Actualiza las reglas o detalles de la liga seleccionada.</p>
                </div>

                <form method="POST" action="{{ route('ligas.update', $liga->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="col-span-1 md:col-span-2">
                            <label for="nombre" class="block font-medium text-sm text-gray-300">Nombre de la Liga *</label>
                            <input id="nombre" type="text" name="nombre" value="{{ $liga->nombre }}" required
                                class="block mt-1 w-full bg-[#0f172a]/50 border border-gray-600 text-white rounded-lg focus:ring-green-500 focus:border-green-500 py-2 px-3">
                        </div>

                        <div>
                            <label for="deporte" class="block font-medium text-sm text-gray-300">Deporte *</label>
                            <select id="deporte" name="deporte" required
                                class="block mt-1 w-full bg-[#0f172a]/50 border border-gray-600 text-white rounded-lg focus:ring-green-500 focus:border-green-500 py-2 px-3 [&>option]:bg-[#0f172a]">
                                <option value="Fútbol" {{ $liga->deporte == 'Fútbol' ? 'selected' : '' }}>Fútbol</option>
                                <option value="Fútbol 7" {{ $liga->deporte == 'Fútbol 7' ? 'selected' : '' }}>Fútbol 7</option>
                                <option value="Baloncesto" {{ $liga->deporte == 'Baloncesto' ? 'selected' : '' }}>Baloncesto</option>
                                <option value="Voleibol" {{ $liga->deporte == 'Voleibol' ? 'selected' : '' }}>Voleibol</option>
                                <option value="Tenis" {{ $liga->deporte == 'Tenis' ? 'selected' : '' }}>Tenis</option>
                            </select>
                        </div>

                        <div>
                            <label for="temporada" class="block font-medium text-sm text-gray-300">Temporada *</label>
                            <input id="temporada" type="text" name="temporada" value="{{ $liga->temporada }}" required
                                class="block mt-1 w-full bg-[#0f172a]/50 border border-gray-600 text-white rounded-lg focus:ring-green-500 focus:border-green-500 py-2 px-3">
                        </div>

                        <div class="col-span-1 md:col-span-2 mt-2">
                            <label for="descripcion" class="block font-medium text-sm text-gray-300">Descripción o Reglas Generales</label>
                            <textarea id="descripcion" name="descripcion" rows="4"
                                class="block mt-1 w-full bg-[#0f172a]/50 border border-gray-600 text-white rounded-lg focus:ring-green-500 focus:border-green-500 py-2 px-3">{{ $liga->descripcion }}</textarea>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-8 border-t border-white/10 pt-6">
                        <a href="{{ route('ligas.index') }}" class="text-sm text-gray-400 hover:text-white mr-6">Cancelar</a>
                        <button type="submit" class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-500 rounded-lg font-bold text-sm text-white shadow-lg shadow-green-500/30">
                            Guardar Cambios
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>