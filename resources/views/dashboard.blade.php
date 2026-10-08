@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
   
    <div class="mx-auto max-w-7xl">

        <div>
            <x-ui.card class="mt-6 mb-6" padding="p-4">
                <h1 class="mb-3 text-3xl font-bold">
                    Welcome!
                </h1>

                <p class="mb-10 text-cosmos-muted">
                    Good evening, Aisyah
                    Ready to focus?
                </p>

                <x-ui.button>
                    Start Focus Session
                </x-ui.button>
            </x-ui.card>
        </div>

            <div class="grid gap-6 md:grid-cols-3">

                <x-ui.card>
                    <h2 class="text-lg font-semibold">
                        Current Streak
                    </h2>

                    <p class="mt-2 text-xl font-bold">
                        9 Days
                    </p>
                </x-ui.card>

                <x-ui.card>
                    <h2 class="text-lg font-semibold">
                        Completed Sessions
                    </h2>

                    <p class="mt-2 text-xl font-bold">
                       12 Sessions 
                    </p>
                </x-ui.card>


                <x-ui.card>
                    <h2 class="text-lg font-semibold">
                        Total Focus Time
                    </h2>

                    <p class="mt-2 text-xl font-bold">
                        8 Hours 45 Min
                    </p>
                </x-ui.card>

            </div>

            <div>
               <x-ui.card  class="mt-6" padding="p-4">
                    <h2 class="text-lg font-semibold">
                        Pending Tasks
                    </h2>

                    <p class="mt-2 text-xl font-bold">
                        5 Tasks
                    </p>

                    <p class="mt-1 text-sm text-cosmos-muted">
                        Tasks waiting to be completed...
                    </p>
                </x-ui.card>
            </div>      

                <div class="grid gap-6 md:grid-cols-2">

                    <x-ui.card class="mt-6" padding="p-4">
                    <h2 class="text-lg font-semibold">
                          Weekly Focus Duration Progress Graph
                    </h2>

                    <p class="mt-1 text-sm text-cosmos-muted">
                        This Week: 8h 45min
                    </p>

                    <p class="mt-8 text-s text-cosmos-muted">
                        Mon Tue Wed Thu Fri Sat Sun 
                    </p>
                </x-ui.card>

                <x-ui.card  class="mt-6" padding="p-4">
                    <h2 class="text-lg font-semibold">
                        Calendar 
                    </h2>

                    <p class="mt-8 text-s text-cosmos-muted">
                        Months and Days...
                    </p>
                </x-ui.card>

                </div>
        </div>

@endsection