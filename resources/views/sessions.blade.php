<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Sessions - Cosmos</title>
</head>

<body class="min-h-screen bg-cosmos-bg text-cosmos-text">

    <header class="w-full px-8 py-5">
            <nav class="flex items-center justify-between">
                <!-- Logo -->
                <a href="/sessions" class="text-2xl font-bold">
                    Cosmos
                </a>
                <!-- Navigation -->
                <div class="flex items-center gap-8 text-sm font-medium">
                    <a href="/sessions" class="font-semibold">
                        Sessions
                    </a>

                    <a href="#" class="opacity-70 hover:opacity-100">
                        Tasks
                    </a>

                    <a href="#" class="opacity-70 hover:opacity-100">
                        Dashboard
                    </a>
                </div>

            <!-- User -->
            <div class="flex items-center gap-3">
                <div class="h-9 w-9 rounded-full bg-white/20"></div>
                <span class="text-sm font-medium">
                    User
                </span>
            </div>
        </nav>
        </header>

    <main class="px-8 py-6">
    
        <div class="mx-auto max-w-6xl">
            <h1 class="text-4xl font-bold">
                Sessions
            </h1>

            <p class="mt-2 opacity-70">
                Focus together. Get things done.
            </p>
        </div>
    </main>
</body>
</html>