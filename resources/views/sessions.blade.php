<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Sessions - Cosmos</title>
</head>

<body class="min-h-screen bg-cosmos-deep text-cosmos-text">

    <header class="w-full px-8 py-3 bg-cosmos-bg">
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
                <span class="text-sm font-medium">
                    User
                </span>
                <div class="h-9 w-9 rounded-full bg-white/20"></div>
            </div>
        </nav>
        </header>

    <main class="px-8 py-8">
    
        <div class="mx-auto">

            <!-- Session Panel -->
            <section class="rounded-3xl bg-cosmos-purple p-0 text-gray-900 shadow-md flex-col">

                <!-- Session Heading -->
                <div class="py-16 text-center">
                    <h2 class=" text-lg font-bold text-white">
                        Session:
                    </h2>
                    <h3 class="mt-2 text-2xl font-bold text-white">
                        Report Writing
                    </h3>
                </div>
                

                <!-- Timer -->
                <div class="py-16 text-center">
                    
                    <p class="text-lg font-medium text-white">
                        Focus Time!
                    </p>

                    <div class="mt-4 text-9xl font-medium tracking-tight text-white">
                        25:00
                    </div>

                    <button type = "button" class = "mt-5 rounded-xl bg-violet-300/50 px-8 py-2 font-semibold animate-pulse text-white hover:bg-violet-700">
                        Start Session
                    </button>

                </div>

                <!-- Session participants -->
                <div class="py-16 text-center">
                    <button type = "button" class = "rounded-xl border border-gray-300/20 px-6 py-1 font-medium text-white hover:bg-teal-400/60">
                        Generate Shareable Link
                    </button>

                    <p class="mt-7 text-sm font-medium text-white">
                        In This Session:
                    </p>
                    <div class="flex justify-center gap-4 mt-4">
                        <div class="h-9 w-9 rounded-full bg-white/20"></div>
                        <div class="h-9 w-9 rounded-full bg-white/20"></div>
                        <div class="h-9 w-9 rounded-full bg-white/20"></div>
                    </div>
                </div>
                
            </section>
        </div>
    </main>
</body>
</html>