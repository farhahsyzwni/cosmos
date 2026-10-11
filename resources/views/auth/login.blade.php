<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login - Cosmos</title>

        @vite(['resources/css/app.css', 'resources/js/app.js',])
    </head>

    <body class="bg-cosmos-deep flex items-center justify-center min-h-screen px-6">

        <div class="w-full max-w-md">
            
            <!-- Logo -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-white">Welcome Back to Cosmos</h1>
            </div>

            <!-- Login Container -->
            <div class="bg-cosmos-purple shadow-md rounded-2xl  p-8">
                <h2 class="text-2xl font-semibold text-white mb-6">Login to your account</h2>

                @if ($errors->any())
                    <div class="mb-5 rounded-lg bg-red-50 border border-red-200 px-4 py-3">
                            @foreach ($errors->all() as $error)
                                <p class="text-sm text-red-600">{{ $error }}</p>
                            @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-white mb-2">Email:</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email"
                        class="w-full rounded-lg border border-white px-4 p-3 
                               focus:outline-none focus:ring-2 focus:ring-cosmos-aqua focus:border-cosmos-aqua"
                        required autofocus>
                    </div>
    
                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-white mb-2">Password:</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password"
                        class="w-full rounded-lg border border-white px-4 p-3 
                               focus:outline-none focus:ring-2 focus:ring-cosmos-aqua focus:border-cosmos-aqua"
                        required>
                    </div>

                    <div>
                        <button type="submit" class="w-full rounded-lg bg-cosmos-deep/70 py-3 px-4 
                                      text-sm font-semibold text-white hover:bg-indigo-700 transition">
                            Login
                        </button>
                    </div>
                </form>

                <p class="text-center text-sm text-white/80 mt-6">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="font-medium text-cosmos-blue hover:text-cosmos-aqua">Register here</a>.</p>
            </div>
        </div>
    </body>
</html>