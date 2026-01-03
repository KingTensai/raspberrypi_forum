@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('faqs.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">Category</label>
            <select name="category_id" class="border p-2 w-full rounded" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Question</label>
            <input type="text" name="question" class="border p-2 w-full rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Answer</label>
            <textarea name="answer" class="border p-2 w-full rounded" rows="5" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Order</label>
            <input type="number" name="order" class="border p-2 w-full rounded">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save FAQ</button>
    </form>

@endsection
