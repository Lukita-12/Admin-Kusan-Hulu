@props(['variant' => 'default'])
@php
    $container = match($variant) {
        default     => '',
        'dashboard' => 'flex min-h-screen',
        'content'   => 'w-full min-h-full flex flex-col items-center px-6 py-6',
    }
@endphp

<div {{ $attributes->merge(['class' => "$container"]) }}>
    {{ $slot }}
</div>