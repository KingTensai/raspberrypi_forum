@extends(auth()->check() ? 'layouts.app' : 'layouts.guest')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Edit Profile: {{ $user->name }}</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-2 mb-4 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('profile.update', $user) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="name" class="block mb-1 font-semibold">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="border p-2 w-full rounded" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block mb-1 font-semibold">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="border p-2 w-full rounded" required>
            </div>
            <div class="mb-4">
                <label for="birthday" class="block mb-1 font-semibold">Birthday</label>
                <input
                    type="date"
                    name="birthday"
                    id="birthday"
                    value="{{ old('birthday', $user->birthday ? $user->birthday->format('Y-m-d') : '') }}"
                    class="border p-2 w-full rounded"
                >
            </div>
            <div class="mb-4">
                <label for="description" class="block mb-1 font-semibold">
                    Description / Bio
                </label>
                <textarea
                    name="description"
                    id="description"
                    rows="4"
                    class="border p-2 w-full rounded"
                >{{ old('description', $user->description ?? '') }}</textarea>
            </div>
            @if(auth()->check() && auth()->user()->is_admin)
                <div class="mb-4 flex items-center">
                    <input
                        type="checkbox"
                        name="is_admin"
                        id="is_admin"
                        value="1"
                        class="mr-2"
                        {{ old('is_admin', $user->is_admin ?? false) ? 'checked' : '' }}
                    >
                    <label for="is_admin" class="font-semibold">
                        Admin user
                    </label>
                </div>
            @endif
            <div class="mb-4">
                <label for="photo" class="block mb-1 font-semibold">Profile Photo</label>
                @if($user->photo_path)
                    <img src="{{ asset('storage/' . $user->photo_path) }}" alt="Profile Photo" class="w-32 h-32 rounded mb-2">
                @endif
                <input type="file" name="photo" id="photo" class="border p-2 w-full rounded">
            </div>

            <button type="submit" class="bg-blue-500 text-blue-500 px-4 py-2 rounded hover:bg-blue-600">
                Update Profile
            </button>
        </form>
    </div>
@endsection
