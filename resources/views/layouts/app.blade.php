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
            <a href="{{ route('sessions') }}" class="{{ request()->is('sessions') ? 'text-white font-semibold' : 'text-cosmos-muted hover:text-white' }}">
                Sessions
            </a>

            <a href="{{ route('tasks') }}" class="{{ request()->is('tasks') ? 'text-white font-semibold' : 'text-cosmos-muted hover:text-white' }}">
                Tasks
            </a>

            <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'text-white font-semibold' : 'text-cosmos-muted hover:text-white' }}">
                Dashboard
            </a>
        </div>

        <!-- Profile -->
        <div class="flex items-center gap-3">
            @auth
            <div class="h-10 w-10 rounded-full bg-cosmos-purple"></div>
            <span>
                {{ auth()->user()->username }}
            </span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-cosmos-muted hover:text-white">
                    Logout
                </button>
            </form>
            @else
            <a href="{{ route('login') }}" class="text-cosmos-muted hover:text-white">
                Login
            </a>
            <a href="{{ route('register') }}" class="text-cosmos-muted hover:text-white">
                Register
            </a>
            @endauth
        </div>

    </nav>

    <main>
        @yield('content')
    </main>

</body>
</html>