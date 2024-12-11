<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hello!</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans bg-gradient-to-r from-indigo-600 to-blue-600">
        <div class="relative min-h-screen flex flex-col items-center justify-center text-white selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="py-10">
                    <div class="text-center">
                        <h1 class="text-5xl font-extrabold leading-tight text-white drop-shadow-lg">
                            Welcome to Our Library Management System
                        </h1>
                        <p class="mt-4 text-lg font-semibold">Where books are just a click away!</p>
                    </div>
                </header>

                <main class="mt-12 text-center">
                    @auth
                        <a href="{{ route('dashboard') }}" class="inline-block text-xl font-semibold py-3 px-8 rounded-lg bg-white text-indigo-600 hover:bg-indigo-500 hover:text-white transition duration-300">
                            Go to Dashboard
                        </a>
                    @else
                        <div class="flex justify-center gap-6 mt-6">
                            <a href="{{ route('login') }}" class="inline-block text-xl font-semibold py-3 px-8 rounded-lg bg-white text-indigo-600 hover:bg-indigo-500 hover:text-white transition duration-300">
                                Login
                            </a>
                            <a href="{{ route('register') }}" class="inline-block text-xl font-semibold py-3 px-8 rounded-lg  bg-white text-indigo-600 hover:bg-indigo-500 hover:text-white transition duration-300">
                                Register
                            </a>
                        </div>
                    @endauth
                </main>
            </div>
        </div>
    </body>
</html>