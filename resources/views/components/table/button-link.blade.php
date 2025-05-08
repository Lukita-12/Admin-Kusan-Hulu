@props(['variant' => 'default'])
@php
    $buttonClass = match($variant) {
        default => 'inline-block bg-slate-700 font-semibold text-slate-100 text-center px-3 py-1 rounded-md',
        'create'=> 'inline-block bg-slate-700 font-semibold text-slate-100 text-center px-3 py-1 rounded-md',
        'edit'  => 'inline-block bg-green-500 font-semibold text-sm text-white text-center px-3 py-1 rounded-md',
    }
@endphp

<a {{ $attributes->merge(['class' => "$buttonClass"]) }}>
    {{ $slot }}
</a>