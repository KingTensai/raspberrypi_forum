<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (requires auth & email verification)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes for the current authenticated user
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Show any user's profile (optional, public)
Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

// Admin routes for news (requires auth + admin)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('news', NewsController::class);
});

require __DIR__.'/auth.php';
