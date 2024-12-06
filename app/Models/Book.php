<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Book extends Model
{
    protected $table = 'books';

    use HasFactory, SoftDeletes, Searchable;

    public function searchableAs()
    {
        return 'books_index';
    }

    public function toSearchableArray()
    {
        // All columns searchable
        // $array = $this->toArray();
        // return $array;

        return [
            'Accession Number' => $this->accession_number,
            'Title' => $this->title,
             'Editon'=> $this->edition,
            'Author' => $this->author,
            'Publisher' => $this->publisher,
            'ISBN' => $this->isbn,
            'Class' => $this->class,
            'Topic Area' => $this->topic_area,
            'Cutter Number' => $this->cutter_number,
            'Publication Year' => $this->publication_year,
            'Copies' => $this->copies,
            'Status' => $this->status,
            'Genre' => $this->genre,
            'Description' => $this->description
        ];
    }

    protected $fillable = [
        'accession_number',
        'title',
        'edition',
        'author',
        'publisher',
        'isbn',
        'class',
        'topic_area',
        'cutter_number',
        'publication_year',
        'copies',
        'status',
        'genre',
        'description'
    ];
}
