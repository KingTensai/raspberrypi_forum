@extends(auth()->check() ? 'layouts.app' : 'layouts.guest')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Edit News</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-2 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('news.update', $news) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block mb-1">Title</label>
                <input type="text" name="title" value="{{ old('title', $news->title) }}" class="border p-2 w-full rounded" required>
            </div>
            <div class="text-sm text-gray-600 mb-6 italic">
                Date {{ $news->publication_date->format('d-m-Y H:i') }}
                ({{ $news->publication_date->diffForHumans() }})
            </div>
            <div class="mb-4">
                <label class="block mb-1">Content</label>
                <textarea name="content" class="border p-2 w-full rounded" rows="5" required>{{ old('content', $news->content) }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block mb-1">Current Image</label>
                @if($news->image)
                    <img src="{{ asset('storage/' . $news->image) }}" class="mb-2 max-h-48 w-auto rounded" alt="News Image">
                @else
                    <p>No image uploaded</p>
                @endif
                <label class="block mt-2 mb-1">Change Image</label>
                <input type="file" name="image" class="border p-2 w-full rounded">
            </div>
            <button type="submit" class="bg-yellow-500 text-blue-500 px-4 py-2 rounded">Update</button>
        </form>
    </div>
@endsection
