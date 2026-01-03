@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-10">
        <h1 class="text-3xl font-bold mb-6">Frequently Asked Questions</h1>

        @foreach($categories as $category)
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4">{{ $category->name }}</h2>

                @foreach($category->faqs as $faq)
                    <div class="mb-4 border p-4 rounded bg-gray-50">
                        <h3 class="font-medium">{{ $faq->question }}</h3>
                        <p class="mt-2 text-gray-700">{{ $faq->answer }}</p>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
