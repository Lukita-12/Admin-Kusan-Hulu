@props(['variant' => 'default'])
@php
    $span = match($variant) {
        default => '',
        'logo'  => 'font-bold italic text-2xl text-slate-100',
        'line'  => 'w-full border border-slate-100 my-3',
    }
@endphp

<span {{ $attributes->merge(['class' => "$span"]) }}>{{ $slot }}</span>