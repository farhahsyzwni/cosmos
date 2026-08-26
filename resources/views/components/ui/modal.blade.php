@props([
    'title' => null,
])

<div
    {{$attributes->merge([
        'class' => 'fixed inset-0 z-50 flex items-center justify-center bg-cosmos-deep/70 p-4'
    ]) }} >
    <div class="w-full max-w-2xl rounded-2xl bg-cosmos-surface shadow-lg">
        <!-- Header -->
        <div class="flex items-center justify-between border-b border-cosmos-bg px-6 py-5">

            @if($title)
                <h2 class="text-xl font-bold text-cosmos-text">{{ $title }}</h2>
            @endif
            
            <button 
                type="button" 
                class="ml-auto flex h-9 w-9 items-center justify-center rounded-lg
                    text-cosmos-muted transition
                    hover:bg-cosmos-bg hover:text-cosmos-text"
                aria-label="Close"
            >

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Content -->
        <div class="p-6">
            {{ $slot }}
        </div>
    </div>
</div>