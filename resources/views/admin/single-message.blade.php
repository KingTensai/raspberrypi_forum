@extends(auth()->check() ? 'layouts.app' : 'layouts.guest')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Contact Message Detail</h2>

            <div class="mb-6 border-b pb-4">
                <p class="text-sm text-gray-600"><strong>Author:</strong> {{ $message->name }} ({{ $message->email }})</p>
                <p class="text-sm text-gray-600"><strong>Subject:</strong> {{ $message->subject }}</p>
                <p class="mt-4 text-gray-800 bg-gray-50 p-4 rounded">
                    {{ $message->message }}
                </p>
            </div>

            <div class="mt-6">
                <h3 class="text-lg font-semibold mb-2">Reply to Message</h3>
                <form action="{{ route('admin.contact-messages.update', $message) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="reply" class="block text-sm font-medium text-gray-700">Your Response</label>
                        <textarea
                            id="reply"
                            name="reply_message"
                            rows="5"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Type your reply here..."
                        >{{ old('reply_message', $message->reply) }}</textarea>
                    </div>

                    <div class="flex justify-between items-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-blue-500 font-bold py-2 px-4 rounded">
                            Send Reply
                        </button>
                        <a href="{{ route('contact-messages.index') }}" class="text-gray-500 hover:underline">
                            Back to all messages
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
