@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full pl-3 pr-4 py-2 border-l-4 border-blue-400 text-left text-base font-medium text-white bg-white/10 focus:outline-none focus:text-white focus:bg-white/20 focus:border-blue-500 transition duration-150 ease-in-out'
            : 'block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-300 hover:text-white hover:bg-white/5 hover:border-white/30 focus:outline-none focus:text-white focus:bg-white/10 focus:border-white/30 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>