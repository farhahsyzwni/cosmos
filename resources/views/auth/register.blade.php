<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register - Cosmos</title>

        @vite(['resources/css/app.css', 'resources/js/app.js',])
    </head>
    <body class="bg-cosmos-deep flex items-center justify-center min-h-screen px-6 py-10">
        <div class="w-full max-w-md">

            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-white">Create an Account</h1>
            </div>

            <div class="bg-cosmos-purple shadow-sm rounded-2xl p-8">

                <h2 class="text-2xl font-semibold text-white mb-6">Create your account</h2>

                @if ($errors->any())
                    <div class="mb-5 rounded-lg bg-red-50 border border-red-200 px-4 py-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-sm text-red-600">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="username" class="block text-sm font-medium text-white mb-2">Username:</label>
                        <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Enter your username"
                        class="w-full rounded-lg border border-white px-4 p-3 
                               focus:outline-none focus:ring-2 focus:ring-cosmos-aqua focus:border-cosmos-aqua"
                        required autofocus>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-white mb-2">Email:</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="cosmos@gmail.com"
                        class="w-full rounded-lg border border-white px-4 p-3 
                               focus:outline-none focus:ring-2 focus:ring-cosmos-aqua focus:border-cosmos-aqua"
                        required>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-white mb-2">Password:</label>
                        <input type="password" id="password" name="password" placeholder="Create a password"
                        class="w-full rounded-lg border border-white px-4 p-3 
                               focus:outline-none focus:ring-2 focus:ring-cosmos-aqua focus:border-cosmos-aqua"
                        required>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-white mb-2">Confirm Password:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password"
                        class="w-full rounded-lg border border-white px-4 p-3 
                               focus:outline-none focus:ring-2 focus:ring-cosmos-aqua focus:border-cosmos-aqua"
                        required>
                    </div>

                    <div>
                        <button type="submit" class="w-full rounded-lg bg-cosmos-deep/70 py-3 px-4 
                                      text-sm font-semibold text-white hover:bg-indigo-700 transition">
                            Create Account
                        </button>
                    </div>
                </form>

                <p class="text-center text-sm text-white/80 mt-6">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="font-medium text-cosmos-blue hover:text-cosmos-aqua">
                        Login here
                    </a>
                </p>
            </div>
        </div>
    </body>
</html>