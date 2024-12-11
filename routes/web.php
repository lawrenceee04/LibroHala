<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|ob
*/

Route::fallback(function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(BookController::class)->group(function () {
    Route::get('/inventory/books', 'index')->name('books.index');
    Route::get('/inventory/book/create', 'create')->name('book.create');
    Route::post('/inventory/book/store', 'store')->name('book.store');
    Route::get('/inventory/books/search', 'search')->name('books.search');
    Route::patch('/inventory/book/{id}', 'update')->name('book.update');
    Route::delete('/inventory/books/{id}', 'destroy');
});

Route::controller(AuthorController::class)->group(function () {
    Route::get('/cataloguing/authors', 'index')->name('authors.index');
    Route::post('/cataloguing/author', 'create')->name('author.create');
    Route::post('/cataloguing/author', 'store')->name('author.store');
    // Search function
    Route::patch('/cataloguing/author/{id}', 'update')->name('author.update');
    Route::delete('/cataloguing/author/{id}', 'destroy');
});

require __DIR__ . '/auth.php';
