<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-400 leading-tight">
            {{ __('Ingresar Marcador Oficial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/5 backdrop-blur-lg border border-white/10 shadow-2xl rounded-2xl p-8">
                
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-bold text-white mb-2">Gestión de Marcador</h3>
                    <p class="text-gray-400 text-sm">Selecciona el formato y completa los cuadros necesarios.</p>
                </div>

                @if ($errors->any())
                    <div class="mb-6 bg-red-500/10 border border-red-500/50 text-red-400 px-4 py-3 rounded-lg shadow-lg">
                        <strong class="font-bold">¡Movimiento No Permitido!</strong>
                        <ul class="list-disc list-inside text-sm mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('partidos.update', $partido->id) }}">
                    @csrf @method('PUT')

                    <div class="mb-8 flex flex-col items-center justify-center bg-[#0f172a]/40 p-5 rounded-xl border border-blue-500/30 shadow-inner">
                        <label class="text-sm text-blue-300 mb-3 font-bold uppercase tracking-wider">Modo de Evaluación Lógica</label>
                        <select name="formato_marcador" class="w-full max-w-sm bg-[#0f172a] border border-gray-600 text-white rounded-lg py-2 px-4 focus:ring-purple-500 focus:border-purple-500">
                            <option value="libre">Formato Libre (Fútbol, Básquetbol, Tenis)</option>
                            <option value="voleibol">Reglas de Vóleibol (Mín. 25 pts, ventaja de 2)</option>
                        </select>
                    </div>

                    <div class="flex justify-between items-center text-white font-bold text-xl mb-6 px-4 bg-[#0f172a]/60 py-4 rounded-xl border border-white/5">
                        <div class="w-2/5 text-center text-blue-400 truncate">{{ $partido->equipoLocal->nombre }}</div>
                        <div class="w-1/5 text-center text-gray-500 text-sm md:text-2xl">VS</div>
                        <div class="w-2/5 text-center text-red-400 truncate">{{ $partido->equipoVisitante->nombre }}</div>
                    </div>

                    <div class="space-y-3">
                        <div class="flex items-center justify-center gap-4 bg-[#0f172a]/40 p-3 rounded-lg border border-white/5 hover:bg-white/5 transition">
                            <span class="text-xs text-gray-400 w-16 text-right leading-tight">Set 1<br><span class="text-[10px] text-blue-400">(Final)</span></span>
                            <input type="number" name="resultado_local[]" required min="0" class="w-24 bg-[#0f172a]/80 border border-gray-600 text-white text-center rounded-lg text-xl py-2 focus:ring-purple-500 focus:border-purple-500">
                            <span class="text-gray-500 font-bold">-</span>
                            <input type="number" name="resultado_visitante[]" required min="0" class="w-24 bg-[#0f172a]/80 border border-gray-600 text-white text-center rounded-lg text-xl py-2 focus:ring-purple-500 focus:border-purple-500">
                            <span class="w-16"></span>
                        </div>

                        <div class="flex items-center justify-center gap-4 bg-[#0f172a]/40 p-3 rounded-lg border border-white/5 hover:bg-white/5 transition">
                            <span class="text-xs text-gray-400 w-16 text-right">Set 2</span>
                            <input type="number" name="resultado_local[]" min="0" class="w-24 bg-[#0f172a]/80 border border-gray-600 text-white text-center rounded-lg text-xl py-2 focus:ring-purple-500 focus:border-purple-500">
                            <span class="text-gray-500 font-bold">-</span>
                            <input type="number" name="resultado_visitante[]" min="0" class="w-24 bg-[#0f172a]/80 border border-gray-600 text-white text-center rounded-lg text-xl py-2 focus:ring-purple-500 focus:border-purple-500">
                            <span class="w-16"></span>
                        </div>

                        <div class="flex items-center justify-center gap-4 bg-[#0f172a]/40 p-3 rounded-lg border border-white/5 hover:bg-white/5 transition">
                            <span class="text-xs text-gray-400 w-16 text-right">Set 3</span>
                            <input type="number" name="resultado_local[]" min="0" class="w-24 bg-[#0f172a]/80 border border-gray-600 text-white text-center rounded-lg text-xl py-2 focus:ring-purple-500 focus:border-purple-500">
                            <span class="text-gray-500 font-bold">-</span>
                            <input type="number" name="resultado_visitante[]" min="0" class="w-24 bg-[#0f172a]/80 border border-gray-600 text-white text-center rounded-lg text-xl py-2 focus:ring-purple-500 focus:border-purple-500">
                            <span class="w-16"></span>
                        </div>
                        
                        <div class="flex items-center justify-center gap-4 bg-[#0f172a]/40 p-3 rounded-lg border border-white/5 hover:bg-white/5 transition">
                            <span class="text-xs text-gray-400 w-16 text-right">Set 4</span>
                            <input type="number" name="resultado_local[]" min="0" class="w-24 bg-[#0f172a]/80 border border-gray-600 text-white text-center rounded-lg text-xl py-2 focus:ring-purple-500 focus:border-purple-500">
                            <span class="text-gray-500 font-bold">-</span>
                            <input type="number" name="resultado_visitante[]" min="0" class="w-24 bg-[#0f172a]/80 border border-gray-600 text-white text-center rounded-lg text-xl py-2 focus:ring-purple-500 focus:border-purple-500">
                            <span class="w-16"></span>
                        </div>
                        
                        <div class="flex items-center justify-center gap-4 bg-[#0f172a]/40 p-3 rounded-lg border border-white/5 hover:bg-white/5 transition">
                            <span class="text-xs text-gray-400 w-16 text-right">Set 5</span>
                            <input type="number" name="resultado_local[]" min="0" class="w-24 bg-[#0f172a]/80 border border-gray-600 text-white text-center rounded-lg text-xl py-2 focus:ring-purple-500 focus:border-purple-500">
                            <span class="text-gray-500 font-bold">-</span>
                            <input type="number" name="resultado_visitante[]" min="0" class="w-24 bg-[#0f172a]/80 border border-gray-600 text-white text-center rounded-lg text-xl py-2 focus:ring-purple-500 focus:border-purple-500">
                            <span class="w-16"></span>
                        </div>
                    </div>

                    <div class="flex items-center justify-center mt-10 border-t border-white/10 pt-6">
                        <a href="{{ route('partidos.index') }}" class="text-sm text-gray-400 hover:text-white mr-6">Cancelar</a>
                        <button type="submit" class="px-8 py-3 bg-purple-600 hover:bg-purple-500 rounded-lg font-bold text-sm text-white shadow-lg shadow-purple-500/30 transition transform hover:-translate-y-1">
                            Guardar Marcador
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>