<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Raspberry Pi Forum</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-slate-50 min-h-screen flex flex-col">

<nav class="bg-slate-900 text-rose-400 border-b-2 border-rose-600 shadow-sm">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <a href="{{ url('/') }}" class="font-bold text-xl hover:text-rose-400 transition-colors">RPi Forum</a>
        <div class="space-x-4">
            <a href="{{ route('news.index') }}" class="hover:text-rose-400 transition-colors">News</a>
            <a href="{{ url('/faq') }}" class="hover:text-rose-400 transition-colors">FAQ</a>
            <a href="{{ url('/contact') }}" class="hover:text-rose-400 transition-colors">Contact</a>
            <a href="{{ route('login') }}" class="hover:text-rose-400 transition-colors">Login</a>
            <a href="{{ route('register') }}" class="bg-rose-600 hover:bg-rose-700 text-white px-3 py-1.5 rounded text-sm font-medium transition-colors shadow-sm">Register</a>
        </div>
    </div>
</nav>

<div class="container mx-auto px-4 mt-4">
    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-3 rounded mb-4 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-rose-50 border border-rose-200 text-rose-800 p-3 rounded mb-4 shadow-sm">
            {{ session('error') }}
        </div>
    @endif
</div>

<main class="flex-1 container mx-auto px-4 py-6">
    @yield('content')
</main>

<footer class="bg-slate-900 text-slate-400 py-4 mt-auto border-t border-slate-800">
    <div class="container mx-auto px-4 text-center">
        &copy; {{ date('Y') }} <span class="text-rose-500 font-semibold">Raspberry Pi Forum</span>. All rights reserved.
    </div>
</footer>

@vite('resources/js/app.js')
</body>
</html>
