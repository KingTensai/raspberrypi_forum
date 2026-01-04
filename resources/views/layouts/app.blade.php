<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Raspberry Pi Forum</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

<nav class="bg-gray-800 text-white">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <a href="{{ url('/') }}" class="font-bold text-xl">RPi Forum</a>

        <div class="space-x-4">
            <a href="{{ route('news.index') }}" class="hover:underline">News</a>
            <a href="{{ url('/faq') }}" class="hover:underline">FAQ</a>
            <a href="{{ route('contact.show') }}" class="hover:underline">Contact</a>
            @auth
                <a href="{{ route('profile.show', auth()->user()) }}" class="hover:underline">Profile</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="hover:underline">Logout</button>
                </form>
                @if(auth()->user()->is_admin)
                    <a href="{{ route('admin.show') }}" class="hover:underline font-semibold">Admin Panel</a>
                @endif
            @else
                <a href="{{ route('login') }}" class="hover:underline">Login</a>
                <a href="{{ route('register') }}" class="hover:underline">Register</a>
            @endauth
        </div>
    </div>
</nav>

<div class="container mx-auto px-4 mt-4">
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif
</div>

<!-- Main Content -->
<main class="flex-1 container mx-auto px-4 py-6">
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-4 mt-auto">
    <div class="container mx-auto px-4 text-center">
        &copy; {{ date('Y') }} Raspberry Pi Forum. All rights reserved.
    </div>
</footer>

@vite('resources/js/app.js') <!-- Breeze default -->
</body>
</html>
