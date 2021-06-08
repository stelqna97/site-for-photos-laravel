<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.app');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/photos', [\App\Http\Controllers\PhotoController::class, 'index'])->name('photo.index');
Route::get('/photo/create', [\App\Http\Controllers\PhotoController::class, 'create'])->name('photo.create');
Route::post('photo/store',  [\App\Http\Controllers\PhotoController::class, 'store'])->name('photo.store');
Route::get('photo/{id}', [\App\Http\Controllers\PhotoController::class, 'show'])->name('photo.show');
Route::get('photo/{id}/edit', [\App\Http\Controllers\PhotoController::class, 'edit'])->name('photo.edit');
Route::post('photo/{id}/update', [\App\Http\Controllers\PhotoController::class, 'update'])->name('photo.update');
Route::get('photo/{id}/remove', [\App\Http\Controllers\PhotoController::class, 'destroy'])->name('photo.remove');

Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('user/{id}/remove', [\App\Http\Controllers\UserController::class, 'destroy'])->name('user.remove');
Route::get('user/{id}/photos', [\App\Http\Controllers\UserController::class, 'user_photos'])->name('user.photos');
Route::get('user/{id}', [\App\Http\Controllers\UserController::class, 'show'])->name('user.show');
Route::get('user/{id}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('user/{id}/update', [\App\Http\Controllers\UserController::class, 'update'])->name('user.update');

Route::get('/contact/create', [\App\Http\Controllers\ContactController::class, 'create'])->name('contact.create');
Route::post('contact/store',  [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

Route::post('comment/store',  [\App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');
Route::post('comment/{id}/update', [\App\Http\Controllers\CommentController::class, 'update'])->name('comment.update');
Route::get('comment/{id}/remove', [\App\Http\Controllers\CommentController::class, 'destroy'])->name('comment.remove');
Route::get('comment/{id}/edit', [\App\Http\Controllers\CommentController::class, 'edit'])->name('comment.edit');


