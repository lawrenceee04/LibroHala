<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Book extends Model {
    protected $table = 'books';

    use HasFactory;

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
