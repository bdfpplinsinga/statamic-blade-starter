@props([
    'variant' => 'primary',
    'as' => 'button',
    'url' => null,
    'icon' => false,
    'base' => [
        'inline-flex items-center justify-center gap-2 font-semibold rounded-lg group text-sm px-3.5 py-2.5',
        'transition-all duration-300 ease-in-out',
        'border border-transparent',
        'cursor-pointer',
    ],
    'variants' => [
        'primary' => 'bg-blue-700 text-white hover:text-blue-700 hover:bg-white hover:border-blue-700',
        'secondary' => 'bg-primary-100 hover:bg-white text-blue-700 border-blue-700',
        'white' => 'bg-white text-blue-700 border-blue-700 hover:bg-blue-700 hover:text-white',
    ],
    'icon_colors' => [
        'primary' => 'fill-white group-hover:fill-primary-700',
        'secondary' => 'fill-primary-700',
        'white' => 'fill-primary-700',
    ],
])

@php
    $classes = implode(' ', array_merge($base, [$variants[$variant]]));
    $icon_classes = implode(' ', [$icon_colors[$variant]]);
@endphp

@if ($url)
    <a href="{{ $url }}" {{ $attributes->twMerge(['class' => $classes]) }}>
        <span>{{ $slot }}</span>
        @if ($icon)
            <svg class="transition-transform ease-in-out ml-2 duration-300 shrink-0 group-hover:translate-x-2 {{ $icon_classes }}"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M8.293 5.293a1 1 0 0 0 0 1.414L13.586 12l-5.293 5.293a1 1 0 1 0 1.414 1.414l6-6a1 1 0 0 0 0-1.414l-6-6a1 1 0 0 0-1.414 0Z"
                    clip-rule="evenodd" />
            </svg>
        @endif
    </a>
@else
    <{{ $as }} {{ $attributes->twMerge(['class' => $classes]) }}>
        {{ $slot }}
    </{{ $as }}>
@endif