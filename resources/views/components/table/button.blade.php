@props(['variant' => 'default'])
@php
    $buttonClass = match($variant) {
        default     => 'bg-slate-500 border border-dashed',
        'accept'    => 'bg-cyan-500',
        'reject'    => 'bg-orange-500',
        'complete'  => 'bg-blue-500',
        'delete'    => 'bg-red-500',
    }
@endphp

<button {{ $attributes->merge(['class' => "$buttonClass font-semibold text-sm text-slate-100 text-center px-3 py-1 rounded-sm"]) }}>
    {{ $slot }}
</button>