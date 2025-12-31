@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Users List</h1>
        <a href="{{ route('admin.create') }}" class="bg-green-500 text-blue-500 px-4 py-2 rounded hover:bg-green-600">
            Create Profile
        </a>
    </div>
    <table class="min-w-full border border-gray-300">
        <thead>
        <tr class="bg-gray-100">
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Email</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td class="border px-4 py-2">{{ $user->id }}</td>
                <td class="border px-4 py-2">{{ $user->name }}</td>
                <td class="border px-4 py-2">{{ $user->email }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('profile.show', $user) }}" class="text-blue-600 hover:underline">
                        View Details
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
