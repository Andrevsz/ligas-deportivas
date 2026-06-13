<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'LigasPRO') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    
    <body class="font-sans antialiased text-gray-200 selection:bg-blue-500 selection:text-white bg-[#0f172a] bg-cover bg-center bg-no-repeat bg-fixed" style="background-image: url('{{ asset('img/Greenglass.jpg') }}');">
        <div class="min-h-screen">
            
            @include('layouts.navigation')

            @if (isset($header))
                <header class="bg-[#0f172a]/80 backdrop-blur-md border-b border-white/10 shadow mt-16" aria-label="Cabecera de sección">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main id="contenido-principal" aria-label="Contenido principal">
                {{ $slot }}
            </main>
        </div>

        <div id="global-loader" class="fixed inset-0 z-[100] hidden bg-[#0f172a]/80 backdrop-blur-sm flex items-center justify-center transition-opacity duration-300 opacity-0" aria-live="assertive" aria-modal="true">
            <div class="bg-white/10 border border-white/20 p-8 rounded-2xl shadow-[0_0_40px_rgba(59,130,246,0.3)] flex flex-col items-center gap-4 transform transition-transform scale-95" id="loader-box">
                <svg class="animate-spin h-12 w-12 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="text-white font-bold tracking-wider text-lg">Procesando solicitud...</span>
                <span class="text-blue-400 text-xs">Por favor, espera un momento</span>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const loader = document.getElementById('global-loader');
                const loaderBox = document.getElementById('loader-box');
                const forms = document.querySelectorAll('form');

                forms.forEach(form => {
                    form.addEventListener('submit', function(event) {
                        
                        if (!this.checkValidity()) return; 

                        const submitBtn = this.querySelector('button[type="submit"]');
                        if (submitBtn) {
                            submitBtn.disabled = true;
                            submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
                            submitBtn.innerHTML = `
                                <svg class="animate-spin h-5 w-5 mr-2 inline text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Guardando...
                            `;
                        }

                        loader.classList.remove('hidden');
                        
                        setTimeout(() => {
                            loader.classList.remove('opacity-0');
                            loaderBox.classList.remove('scale-95');
                            loaderBox.classList.add('scale-100');
                        }, 10);
                    });
                });

                window.addEventListener('pageshow', (event) => {
                    if (event.persisted) {
                        loader.classList.add('hidden', 'opacity-0');
                        forms.forEach(form => {
                            const btn = form.querySelector('button[type="submit"]');
                            if (btn) {
                                btn.disabled = false;
                                btn.classList.remove('opacity-50', 'cursor-not-allowed');
                            }
                        });
                    }
                });
            });
        </script>
    </body>
</html>