@props([
    'variant' => 'large',
    'as' => 'a',
    'url' => '/',
    'base' => [
        '-m-1.5 p-1.5',
    ],
    'svg' => [
        'w-full max-w-50 mx-auto',
    ],
    'variants' => [
        'primary' => 'bg-blue-700 text-white hover:text-blue-700 hover:bg-white hover:border-blue-700',
        'secondary' => 'bg-primary-100 hover:bg-white text-blue-700 border-blue-700',
        'white' => 'bg-white text-blue-700 border-blue-700 hover:bg-blue-700 hover:text-white',
    ],
])

@php
    $classes = implode(' ', $base);
    $svgclasses = implode(' ', $svg);
@endphp

<{{ $as }} href="{{ $url }}" {{ $attributes->twMerge(['class' => $classes]) }}>
    <span class="sr-only">{{ config('app.name') }}</span>
    <s:svg src="logo" class="{{ twMerge($svgclasses) }}" />
</{{ $as }}>