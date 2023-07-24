<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/myPosts', [ProfileController::class, 'index'])->name('myPost.index')->middleware("auth");
Route::put('/myPosts', [ProfileController::class, 'introduction'])->name('profile.introduction');
Route::get('/myPosts/{date}', [ProfileController::class, 'postByDate'])->name('profile.postByDate');

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('post.index');
    Route::post('/posts', 'store')->name('post.store');
    Route::get('/posts/create', 'create')->name('post.create');
    Route::get('/posts/{post}', 'show')->name('post.show');
    Route::put('/posts/{post}', 'update')->name('post.update');
    Route::delete('/posts/{post}', 'delete')->name('post.delete');
    Route::get('/posts/{post}/edit', 'edit')->name('post.edit');
});

require __DIR__.'/auth.php';
