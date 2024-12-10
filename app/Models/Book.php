<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Book extends Model
{
    protected $table = 'books';

    use HasFactory, SoftDeletes, Searchable;

    // Relations
    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function class()
    {
        return $this->hasOne(Classe::class);
    }




    //
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
            'Editon' => $this->edition,
            'Author' => $this->authors(),
            'Publisher' => $this->publisher,
            'ISBN' => $this->isbn,
            'Class' => $this->class(),
            'Topic Area' => $this->topic_area,
            'Cutter Number' => $this->cutter_number,
            'Publication Year' => $this->publication_year,
            'Copies' => $this->copies,
            'Status' => $this->status,
            'Genre' => $this->genre,
            'Description' => $this->description,
        ];
    }

    protected $attributes = [
        'status' => 'Available',
    ];

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
        'genre',
        'description'
    ];
}
