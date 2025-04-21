@props(['variant' => 'default'])

@php
    $textClass = match($variant) {
        default => '',
        'head'  => 'font-semibold',
    };
@endphp

<td {{ $attributes->merge(['class' => "$textClass px-12 py-4 text-slate-700 text-lg text-center whitespace-nowrap"]) }}>{{ $slot }}</td>