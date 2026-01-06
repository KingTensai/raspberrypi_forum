@extends(auth()->check() ? 'layouts.app' : 'layouts.guest')

@section('content')
    <form method="POST" action="{{ route('faq-categories.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">Category Name</label>
            <input type="text" name="name" class="border p-2 w-full rounded" required>
        </div>
        <button type="submit" class="bg-blue-500 text-blue-500 px-4 py-2 rounded">Save</button>
    </form>
@endsection
