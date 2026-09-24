@props([
    'type' => 'button',
    'variant' => 'primary',
])

@php
    $baseClasses = "inline-flex items-center justify-center rounded-lg px-4 py-2 font-semibold transition duration-200 focus:outline-none focus:ring-2 focus:ring-cosmos-aqua focus:ring-offset-2 focus:ring-offset-cosmos-bg disabled:cursor-not-alloweddisabled:opacity-50 ";

    $variantClasses = match ($variant) {
        'primary' => "bg-cosmos-purple text-white hover:bg-cosmos-blue",
        'secondary' => "bg-cosmos-surface text-white hover:bg-cosmos-purple",
        'aqua' => "bg-cosmos-aqua text-cosmos-deep hover:opacity-90",
        'danger' => "bg-red-600 text-white hover:bg-red-700",
        'ghost' => "bg-transparent text-cosmos-muted hover:bg-cosmos-surface hover:text-white",
        default => "bg-cosmos-purple text-white hover:bg-cosmos-blue",
    };
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $baseClasses . $variantClasses]) }}>
    {{ $slot }}