@props([
    'image' => null,
    'class' => '',
    'alt' => '',
    'sizes' => '100vw',
    'cover' => false,
    'lazy' => true,
    'focus' => null,
])

@if ($image)
    @php
        $asset = \Statamic\Facades\Asset::findByUrl($image) ?? \Statamic\Facades\Asset::find($image);
        if (!$asset) {
            $asset = \Statamic\Facades\Asset::query()->where('path', $image)->first();
        }
        
        if ($asset) {
            $extension = $asset->extension();
            $url = $asset->url();
            $mimeType = $asset->mimeType();
            $focusPosition = $focus ?? $asset->get('focus', '50-50');
            
            // Convert focus to CSS object-position
            $focusParts = explode('-', $focusPosition);
            $objectPosition = ($focusParts[0] ?? 50) . '% ' . ($focusParts[1] ?? 50) . '%';
            
            // Ensure alt ends with period
            $altText = $alt ?: $asset->get('alt', '');
            if ($altText && !str_ends_with($altText, '.')) {
                $altText .= '.';
            }
        }
    @endphp

    @if ($asset)
        <picture>
            @if (in_array($extension, ['svg', 'gif']))
                <img class="{{ $class }}" src="{{ $url }}" alt="{{ $altText }}" />
            @else
                <source
                    srcset="
                        {{ $asset->url(['glide:preset' => 'xs-webp']) }} 320w,
                        {{ $asset->url(['glide:preset' => 'sm-webp']) }} 480w,
                        {{ $asset->url(['glide:preset' => 'md-webp']) }} 768w,
                        {{ $asset->url(['glide:preset' => 'lg-webp']) }} 1280w,
                        {{ $asset->url(['glide:preset' => 'xl-webp']) }} 1440w,
                        {{ $asset->url(['glide:preset' => '2xl-webp']) }} 1680w"
                    sizes="{{ $sizes }}"
                    type="image/webp"
                >
                <source
                    srcset="
                        {{ $asset->url(['glide:preset' => 'xs']) }} 320w,
                        {{ $asset->url(['glide:preset' => 'sm']) }} 480w,
                        {{ $asset->url(['glide:preset' => 'md']) }} 768w,
                        {{ $asset->url(['glide:preset' => 'lg']) }} 1280w,
                        {{ $asset->url(['glide:preset' => 'xl']) }} 1440w,
                        {{ $asset->url(['glide:preset' => '2xl']) }} 1680w"
                    sizes="{{ $sizes }}"
                    type="{{ $mimeType }}"
                >
                <img
                    @if ($cover)
                        class="object-cover w-full h-full {{ $class }}"
                        style="object-position: {{ $objectPosition }}"
                    @else
                        class="{{ $class }}"
                    @endif
                    src="{{ $asset->url(['glide:preset' => 'lg']) }}"
                    alt="{{ $altText }}"
                    @if ($lazy)
                        loading="lazy"
                    @endif
                >
            @endif
        </picture>
    @endif
@endif
