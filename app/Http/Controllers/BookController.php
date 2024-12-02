<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sortBy = $request->input('sort_by', 'updated_at');
        $sortOrder = $request->input('sort_order', 'asc');

        $books = Book::orderBy($sortBy, $sortOrder)->paginate(20);

        return view('inventory.books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);
        return view('inventory.books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
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
        return redirect('/inventory/books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect('/inventory/books');
    }

    public function sort(Request $request)
    {
        return $this->index($request);
    }
}
