<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Models\Book;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->controller(BookController::class)->group(function () {
    Route::get('/inventory/books', 'index')->name('books.index');
    Route::post('/inventory/book/create', 'store')->name('book.store');
    Route::get('/inventory/books/search', 'search')->name('books.search');
    Route::post('/inventory/books', 'sort');
    Route::patch('/inventory/book/{id}', 'update');
    Route::delete('/inventory/books/{id}', 'destroy');
});

Route::get('/cataloguing/book/create', function () {
    return view('cataloguing.book.create');
})->middleware(['auth', 'verified'])->name('cataloguing.book');

Route::fallback(function () {
    return view('welcome');
});

require __DIR__ . '/auth.php';
