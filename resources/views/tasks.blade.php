
@extends('layouts.app')

@section('title', 'Tasks')

@section('content')

@php
    // Temporary sample data for the page layout.
    // We can connect this to the database later.
    $taskLists = [
        [
            'title' => 'Report Writing',
            'created_at' => '8/5/2026',
            'pending_tasks' => 5,
        ],
        [
            'title' => 'Database Design',
            'created_at' => '8/5/2026',
            'pending_tasks' => 3,
        ],
        [
            'title' => 'Group Assignment',
            'created_at' => '8/5/2026',
            'pending_tasks' => 4,
        ],
        [
            'title' => 'HCI Quiz Prep',
            'created_at' => '8/5/2026',
            'pending_tasks' => 8,
        ],
    ];
@endphp

<section class="min-h-[calc(100vh-70px)] bg-[#160F2C] px-3 py-[75px] text-white sm:px-5">

    {{-- Main container --}}
    <div class="mx-auto min-h-[620px] max-w-[1400px] rounded-[20px] bg-[#302851] px-5 pb-12 pt-6 sm:px-8 lg:px-12">

        {{-- Page heading and Add Task List button --}}
        <div class="mb-10 flex flex-col gap-5 sm:mb-[46px] sm:flex-row sm:items-center sm:justify-between">

            <h1 class="font-sans text-3xl font-extrabold uppercase tracking-wide sm:text-[34px]">
                Aisyah's Task List
            </h1>

            {{-- Reuse the existing UI button component --}}
            <x-ui.button type="button" variant="primary" class="gap-2 rounded-[17px] bg-gradient-to-r from-[#593B9F] to-[#4090B3] px-4 py-3 text-sm shadow-md hover:brightness-110">

                {{-- Folder icon --}}
                <svg
                    class="h-6 w-6"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    aria-hidden="true"
                >
                    <path d="M3 7a2 2 0 0 1 2-2h4l2 3h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    <path d="M12 12v6"/>
                    <path d="M9 15h6"/>
                </svg>

                Add Task List

            </x-ui.button>

        </div>

        {{-- Grid containing the reusable task list cards --}}
        <div class="grid grid-cols-1 items-start gap-x-[38px] gap-y-8 sm:grid-cols-2 lg:grid-cols-3">

            @foreach ($taskLists as $taskList)

                <x-ui.tasklistcard
                    :title="$taskList['title']"
                    :created-at="$taskList['created_at']"
                    :pending-tasks="$taskList['pending_tasks']"
                />

            @endforeach

        </div>

    </div>

</section>

@endsection
