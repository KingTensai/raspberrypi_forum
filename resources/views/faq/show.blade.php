@extends(auth()->check() ? 'layouts.app' : 'layouts.guest')

@section('content')
    <div class="max-w-4xl mx-auto py-10">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold">Frequently Asked Questions</h1>
        </div>
        <div>
            @auth
                @if(auth()->user()->is_admin)
                    <a href="{{ route('faqs.create') }}"
                       class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        + Add FAQ
                    </a>
                    <a href="{{ route('faq-categories.create') }}"
                       class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        + Add Category
                    </a>
                @endif
            @endauth
        </div>
    <br>
        @foreach($categories as $category)
            @if($category->faqs->isNotEmpty())
                <div class="mb-8">
                    <h2 class="text-xl font-semibold mb-4">{{ $category->name }}</h2>

                    @foreach($category->faqs as $faq)
                        <div class="mb-4 border p-4 rounded bg-gray-50">
                            <h3 class="font-medium">{{ $faq->question }}</h3>
                            <p class="mt-2 text-gray-700">{{ $faq->answer }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        @endforeach

    </div>
@endsection
