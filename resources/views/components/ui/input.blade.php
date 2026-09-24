@props([
    'type' => 'text',
    'name' => 'null',
    'id' => 'null',
    'placeholder' => 'null',
])

<input
    type="{{ $type }}"
    name="{{ $name }}"
    id="{{ $id ?? $name }}"
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge([
        'class' => 'w-full rounded-lg border border-cosmos-surface bg-cosmos-deep px-4 py-3 text-sm text-cosmos-text placeholder:text-cosmos-muted/60 focus:border-cosmos-aqua focus:outline-none focus:ring-2 focus:ring-cosmos-aqua/30'
        ]) }}
>