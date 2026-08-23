<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Admin\BookController as AdminBookController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin']);

Route::get('/borrowings', function () {
    return view('borrowings.index');
})->middleware('auth');

Route::get('/archive', function () {
    return view('archive.index');
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/books', [BookController::class, 'index'])
        ->name('books.index');

    Route::get('/books/{book}', [BookController::class, 'show'])
        ->name('books.show');
});

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('books', AdminBookController::class);
    });