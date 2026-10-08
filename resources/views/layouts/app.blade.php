<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>@yield('title', 'Cosmos')</title>
</head>

<body class="min-h-screen bg-cosmos-bg text-cosmos-text">

    <nav class="flex items-center justify-between px-8 py-5">

        <!-- Logo -->
        <div class="flex items-center gap-3">
            <div class="h-10 w-10 rounded-full bg-cosmos-aqua"></div>

            <span class="text-xl font-bold">
                Cosmos
            </span>
        </div>

        <!-- Navigation -->
        <div class="flex items-center gap-8">
            <a href="#" class="text-cosmos-muted hover:text-white">
                Sessions
            </a>

            <a href="#" class="text-cosmos-muted hover:text-white">
                Tasks
            </a>

            <a href="#" class="font-semibold text-white">
                Dashboard
            </a>
        </div>

        <!-- Profile -->
        <div class="flex items-center gap-3">
            <div class="h-10 w-10 rounded-full bg-cosmos-purple"></div>

            <span>
                Aisyah
            </span>
        </div>

    </nav>

    <main>
        @yield('content')
    </main>

</body>
</html>