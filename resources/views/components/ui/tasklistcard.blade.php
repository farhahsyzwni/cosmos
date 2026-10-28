@props([
    'title' => 'Untitled Task List',
    'createdAt' => null,
    'pendingTasks' => 0,
])

<article class="group relative min-w-0 pt-9">

    {{-- Folder tab --}}
    <div class="absolute left-0 top-0 h-10 w-28 rounded-t-[14px] bg-[#8ECECE] transition-colors duration-200 group-hover:bg-[#A0DEDE]">
    </div>

    {{-- Folder body --}}
    <div class="relative flex min-h-[178px] flex-col justify-center rounded-[19px] border-t-[5px] border-[#327E9A] bg-[#4090B3] px-6 py-7 shadow-md transition duration-200 group-hover:-translate-y-1 group-hover:shadow-lg sm:px-7">

        {{-- Task list title --}}
        <h2 class="mb-4 break-words font-sans text-xl font-extrabold uppercase leading-tight text-white sm:text-[22px]">
            {{ $title }}
        </h2>

        {{-- Task list information --}}
        <div class="text-sm font-semibold leading-snug text-white">
            @if ($createdAt)
                <p>Created at {{ $createdAt }}</p>
            @endif

            <p>{{ $pendingTasks }} Pending Tasks</p>
        </div>

    </div>

</article>
