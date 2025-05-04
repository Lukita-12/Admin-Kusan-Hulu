@props(['variant' => 'default'])
@php
    $spanClass = match($variant) {
        default => '',
        'dot'   => 'bg-slate-700 w-2 h-2 rounded-full',
        'h1'    => 'font-semibold text-slate-700 text-xl',
    }
@endphp

<span {{ $attributes->merge(['class' => "$spanClass"]) }}>{{ $slot }}</span>