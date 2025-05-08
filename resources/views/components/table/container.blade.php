@props(['variant' => 'default'])
@php
    $container = match($variant) {
        default => 'w-full border border-dashed',
        'main'  => 'w-full bg-slate-200 flex flex-col justify-center rounded-md shadow shadow-slate-500/60',
        'header'=> 'w-full bg-blue-400/80 flex justify-between items-center px-4 py-2 rounded-t-md',
        'table' => 'w-full overflow-auto',
        'footer'=> 'w-full h-16 flex gap-20 items-center px-4',

        'search-create' => 'w-full flex items-center gap-3',
        'button'=> 'w-full flex justify-center items-center gap-2'
    }
@endphp

<div {{ $attributes->merge(['class' => "$container"]) }}>
    {{ $slot }}
</div>