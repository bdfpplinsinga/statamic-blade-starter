@props([
    'variant' => 'h1',
    'as' => null,
    'base' => [
        'font-bold tracking-tight text-gray-900 text-balance',
    ],
    'variants' => [
        'h1' => 'text-5xl md:text-7xl',
        'h2' => 'text-4xl md:text-5xl',
        'h3' => 'text-2xl md:text-3xl',
        'h4' => 'text-xl md:text-2xl',
        'h5' => 'text-lg md:text-xl',
        'h6' => 'text-base md:text-lg',
        'p' => 'text-sm md:text-base',
    ],
])

@php
    $classes = implode(' ', array_merge($base, [$variants[$variant]]));
    $element = $as ?? $variant;
@endphp

<{{ $element }} {{ $attributes->twMerge(['class' => $classes]) }}>
    {{ $slot }}
</{{ $element }}>