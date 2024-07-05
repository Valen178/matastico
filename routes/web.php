<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;


Route::get('/', function () {
    return view('home');
});

Route::get('contacto', function () {
    return view('contact');
});

Route::get('nosotros', function () {
    return view('us');
});

Route::get('productos', function () {
    return view('products');
});

Route::resource('users', UserController::class);

Route::resources([
    'users'=> UserController::class,
    'products'=> ProductController::class,
    'categories'=> CategoryController::class
]);
