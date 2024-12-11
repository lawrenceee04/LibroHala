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

    public function cutter_number()
    {
        return $this->belongsToMany(Author::class)->firstWhere('is_primary_author', '=', 'true');
    }

    public function class()
    {
        return $this->hasOne(Classe::class);
    }

    public function publishers()
    {
        return $this->belongsToMany(Publisher::class);
    }

    public function copies()
    {
        return $this->hasMany(BookCopy::class);
    }


    public function searchableAs()
    {
        return 'books_index';
    }

    public function toSearchableArray()
    {
        return [
            'Accession Number' => $this->accession_number,
            'Title' => $this->title,
            'Editon' => $this->edition,
            'Author' => $this->authors(),
            'Publisher' => $this->publishers(),
            'ISBN' => $this->isbn,
            'Class' => $this->class(),
            'Topic Area' => $this->topic_area,
            'Cutter Number' => $this->cutter_number(),
            'Publication Year' => $this->publication_year,
            'Copies' => $this->copies(),
            'Status' => $this->status,
            'Genre' => $this->genre,
            'Description' => $this->description,
        ];
    }

    protected $attributes = [];

    protected $fillable = [
        'accession_number',
        'isbn',
        'title',
        'edition',
        'publisher',
        'class',
        'topic_area',
        'publication_year',
        'description'
    ];
}
