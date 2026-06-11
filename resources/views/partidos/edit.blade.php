<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-400 leading-tight">
            {{ __('Ingresar Marcador') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/5 backdrop-blur-lg border border-white/10 shadow-2xl rounded-2xl p-8 text-center">
                
                <h3 class="text-xl text-gray-400 mb-6">Actualizar Resultado Oficial</h3>

                <form method="POST" action="{{ route('partidos.update', $partido->id) }}">
                    @csrf @method('PUT')

                    <div class="flex items-center justify-center gap-8 text-white font-bold text-xl">
                        <div class="w-1/3 text-right">{{ $partido->equipoLocal->nombre }}</div>
                        
                        <input type="number" name="resultado_local" value="{{ $partido->resultado_local }}" min="0" class="w-16 bg-[#0f172a]/80 border border-gray-600 text-white text-center rounded-lg text-2xl py-2">
                        <span class="text-gray-500">:</span>
                        <input type="number" name="resultado_visitante" value="{{ $partido->resultado_visitante }}" min="0" class="w-16 bg-[#0f172a]/80 border border-gray-600 text-white text-center rounded-lg text-2xl py-2">
                        
                        <div class="w-1/3 text-left">{{ $partido->equipoVisitante->nombre }}</div>
                    </div>

                    <div class="flex items-center justify-end mt-12 border-t border-white/10 pt-6">
                        <a href="{{ route('partidos.index') }}" class="text-sm text-gray-400 hover:text-white mr-6">Cancelar</a>
                        <button type="submit" class="px-6 py-3 bg-purple-600 hover:bg-purple-500 rounded-lg font-bold text-sm text-white">
                            Guardar Resultado
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>