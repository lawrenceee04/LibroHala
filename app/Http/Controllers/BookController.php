<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $sortBy = $request->input('sort_by', 'updated_at');
        $sortOrder = $request->input('sort_order', 'desc');

        $books = Book::orderBy($sortBy, $sortOrder)->paginate(10);

        return view('inventory.book.index', compact('books', 'sortBy', 'sortOrder'));
    }

    public function create(Request $request)
    {
        return view('inventory.book.create', [
            'authors' => Author::all()->unique(),
            // 'authors' => [
            //     [
            //         'id' => 1,
            //         'name' => 'Lawrence Garcia'
            //     ],
            //     [
            //         'id' => 2,
            //         'name' => 'Ryan Azur'
            //     ]
            // ]
        ]);
    }

    public function store(Request $request)
    {
        $bookConfirmed = $request->validateWithBag("addBook", [
            'accession_number' => ['required', 'string'],
            'title' => ['required', 'string', 'max:255'],
            'edition' => ['required', 'string'],
            'authors' => ['required', 'array'],
            'authors.*' => ['exists:authors, id'],
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

        $book = Book::create([
            'accession_number' => $bookConfirmed['accession_number'],
            'title' => $bookConfirmed['title'],
            'edition' => $bookConfirmed['edition'],
            'publisher' => $bookConfirmed['publisher'],
            'isbn' => $bookConfirmed['isbn'],
            'class' => $bookConfirmed['class'],
            'topic_area' => $bookConfirmed['topic_area'],
            'cutter_number' => $bookConfirmed['cutter_number'],
            'publication_year' => $bookConfirmed['publication_year'],
            'copies' => $bookConfirmed['copies'],
            'genre' => $bookConfirmed['genre'],
            'description' => $bookConfirmed['description'],
        ]);

        $book->authors()->attach($bookConfirmed['authors']);

        return redirect(route('books.index'))->with('success', 'Book created successfully');
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

        return view('inventory.book.index', [
            'books' => $search_result,
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder,
            'keyword' => $keyword
        ]);
    }

    public function update(string $id)
    {
        // Needs validation

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

        return redirect(route('books.index'));
    }

    public function destroy(string $id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect(route('books.index'));
    }

    public function sort(Request $request)
    {
        return $this->index($request);
    }
}
