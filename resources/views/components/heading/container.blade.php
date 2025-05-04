@props (['variant' => 'dafault'])
@php
    $container = match($variant) {
        default => '',
        'main'  => 'sticky top-0 left-0 w-full bg-slate-200 flex justify-between items-center shadow shadow-slate-500 px-4 py-1',
        'button'=> 'flex gap-3',
    }
@endphp

<div {{ $attributes->merge(['class' => "$container"]) }}>{{ $slot }}</div>