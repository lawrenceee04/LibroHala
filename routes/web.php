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
|
*/

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
    Route::get('/inventory/books', 'index');
});

//// Add new book
//Route::post('/cataloguing/books/create', function () {
////    return view('books.create');
//});

// Update
Route::patch('/books/{id}', function ($id) {
    // validate
    // authorize
    // update
    $book = Book::findOrFail($id);

    $book->update([
        'accession_number' => request('accession_number'),
        'title' => request('title'),
        'edition' => request('edition'),
        'author' => request('author'),
        'publisher' => request('publisher'),
        'isbn' => request('isbn'),
        'class' => request('class'),
        'topic_area' => request('topic_area'),
        'cutter_number' => request('cutter_number'),
        'publication_year' => request('publication_year'),
        'copies' => request('copies'),
        'genre' => request('genre'),
        'description' => request('description')
    ]);
    // persist
    // redirect to the inventory
//    redirect()->route();
});

//Route::delete('/books/{id}', function ($id) {
////
//});

require __DIR__.'/auth.php';
