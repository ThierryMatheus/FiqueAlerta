@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-base text-blue-750 bg-white border border-blue-750 px-10 rounded-lg mr-4'
            : 'ml-4 text-base text-white bg-blue-750 rounded-md p-2 px-10';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
