@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-2">{{ $news->title }}</h1>
        <p class="text-gray-600 mb-4">By {{ $news->user->username ?? $news->user->email }} | {{ $news->created_at->format('d M Y') }}</p>

        @if($news->image)
            <img src="{{ asset('storage/' . $news->image) }}" class="mb-4 max-h-96 w-auto rounded" alt="News Image">
        @endif

        <p class="mb-4">{{ $news->content }}</p>

        <div class="space-x-2">
            <a href="{{ route('news.edit', $news) }}php " class="text-yellow-600">Edit</a>
            <form action="{{ route('news.destroy', $news) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600">Delete</button>
            </form>
        </div>

        <a href="{{ route('news.index') }}" class="mt-4 inline-block text-blue-500">Back to list</a>
    </div>
@endsection

