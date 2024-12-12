<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $sortBy = $request->input('sort_by', 'updated_at');
        // $sortOrder = $request->input('sort_order', 'desc');

        $authors = Author::paginate(30);

        return view('cataloguing.author.index', compact('authors'));
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
        $author = $request->validateWithBag("addAuthor", [
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'suffix' => ['string', 'max:50'],
            'cutter_number' => ['required', 'string', 'max:20'],
        ]);

        Author::create([
            'first_name' => $author['first_name'],
            'middle_name' => $author['middle_name'],
            'last_name' => $author['last_name'],
            'suffix' => $author['suffix'],
            'cutter_number' => $author['cutter_number'],
        ]);

        return redirect(route('author.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show() {}

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
    public function update(Request $request, string $id)
    {
        //

        return redirect(route('author.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Author::find($id);
        $author->delete();
        return redirect(route('author.index'));
    }
}
