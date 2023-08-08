<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TodoController;
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
Route::put('/myPosts', [ProfileController::class, 'store'])->name('profile.store');
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


Route::controller(TodoController::class)->middleware(['auth'])->group(function(){
    Route::get('/todos', 'index')->name('todos.index');
    Route::post('/todos', 'store')->name('todos.store');
    Route::put('/todos/{todo}', 'update')->name('todos.update');
    Route::delete('/todos/{todo}', 'destroy')->name('todos.destroy');
    Route::get('/todos/{todo}/edit', 'edit')->name('todos.edit');

});
require __DIR__.'/auth.php';
