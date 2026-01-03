@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Mail a question to an admin!</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-2 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('contact.mail') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Name</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="border p-2 w-full rounded"
                    required
                >
            </div>

            <div class="mb-4">
                <label class="block mb-1">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="border p-2 w-full rounded"
                    required
                >
            </div>

            <div class="mb-4">
                <label class="block mb-1">Message</label>
                <textarea
                    name="message"
                    class="border p-2 w-full rounded"
                    rows="5"
                    required
                >{{ old('message') }}</textarea>
            </div>

            <button
                type="submit"
                class="bg-blue-500 text-blue-600 px-4 py-2 rounded"
            >
                Send
            </button>
        </form>

    </div>
@endsection
