@props([
    'variant' => 'primary',
    'url' => null,
    'icon' => false,
    'cover' => false,
    'base' => [
        'inline-flex items-center justify-center gap-1 font-semibold ',
        'transition-all duration-300 ease-in-out',
    ],
    'variants' => [
        'primary' => 'text-indigo-600 hover:text-indigo-500',
        'secondary' => 'text-red-600 hover:text-red-500',
        'white' => 'text-white hover:text-white/80',
    ],
])

@php
    $classes = implode(' ', array_merge($base, [$variants[$variant]]));
@endphp

@if ($url)
    <a href="{{ $url }}" {{ $attributes->twMerge(['class' => $classes]) }}>
        @if ($cover)
            <span aria-hidden="true" class="absolute inset-0"></span> 
        @endif
        {{ $slot }}
        @if ($icon)
            <span aria-hidden="true">&rarr;</span>
        @endif
    </a>
@endif