@props(['variant' => 'default'])
@php
    $buttonClass = match($variant) {
        default => 'w-1/10 bg-slate-500',
        'save'  => 'w-1/10 bg-blue-400/80',
        'next'  => 'w-fit bg-green-500/80',
        'search'=> 'w-1/10 bg-blue-400/80',
    }
@endphp

<button {{ $attributes->merge(['class' => "$buttonClass font-bold text-xl text-center text-slate-100 px-4 py-1 rounded-md"]) }}>{{ $slot }}</button>