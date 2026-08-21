@props([
    'status' => 'pending',
    'name' => 'null',
    'id' => 'null',
])

@php
    $isCompleted = $status === 'completed';
    $checkboxId = $id ?? $name ?? 'task-checkbox';
@endphp

<label for="{{ $checkboxId }}" class="relative inline-flex h-6 w-6 items-center justify-center cursor-pointer">
    <input 
        type="checkbox" 
        id="{{ $checkboxId }}" 
        name="{{ $name }}" 
        value="1"
        @checked($isCompleted)
        {{ $attributes->merge([
            'class' => 'peer sr-only'
        ]) }}
    >

    <span 
        class="absolute inset-0 rounded-full border-2 border-white bg-transparent transition duration-200 
                peer-checked:border-cosmos-aqua
                peer-checked:bg-cosmos-aqua
                peer-focus-visible:ring-2
                peer-focus-visible:ring-cosmos-aqua
                peer-focus-visible:ring-offset-2
                peer-focus-visible:ring-offset-cosmos-bg"
    ></span>

    <span
        class="relative z-10 text-sm font-bold leading-none text-cosmos-deep opacity-0 transition-opacity 
                    peer-checked:opacity-100">
        ✓
    </span>
</label>