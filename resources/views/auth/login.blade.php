<x-app-layout>
    <div class="min-h-[80vh] flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        
        <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white/5 backdrop-blur-lg border border-white/10 shadow-2xl overflow-hidden sm:rounded-2xl">
            
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-extrabold text-white">Iniciar Sesión</h2>
                <p class="text-gray-400 mt-2 text-sm">Ingresa a tu cuenta para gestionar tus ligas</p>
            </div>

            <x-auth-session-status class="mb-4 text-green-400" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <label for="email" class="block font-medium text-sm text-gray-300">Correo Electrónico</label>
                    <input id="email" class="block mt-1 w-full bg-[#0f172a]/50 border border-gray-600 text-white rounded-lg focus:ring-green-500 focus:border-green-500 py-2 px-3" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                </div>

                <div class="mt-5">
                    <label for="password" class="block font-medium text-sm text-gray-300">Contraseña</label>
                    <input id="password" class="block mt-1 w-full bg-[#0f172a]/50 border border-gray-600 text-white rounded-lg focus:ring-green-500 focus:border-green-500 py-2 px-3" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                </div>

                <div class="block mt-5">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded bg-[#0f172a]/50 border-gray-600 text-green-500 shadow-sm focus:ring-green-500 focus:ring-offset-[#0f172a]" name="remember">
                        <span class="ms-2 text-sm text-gray-400">Recordar mi sesión</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-8">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-400 hover:text-white transition duration-150 ease-in-out" href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif

                    <button type="submit" class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-500 border border-transparent rounded-lg font-bold text-sm text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 focus:ring-offset-[#0f172a] transition ease-in-out duration-150 shadow-lg shadow-green-500/30">
                        Entrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>