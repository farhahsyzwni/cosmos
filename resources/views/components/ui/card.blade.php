@props([
    'padding' => 'p-6',
])

<div
    {{ $attributes->merge([
        'class' => "rounded-2xl bg-cosmos-surface {$padding}"
    ]) }}
>
    {{ $slot }}
</div>