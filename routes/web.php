<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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

if (App::environment('production')) {
    URL::forceScheme('https');
};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::middleware(['auth', 'verified'])->group(function () {
    // Invokable Dashboard Controller
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(BookController::class)->group(function () {
        Route::get('/inventory/books', 'index')->name('books.index');
        Route::post('/inventory/book/create', 'store')->name('book.store');
        Route::get('/inventory/books/search', 'search')->name('books.search');
        Route::post('/inventory/books', 'sort');
        Route::patch('/inventory/book/{id}', 'update');
        Route::delete('/inventory/books/{id}', 'destroy');
    });

    Route::get('/cataloguing/book/create', function () {
        return view('cataloguing.book.create');
    })->name('cataloguing.book.create');
});

// Allow unauthenticated access to the kiosk check-in/out route
Route::controller(VisitController::class)->group(function () {
    Route::get('/kiosk', 'index')->name('kiosk.checkinout.index');
    Route::post('/kiosk/checkinout/store', 'store')->name('kiosk.checkinout.store');
    Route::get('/kiosk/checkinout/show', 'show')->name('kiosk.checkinout.show');
});

// Fallback to make sure mistyped url still leads you to the welcome page.
Route::fallback(function () {
    return view('welcome');
});

require __DIR__ . '/auth.php';
