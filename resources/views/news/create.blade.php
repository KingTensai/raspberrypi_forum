@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Create News</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-2 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block mb-1">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="border p-2 w-full rounded" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1">Content</label>
                <textarea name="content" class="border p-2 w-full rounded" rows="5" required>{{ old('content') }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block mb-1">Image (optional)</label>
                <input type="file" name="image" class="border p-2 w-full rounded">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
        </form>
    </div>
@endsection
