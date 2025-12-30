@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Profile: {{ $user->name }}</h1>

        <p><strong>Email:</strong> {{ $user->email }}</p>
        @if($user->username)
            <p><strong>Username:</strong> {{ $user->username }}</p>
        @endif

        @if($user->photo_path)
            <img src="{{ asset('storage/' . $user->photo_path) }}" alt="Profile Photo" class="w-32 h-32 rounded">
        @endif
    </div>
@endsection
