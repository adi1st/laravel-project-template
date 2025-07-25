<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::get('/analytics', function () {
    return view('dashboard.analytics');
})->name('analytics');

Route::get('/users', function () {
    return view('dashboard.users');
})->name('users');

Route::get('/settings', function () {
    return view('dashboard.settings');
})->name('settings');
