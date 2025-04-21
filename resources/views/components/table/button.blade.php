@props(['variant' => 'default'])

@php
    $bgClass = match($variant) {
        default     => 'bg-slate-500',
        'accept'    => 'bg-cyan-500',
        'reject'    => 'bg-red-500',
        'complete'  => 'bg-orange-500',
    };
@endphp

<button {{ $attributes->merge(['class' => "$bgClass font-semibold text-sm text-white text-center px-3 py-1 rounded-sm"]) }}>{{ $slot }}</button>