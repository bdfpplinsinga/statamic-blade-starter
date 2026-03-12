@props([
    'video' => null,
    'video_url' => null,
    'class' => '',
    'title' => 'Embedded video player',
    'lazy' => true,
    'controls' => true,
    'autoplay' => false,
    'loop' => false,
    'muted' => false,
    'playsinline' => true,
    'poster' => null,
])

@php
    $source = $video ?? $video_url;
@endphp

@if ($source)
    @php
        $modifiers = app(\Statamic\Modifiers\CoreModifiers::class);
        $isEmbeddable = $modifiers->isEmbeddable($source);
        $resolvedUrl = $modifiers->embedUrl($source);
    @endphp

    @if ($isEmbeddable)
        <div class="relative w-full rounded-lg aspect-video overflow-hidden {{ $class }}">
            <iframe
                class="absolute inset-0 w-full h-full"
                width="100%"
                height="100%"
                src="{{ $resolvedUrl }}"
                title="{{ $title }}"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin"
                @if ($lazy)
                    loading="lazy"
                @endif
                allowfullscreen
            ></iframe>
        </div>
    @else
        <video
            class="rounded-lg {{ $class }}"
            src="{{ $resolvedUrl }}"
            @if ($poster)
                poster="{{ $poster }}"
            @endif
            @if ($controls)
                controls
            @endif
            @if ($autoplay)
                autoplay
            @endif
            @if ($loop)
                loop
            @endif
            @if ($muted)
                muted
            @endif
            @if ($playsinline)
                playsinline
            @endif
            @if ($lazy)
                preload="metadata"
            @endif
        ></video>
    @endif
@endif
