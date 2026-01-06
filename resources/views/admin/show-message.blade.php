@extends(auth()->check() ? 'layouts.app' : 'layouts.guest')
@section('content')
    <div>
    @foreach($messages as $msg)
            <div class="flex items-center justify-between p-4 border-b border-gray-200 hover:bg-gray-50">

                <div class="flex-1 font-medium text-gray-900">
                    {{ $msg->name }}
                </div>

                <div class="flex-1 text-gray-600">
                    {{ $msg->subject }}
                </div>

                <div class="flex-none">
                    <a href="{{ route('contact-messages.show', $msg) }}" class="text-blue-500 hover:underline font-semibold">
                        Read & Reply
                    </a>
                </div>

            </div>
        @endforeach

    </div>
@endsection
