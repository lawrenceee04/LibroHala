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
        $sortOrder = $request->input('sort_order', 'desc');

        $books = Book::orderBy($sortBy, $sortOrder)->paginate(10);

        return view('inventory.books.index', compact('books', 'sortBy', 'sortOrder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $book = $request->validateWithBag("addBook", [
            'accession_number' => ['required', 'string'],
            'title' => ['required', 'string', 'max:255'],
            'edition' => ['required', 'string'],
            'author' => ['required', 'string', 'max:255'],
            'publisher' => ['required', 'string', 'max:255'],
            'isbn' => ['required', 'numeric', 'digits_between:10, 13'],
            'class' => ['required', 'string', 'alpha:ascii', 'size:2'],
            'topic_area' => ['required', 'numeric'],
            'cutter_number' => ['required', 'string', 'max:10'],
            'publication_year' => ['required', 'numeric'],
            'copies' => ['nullable', 'string'],
            'genre' => ['required', 'string'],
            'description' => ['nullable', 'string'],
        ]);

        Book::create([
            'accession_number' => $book['accession_number'],
            'title' => $book['title'],
            'edition' => $book['edition'],
            'author' => $book['author'],
            'publisher' => $book['publisher'],
            'isbn' => $book['isbn'],
            'class' => $book['class'],
            'topic_area' => $book['topic_area'],
            'cutter_number' => $book['cutter_number'],
            'publication_year' => $book['publication_year'],
            'copies' => $book['copies'],
            'genre' => $book['genre'],
            'description' => $book['description'],
        ]);

        return redirect(route('books.index'));
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

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $sortBy = $request->input('sort_by');
        $sortOrder = $request->input('sort_order', 'asc');

        $search_result = Book::search($keyword, function ($meilisearch, $query, $options) use ($sortBy, $sortOrder) {
            if ($sortBy) {
                $options['sort'] = ["{$sortBy}:{$sortOrder}"];
            }
            return $meilisearch->search($query, $options);
        })->paginate(20);

        return view('inventory.books.index', [
            'books' => $search_result,
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder,
            'keyword' => $keyword
        ]);
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
