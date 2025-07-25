<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/dashboard/advanced', function () {
    return view('dashboard-advanced');
})->name('dashboard.advanced');