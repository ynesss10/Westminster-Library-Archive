<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Admin\BookController as AdminBookController;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/books', [BookController::class, 'index'])
        ->name('books.index');

    Route::get('/books/{book}', [BookController::class, 'show'])
        ->name('books.show');

    Route::get('/archive', function () {
        return view('archive.index');
    })->name('archive');

    Route::get('/borrowings', function () {
        return view('borrowings.index');
    })->name('borrowings.index');

});


Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('books', AdminBookController::class);

    });