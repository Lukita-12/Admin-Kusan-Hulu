@props(['variant' => 'default'])
@php
    $buttonClass = match($variant) {
        default     => '',
        'register'  => 'bg-blue-400/80 font-semibold text-slate-100 px-3 py-1 rounded-sm',
        'login'     => 'bg-blue-400/80 font-semibold text-slate-100 px-3 py-1 rounded-sm',
        'image'     => 'hover:opacity-75 transition',
    }
@endphp

<a {{ $attributes->merge(['class' => "$buttonClass"]) }}>{{ $slot }}</a>