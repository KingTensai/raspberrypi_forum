<?php

use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

Route::resource('news', NewsController::class);
Route::get('/admin', [AdminController::class, 'show'])->name('admin.show');
Route::post('news',[NewsController::class, 'store'])->name('news.store');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');

Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');

Route::get('/contact', [ContactController::class, 'show']);
Route::post('/contact', [ContactController::class, 'sendmail'])->name('contact.send');


Route::get('/faq', [App\Http\Controllers\FAQController::class, 'show'])->name('faq.index');
Route::prefix('admin')->middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::resource('faq-categories', App\Http\Controllers\Admin\FaqCategoryController::class);
    Route::resource('faqs', App\Http\Controllers\Admin\FaqController::class);
});
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');

Route::post('/news/{news}/comments', [CommentController::class, 'store'])
    ->middleware('auth')
    ->name('news.comments.store');

Route::get('/messages', [ContactMessageController::class, 'index'])->name('contact-messages.index');

Route::get('/messages/{message}', [ContactMessageController::class, 'show'])->name('contact-messages.show');
Route::put('/admin/messages/{message}', [ContactMessageController::class, 'update'])
    ->name('admin.contact-messages.update');
require __DIR__.'/auth.php';
