<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Documentation route
Route::get('/documentation', function () {
    return view('documentation.index');
})->name('documentation');

// Products API
Route::get('/api/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/api/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/api/products/category/{category}', [ProductController::class, 'byCategory'])->name('products.byCategory');

// Books API
Route::get('/api/books', [BookController::class, 'index'])->name('books.index');
Route::get('/api/books/{id}', [BookController::class, 'show'])->name('books.show');
Route::get('/api/books/author/{author}', [BookController::class, 'byAuthor'])->name('books.byAuthor');

// Users API CRUD operations
Route::get('/api/users', [UserController::class, 'index'])->name('users.index');
Route::get('/api/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::post('/api/users', [UserController::class, 'store'])->name('users.store');
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/api/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/api/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/api/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

