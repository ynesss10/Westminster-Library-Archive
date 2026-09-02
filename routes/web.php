<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BorrowingController;
use App\Http\Controllers\BorrowingController as UserBorrowingController;
use App\Http\Controllers\ArchiveController;

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

    Route::post('/books/{book}/request', [UserBorrowingController::class, 'request'])
        ->name('borrowings.request');

    Route::post('/books/{book}/borrow', [UserBorrowingController::class, 'borrow'])
        ->name('borrowings.borrow');

    Route::get('/archive', [ArchiveController::class, 'index'])
        ->name('archive.index');

    Route::get('/borrowings', function () {
        return view('borrowings.index');
    })->name('borrowings.index');

});


Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('books', AdminBookController::class);

        Route::resource('users', UserController::class)
            ->only(['index', 'show']);

        Route::resource('borrowings', BorrowingController::class)
            ->only(['index', 'show']);
    });