@extends(auth()->check() ? 'layouts.app' : 'layouts.guest')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">All News</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('news.create') }}" class="bg-blue-500 text-blue-600 px-4 py-2 rounded mb-4 inline-block">Create New</a>

        @foreach($news as $item)
            <div class="border p-4 rounded mb-4">
                <h2 class="text-xl font-semibold">{{ $item->title }}</h2>
                @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" class="mt-2 max-h-48 w-auto rounded" alt="News Image">
                @endif
                <p>{{ $item->content }}</p>
                <div class="mt-2 space-x-2">
                    <a href="{{ route('news.show', $item) }}" class="text-blue-600">View</a>
                    @if(auth()->check() && auth()->user()->is_admin)
                    <a href="{{ route('news.edit', $item) }}" class="text-yellow-600">Edit</a>
                    <form action="{{ route('news.destroy', $item) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600">Delete</button>
                    </form>
                    @endif
                </div>
            </div>
        @endforeach

        <div class="mt-4">
            {{ $news->links() }}
        </div>
    </div>
@endsection
