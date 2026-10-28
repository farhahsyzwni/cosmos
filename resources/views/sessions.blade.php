<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Sessions - Cosmos</title>
</head>

<body class="min-h-screen bg-cosmos-deep text-cosmos-text">

    @php
        $activeSession = isset($session);
    @endphp

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

        <!-- Chat Side Panel -->
        <aside id="chat-panel"
            class="fixed left-0 top-0 z-40 h-full w-80 -translate-x-full bg-cosmos-bg shadow-xl transition-transform duration-300"
        >
            <div class="flex items-center justify-between border-b border-white/10 px-5 py-4">
                <h2 class="font-semibold">
                    Chat
                </h2>

                <button type="button" id="chat-close" class="rounded-lg px-2 py-1 opacity-70 hover:opacity-100">
                    X
                </button>
            </div>

            <div class="flex h-[calc(100%-65px)] flex-col">

                <!-- Messages -->
                <div class="flex-1 overflow-y-auto p-5">
                    <p class="text-sm opacity-60">
                        No messages yet.
                    </p>
                </div>

                <!-- Message Input -->
                <div class="border-t border-white/10 p-4">
                    <form class="flex gap-2">
                        <input type="text" placeholder="Type a message..." class="min-w-0 flex-1 rounded-xl border border-white/10 bg-white/5 px-3 py-2 text-sm outline-none">
                        <button type="submit" class="rounded-xl bg-cosmos-purple px-4 py-2 text-white text-sm font-semibold">
                            Send
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Timer Settings Side Panel -->
        <aside id="settings-panel"
            class="fixed right-0 top-0 z-40 h-full w-80 translate-x-full bg-cosmos-bg shadow-xl transition-transform duration-300"
        >
            <div class="flex items-center justify-between border-b border-white/10 px-5 py-4">
                <h2 class="font-semibold">
                    Timer Settings
                </h2>
                <button type="button" id="settings-close" class="rounded-lg px-2 py-1 opacity-70 hover:opacity-100">
                    X
                </button>
            </div>

            <div class="space-y-5 p-5">
                <div>
                    <label class="text-sm font-medium">
                        Focus Duration
                    </label>

                    <input type="number" value="{{ $activeSession ? $session->focus_duration : 25 }}"
                        class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-3 py-2"
                    >
                </div> 

                <div>
                    <label class="text-sm font-medium">
                        Short Break
                    </label>

                    <input type="number" value="{{ $activeSession ? $session->short_break : 5 }}"
                        class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-3 py-2"
                    >
                </div>

                <div>
                    <label class="text-sm font-medium">
                        Long Break
                    </label>

                    <input type="number" value="{{ $activeSession ? $session->long_break : 15 }}"
                        class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-3 py-2"
                    >
                </div>

                <label class="flex items-center gap-3 text-sm">
                    <input type="checkbox" class="rounded">
                    <span>Auto-start breaks</span>
                </label>

            </div>
        </aside>

        <div class="mx-auto">

            <!-- Session Panel -->
            <section class="relative rounded-3xl bg-cosmos-purple p-0 text-gray-900 shadow-md flex-col">

                <!-- Session Heading -->
                <div class="py-16 text-center">
                    <h2 class=" text-lg font-bold text-white">
                        Session:
                    </h2>

                    <h3 class="mt-2 text-2xl font-bold text-white">
                        {{ $activeSession ? $session->session_title : 'Start a Session' }}
                    </h3>
                </div>
                

                <!-- Timer -->
                <div class="py-16 text-center">
                    
                    <p class="text-lg font-medium text-white">
                        Focus Time!
                    </p>

                    <div id="timer" class="mt-4 text-9xl font-medium tracking-tight text-white">
                        {{ $activeSession ? sprintf('%02d:00', $session->focus_duration) : '25:00' }}
                    </div>

                    @if ($activeSession)
                        <button type = "button" id="start-session" 
                            class = "mt-5 rounded-xl bg-violet-300/50 px-8 py-2 font-semibold animate-pulse text-white hover:bg-violet-700">
                            Start Session
                        </button>
                    @else
                        <button type = "button" 
                            class = "mt-5 rounded-xl bg-violet-300/50 px-8 py-2 font-semibold text-white hover:bg-violet-700">
                            Start Session
                        </button>
                    @endif
                </div>

                <!-- Sessions Tools -->
                
                <!-- Chat -->
                
                <button type="button" id="chat-toggle"
                    class="absolute left-8 top-8 z-10 text-white transition-opacity hover:opacity-70"
                    aria-label="Open Chat"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-10 w-10">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6.35 3.13.98 4.5L2.25 21.75l4.72-1.1a9.75 9.75 0 1 0-4.72-7.89Z" />
                    </svg>
                </button>

                <!-- Timer Settings -->
                <button type="button" id="settings-toggle"
                    class="absolute right-8 top-8 z-10 text-white transition-opacity hover:opacity-70"
                    aria-label="Open Timer Settings"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-10 w-10">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.7 6.3a4.5 4.5 0 0 0-5.8 5.8L3.5 17.5a2.12 2.12 0 0 0 3 3l5.4-5.4a4.5 4.5 0 0 0 5.8-5.8l-3.1 3.1-3-3 3.1-3.1Z"/>
                    </svg>
                </button>

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

    <script>
        const chatPanel = document.getElementById('chat-panel');
        const settingsPanel = document.getElementById('settings-panel');
        
        const chatToggle = document.getElementById('chat-toggle');
        const settingsToggle = document.getElementById('settings-toggle');

        const chatClose = document.getElementById('chat-close');
        const settingsClose = document.getElementById('settings-close');


        chatToggle.addEventListener('click', () => {
            chatPanel.classList.toggle('-translate-x-full');
        });

        chatClose.addEventListener('click', () => {
            chatPanel.classList.add('-translate-x-full');
        });

        settingsToggle.addEventListener('click', () => {
            settingsPanel.classList.toggle('translate-x-full');
        });

        settingsClose.addEventListener('click', () => {
            settingsPanel.classList.add('translate-x-full');
        });
    </script>
</body>
</html>