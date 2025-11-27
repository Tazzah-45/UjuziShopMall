<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ujuzi Shop Mall') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased flex flex-col min-h-screen">

    {{-- Navbar --}}
    <nav class="bg-gray-800 text-white px-6 py-3">
        <div class="flex justify-between items-center">
            <a href="{{ route('welcome') }}" class="text-xl font-bold hover:text-gray-300">Ujuzi Shop Mall</a>

            <div class="flex items-center space-x-4">
                <a href="{{ route('products.index') }}" class="hover:text-gray-300">Products</a>
                <a href="{{ route('dashboard') }}" class="hover:text-gray-300">Dashboard</a>

                @auth
                <span class="text-gray-300 text-sm">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="ml-2 bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                        Logout
                    </button>
                </form>
                @endauth

                @guest
                <a href="{{ route('login') }}" class="hover:text-gray-300">Login</a>
                <a href="{{ route('register') }}" class="hover:text-gray-300">Register</a>
                @endguest
            </div>
        </div>
    </nav>


    {{-- Page Content --}}
    <div class="min-h-screen bg-gray-100">
        <main class="flex-grow">
            @yield('content')
        </main>

        {{-- Footer --}}
        @include('layouts.footer')
</body>
</div>

</body>

</html>