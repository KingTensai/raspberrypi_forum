<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }


    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('profile.show', compact('user')); // points to resources/views/profile/show.blade.php
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
      //  dd($request->all());
        $user = $request->user();

        $user->fill($request->validated());

        if ($request->hasFile('photo')) {
            if ($user->photo_path) {
                Storage::delete($user->photo_path);
            }
            $user->photo_path = $request->file('photo')->store('profile-photos', 'public');
        }

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();
        return Redirect::route('profile.show', ['user' => $user->id])
        ->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        if ($user->photo_path) {
            Storage::delete($user->photo_path);
        }

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
