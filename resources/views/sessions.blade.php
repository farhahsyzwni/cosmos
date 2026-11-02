@extends('layouts.app')

@section('title', 'Sessions')

@section('content')

    @php
        $activeSession = isset($session);
    @endphp


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

                    <h3 class="mt-2 text-2xl font-semibold text-white">
                        {{ $activeSession ? $session->session_title : 'Start a Session' }}
                    </h3>
                </div>
                

                <!-- Timer -->
                <div class="py-16 text-center">
                    
                    <div id="phase-label" class="mt-2 text-lg font-medium text-white">
                        Focus
                    </div>

                    <div id="timer" class="mt-4 text-9xl font-medium tracking-tight text-white">
                        {{ $activeSession ? sprintf('%02d:00', $session->focus_duration) : '25:00' }}
                    </div>

                    @if (!$activeSession)
                        <button type = "button" id="open-create-session" 
                            class = "mt-5 rounded-xl bg-violet-300/50 px-8 py-2 font-semibold animate-pulse text-white hover:bg-violet-700">
                            Start Session
                        </button>
                    @else
                        <button type = "button" 
                            id="start-session"
                            class = "mt-5 rounded-xl bg-violet-300/50 px-8 py-2 font-semibold text-white hover:bg-violet-700">
                            Start Session
                        </button>

                        @guest
                            <form action="{{ route('sessions.guest.clear') }}" method="POST" class="mt-3">
                                @csrf
                                <button type="submit" class="rounded-xl bg-red-500 px-6 py-2 font-semibold text-white hover:bg-red-700">
                                    Leave Session
                                </button>
                            </form>
                        @endguest
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

    <!-- Create Session Modal -->
    @if (!$activeSession)
        <div
            id="create-session-modal"
            class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 px-4 ">
            <div class="w-full max-w-md rounded-2xl bg-cosmos-bg p-6 shadow-2xl">
                <div class="mb-6 flex items-center justify-between">
                    <h2 class="text-xl font-bold">Create Session</h2>
                    <button type="button" id="close-create-session" class="rounded-lg px-2 py-1 text-lg opacity-60 hover:opacity-100">
                        X
                    </button>
                </div>

                <form action="{{ route('sessions.create') }}" method="POST" class="space-y-5">
                    @csrf
                    <!-- Session Title -->
                    <div>
                        <label class="text-sm font-medium">Session Title</label>
                        <input type="text" name="session_title" placeholder="e.g. Database Revision" required maxlength="100"
                            class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 outline-none focus:border-white/30"
                        >
                    </div>

                    <!-- Focus Duration -->
                    <div>
                        <label class="text-sm font-medium">Focus Duration (minutes)</label>
                        <input type="number" name="focus_duration" value="25" required min="1"
                            class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 outline-none focus:border-white/30"
                        >
                    </div>

                    <!-- Short Break -->
                    <div>
                        <label class="text-sm font-medium">Short Break (minutes)</label>
                        <input type="number" name="short_break" value="5" required min="1"
                            class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 outline-none focus:border-white/30"
                        >
                    </div>

                    <!-- Long Break -->
                    <div>
                        <label class="text-sm font-medium">Long Break (minutes)</label>
                        <input type="number" name="long_break" value="15" required min="1"
                            class="mt-2 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 outline-none focus:border-white/30"
                        >
                    </div>

                    <button
                        type="submit"
                        class="w-full rounded-xl bg-cosmos-purple px-4 py-3 text-white font-semibold hover:bg-violet-700"
                    >
                        Start Session
                    </button>
                </form>
            </div>
        </div>
    @endif

    <script>
        const createSessionModal = document.getElementById('create-session-modal');
        const openCreateSession = document.getElementById('open-create-session');
        const closeCreateSession = document.getElementById('close-create-session');

        if (openCreateSession && createSessionModal) {
            openCreateSession.addEventListener('click', () => {
                createSessionModal.classList.remove('hidden');
                createSessionModal.classList.add('flex');
            });
        }

        if (closeCreateSession && createSessionModal) {
            closeCreateSession.addEventListener('click', () => {
                createSessionModal.classList.add('hidden');   
                createSessionModal.classList.remove('flex');
            });
        }

        // Chat Panel
        const chatPanel = document.getElementById('chat-panel');
        const chatToggle = document.getElementById('chat-toggle');
        const chatClose = document.getElementById('chat-close');

        if (chatToggle && chatPanel) {
            chatToggle.addEventListener('click', () => {
                chatPanel.classList.toggle('-translate-x-full');
            });
        }
        if (chatClose && chatPanel) {
            chatClose.addEventListener('click', () => {
                chatPanel.classList.add('-translate-x-full');
            });
        }

        // Timer Settings Panel
        const settingsPanel = document.getElementById('settings-panel');
        const settingsToggle = document.getElementById('settings-toggle');
        const settingsClose = document.getElementById('settings-close');

        if (settingsToggle && settingsPanel) {
            settingsToggle.addEventListener('click', () => {
                settingsPanel.classList.toggle('translate-x-full');
            });
        }
        if (settingsClose && settingsPanel) {
            settingsClose.addEventListener('click', () => {
                settingsPanel.classList.add('translate-x-full');
            });
        }

        // Pomodoro Timer Logic
        const timerDisplay = document.getElementById('timer');
        const startButton = document.getElementById('start-session');

        const focusDuration = {{ $activeSession ? $session->focus_duration : 25 }};
        const shortBreakDuration = {{ $activeSession ? $session->short_break : 5 }};
        const longBreakDuration = {{ $activeSession ? $session->long_break : 15 }};

        let timerInterval = null;
        let isRunning = false;

        let currentPhase = 'focus';
        let remainingSeconds = focusDuration * 60;

        let completedFocusSessions = 0;

        function updateTimerDisplay() {
            const minutes = Math.floor(remainingSeconds / 60);
            const seconds = remainingSeconds % 60;
            timerDisplay.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        }

        function updatePhaseDisplay() {
            const phaseLabel = document.getElementById('phase-label');


            if (!phaseLabel) return;

            if (currentPhase === 'focus') {
                phaseLabel.textContent = 'Focus Time!';
            } else if (currentPhase === 'short-break') {
                phaseLabel.textContent = 'Short Break';
            } else {
                phaseLabel.textContent = 'Long Break';
            }
        }

        function setNextPhase() {
            if (currentPhase === 'focus') {
                completedFocusSessions++;

                if (completedFocusSessions % 4 === 0) {
                    currentPhase = 'long-break';
                    remainingSeconds = longBreakDuration * 60;
                } else {
                    currentPhase = 'short-break';
                    remainingSeconds = shortBreakDuration * 60;
                }
            } else {
                currentPhase = 'focus';
                remainingSeconds = focusDuration * 60;
            }

            updateTimerDisplay();
            updatePhaseDisplay();
        }

        function startTimer() {
            if (isRunning) return;
                isRunning = true;
                startButton.textContent = 'Pause';

                timerInterval = setInterval(() => {
                    if (remainingSeconds > 0) {
                        remainingSeconds--;
                        updateTimerDisplay();
                    } else {
                        clearInterval(timerInterval);
                        timerInterval = null;
                        isRunning = false;
                        
                        setNextPhase();
                        startTimer(); 
                    }
                }, 1000);
        }

        function pauseTimer() {
            clearInterval(timerInterval);
            timerInterval = null;
            isRunning = false;
            startButton.textContent = 'Resume';
        }

        if (startButton) {
            startButton.addEventListener('click', () => {
                if (isRunning) {
                    pauseTimer();
                } else {
                    startTimer();
                }
            });
        }

        updateTimerDisplay();
        updatePhaseDisplay();
    </script>
@endsection