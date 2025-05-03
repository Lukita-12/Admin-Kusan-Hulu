@props(['variant' => 'default'])
@php
    $container = match($variant) {
        default         => 'border border-dashed',
        'main'          => 'bg-slate-200 rounded-lg shadow-md shadow-slate-500/80 px-4 py-6',
        'form'          => 'w-full flex flex-col gap-3',
        'label-input'   => 'w-full flex',
        'input-error'   => 'w-full flex flex-col gap-1',
        'search'        => 'w-full flex gap-3',
        'button'        => 'flex justify-end gap-3 my-3',
    }
@endphp

<div {{ $attributes->merge(['class' => "$container"]) }}>
    {{ $slot }}
</div>