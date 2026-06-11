<nav x-data="{ open: false }" class="bg-[#0f172a]/80 backdrop-blur-md border-b border-white/10 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ Auth::check() ? route('dashboard') : url('/') }}">
                        <img src="{{ asset('img/SZ.png') }}" class="block h-10 w-auto" alt="Logo SZ" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-green-500 text-sm font-medium leading-5 text-white focus:outline-none transition duration-150 ease-in-out">
                        Panel de Control
                    </a>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-white/20 text-sm leading-4 font-medium rounded-md text-gray-200 bg-white/5 hover:text-white focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();" class="text-gray-800 hover:bg-gray-100 font-medium">
                                    Cerrar Sesión
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="flex items-center gap-4">
                        <a href="{{ url('/') }}" class="text-sm text-gray-300 hover:text-white font-medium transition mr-4 border-b-2 border-transparent hover:border-gray-300 pb-1">
                            Inicio
                        </a>
                        <a href="{{ route('login') }}" class="text-sm text-gray-300 hover:text-white font-medium transition">
                            Iniciar Sesión
                        </a>
                        <a href="{{ route('register') }}" class="text-sm px-4 py-2 bg-green-600 hover:bg-green-500 text-white font-bold rounded-lg transition">
                            Registrarse
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>