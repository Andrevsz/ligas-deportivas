<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Sistema de Ligas</title>
        <link rel="icon" href="{{ asset('img/SZ.png') }}" type="image/png">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#0f172a] text-white min-h-screen">
        <div class="min-h-screen flex flex-col">
            
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-white/5 backdrop-blur-md border-b border-white/10 shadow-lg">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main class="flex-grow">
                {{ $slot ?? '' }}

                @yield('content')
            </main>
        </div>
    </body>
</html>