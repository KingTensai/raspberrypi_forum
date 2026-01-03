@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-2">{{ $news->title }}</h1>
        <p class="text-gray-600 mb-4">By {{ $news->user->username ?? $news->user->email }} | {{ $news->created_at->format('d M Y') }}</p>

        @if($news->image)
            <img src="{{ asset('storage/' . $news->image) }}" class="mb-4 max-h-96 w-auto rounded" alt="News Image">
        @endif

        <p class="mb-4">{{ $news->content }}</p>

        <div class="space-x-2 mb-4">
            <a href="{{ route('news.edit', $news) }}" class="text-yellow-600">Edit</a>
            <form action="{{ route('news.destroy', $news) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600">Delete</button>
            </form>
        </div>

        <a href="{{ route('news.index') }}" class="mt-4 inline-block text-blue-500 mb-8">Back to list</a>

        {{-- Comments Section --}}
        <hr class="my-6">

        <h2 class="text-xl font-semibold mb-4">Comments ({{ $news->comments->count() }})</h2>

        @foreach($news->comments as $comment)
            <div class="mb-4 border p-4 rounded bg-gray-50">
                <p class="font-medium">{{ $comment->user->username ?? $comment->user->email }} said:</p>
                <p class="mt-1">{{ $comment->content }}</p>
                <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
            </div>
        @endforeach
        @auth
            <form action="{{ route('news.comments.store', $news) }}" method="POST" class="mt-6">
                @csrf
                <div class="mb-4">
                    <textarea name="content" rows="3" class="border p-2 w-full rounded" placeholder="Add a comment..." required>{{ old('content') }}</textarea>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Post Comment</button>
            </form>
        @else
            <p class="text-gray-600 mt-4">Please <a href="{{ route('login') }}" class="text-blue-500 underline">login</a> to add a comment.</p>
        @endauth

    </div>
@endsection
