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
            'accession_number' => $this->accession_number,
            'title' => $this->title,
            // 'edition'=> $this->edition,
            'author' => $this->author,
            'publisher' => $this->publisher,
            'isbn' => $this->isbn,
            // 'class' => $this->class,
            'topic_area' => $this->topic_area,
            // 'cutter_number' => $this->cutter_number,
            'publication_year' => $this->publication_year,
            // 'copies' => $this->copies,
            // 'status' => $this->status,
            'genre' => $this->genre,
            'description' => $this->description
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
