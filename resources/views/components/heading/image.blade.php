@props(['variant' => 'default'])
@php
    $imageClass = match($variant) {
        default     => '',
        'profile'   => 'w-8 h-8 rounded-full object-cover',
    }
@endphp

<img {{ $attributes->merge(['class' => "$imageClass"]) }}>