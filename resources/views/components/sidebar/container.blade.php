@props(['variant' => 'default'])
@php
    $container = match($variant) {
        default     => '',
        'logout'    => 'w-full',
        'sidebar'   => 'w-full flex flex-col items-center',
    }
@endphp

<div {{ $attributes->merge(['class' => "$container"]) }}>{{ $slot }}</div>