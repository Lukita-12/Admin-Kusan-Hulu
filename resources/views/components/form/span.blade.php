@props(['variant' => 'default'])
@php
    $spanClass = match($variant) {
        default => '',
        'dashed'=> 'mx-2 my-4 w-full border-2 border-dashed border-slate-700',
    }
@endphp

<span {{ $attributes->merge(['class' => "$spanClass"]) }}>{{ $slot }}</span>