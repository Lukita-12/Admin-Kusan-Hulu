@props(['variant' => 'default'])
@php
    $button = match($variant) {
        default => '',
        'logout'=> 'w-full bg-red-500 px-3 py-1 font-bold text-slate-100 text-lg transition duration-250 hover:bg-red-700 rounded-sm',
    }
@endphp

<button {{ $attributes->merge(['class' => "$button"]) }}>{{ $slot }}</button>