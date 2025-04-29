@props(['variant' => 'default'])

@php
    $rowClass = match($variant) {
        default => '',
        'body'  => 'odd:bg-slate-200 even:bg-slate-100',
    }
@endphp

<tr {{ $attributes->merge(['class' => "$rowClass"]) }}>
    {{ $slot }}
</tr>