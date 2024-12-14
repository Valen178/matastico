<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Models\Product;

Route::get('/', function () {
    $products = Product::all();
    return view('index', compact('products'));
});

Route::get('contacto', function () {
    return view('contact');
});

Route::get('nosotros', function () {
    return view('us');
});

Route::get('productos', function () {
    $products = Product::all();
    return view('products', compact('products'));
});

Route::controller(UserController::class)->group(function(){
    Route::get('/users', 'index');
});

Route::controller(ProductController::class)->group(function(){
    Route::get('/products', 'index');
});

Route::controller(CategoryController::class)->group(function(){
    Route::get('/categories', 'index');
});

Route::resource('users', UserController::class);

Route::resource('products', ProductController::class);

Route::resource('categories', CategoryController::class);

Route::middleware('auth')->group(function () {
    Route::resources([
        'users'=> UserController::class,
        'products'=> ProductController::class,
        'categories'=> CategoryController::class
    ]);
    Route::get('product/{product}', [OrderController::class, 'addProduct'])->name('product.add');
    Route::get('product/remove/{id}', [OrderController::class, 'removeProduct'])->name('product.remove');
    Route::get('checkout', [OrderController::class, 'showCart'])->name('checkout');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
