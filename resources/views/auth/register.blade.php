<x-app-layout>
    <div class="min-h-[80vh] flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        
        <!-- Contenedor Glassmorphism -->
        <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white/5 backdrop-blur-lg border border-white/10 shadow-2xl overflow-hidden sm:rounded-2xl">
            
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-extrabold text-white">Registro de Administrador</h2>
                <p class="text-gray-400 mt-2 text-sm">Crea tu cuenta para gestionar el sistema</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nombre -->
                <div>
                    <label for="name" class="block font-medium text-sm text-gray-300">Nombre</label>
                    <input id="name" class="block mt-1 w-full bg-[#0f172a]/50 border border-gray-600 text-white rounded-lg focus:ring-green-500 focus:border-green-500 py-2 px-3" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400" />
                </div>

                <!-- Correo Electrónico -->
                <div class="mt-5">
                    <label for="email" class="block font-medium text-sm text-gray-300">Correo Electrónico</label>
                    <input id="email" class="block mt-1 w-full bg-[#0f172a]/50 border border-gray-600 text-white rounded-lg focus:ring-green-500 focus:border-green-500 py-2 px-3" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                </div>

                <!-- Contraseña -->
                <div class="mt-5">
                    <label for="password" class="block font-medium text-sm text-gray-300">Contraseña</label>
                    <input id="password" class="block mt-1 w-full bg-[#0f172a]/50 border border-gray-600 text-white rounded-lg focus:ring-green-500 focus:border-green-500 py-2 px-3" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                </div>

                <!-- Confirmar Contraseña -->
                <div class="mt-5">
                    <label for="password_confirmation" class="block font-medium text-sm text-gray-300">Confirmar Contraseña</label>
                    <input id="password_confirmation" class="block mt-1 w-full bg-[#0f172a]/50 border border-gray-600 text-white rounded-lg focus:ring-green-500 focus:border-green-500 py-2 px-3" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400" />
                </div>

                <!-- Botones y Enlaces -->
                <div class="flex items-center justify-between mt-8">
                    <a class="text-sm text-gray-400 hover:text-white transition duration-150 ease-in-out" href="{{ route('login') }}">
                        ¿Ya tienes cuenta?
                    </a>

                    <button type="submit" class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-500 border border-transparent rounded-lg font-bold text-sm text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 focus:ring-offset-[#0f172a] transition ease-in-out duration-150 shadow-lg shadow-green-500/30">
                        Registrarse
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>