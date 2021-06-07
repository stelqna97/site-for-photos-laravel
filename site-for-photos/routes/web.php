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
