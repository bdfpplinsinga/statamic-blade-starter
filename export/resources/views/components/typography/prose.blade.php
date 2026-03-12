@props([
    'variant' => 'default',
    'as' => null,
    'size' => 'default',
    'base' => [
        'prose max-w-none',
    ],
    'variants' => [
        'default' => '',
        'slate' => 'prose-slate',
        'zinc' => 'prose-zinc',
        'neutral' => 'prose-neutral',
        'stone' => 'prose-stone',
    ],
    'sizes' => [
        'default' => 'prose-base',
        'sm' => 'prose-sm',
        'lg' => 'prose-lg',
        'xl' => 'prose-xl',
    ],
])

@php
    $classes = implode(' ', array_merge($base, [$variants[$variant], $sizes[$size]]));
    $element = $as ?? 'article';
@endphp

<{{ $element }} {{ $attributes->twMerge(['class' => $classes]) }}>
    {{ $slot }}
</{{ $element }}>