@props([
    'as' => null,
    'base' => [
        'block mt-2 text-sm',
    ],
])

@php
    $classes = implode(' ', array_merge($base, [$attributes->get('class')]));
    $element = $as ?? 'span';    
@endphp

<{{ $element }} {{ $attributes->twMerge(['class' => $classes]) }}>
    {{ $slot }}
</{{ $element }}>