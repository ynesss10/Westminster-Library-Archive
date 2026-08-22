<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin']);