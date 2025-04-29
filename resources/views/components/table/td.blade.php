@props(['variant' => 'default'])

@php
    $textClass = match($variant) {
        default => 'py-4',
        'head'  => 'font-bold py-2',
    }
@endphp

<td {{ $attributes->merge(['class' => "$textClass px-12 text-slate-700 text-lg text-center whitespace-nowrap"]) }}>
    {{ $slot }}
</td>