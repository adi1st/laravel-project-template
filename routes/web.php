<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/dashboard/advanced', function () {
    return view('dashboard-advanced');
})->name('dashboard.advanced');
// Product CRUD routes
Route::resource('products', ProductController::class);
Route::get('products/{product}/get', [ProductController::class, 'getProduct'])->name('products.get');
Route::get('/crud-demo', function () {
    return view('crud-demo');
})->name('crud.demo');