<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class BookAuthor extends Model
{
    protected $table = 'book_authors';

    use HasFactory, SoftDeletes, Searchable;

    public function author()
    {
        return $this->hasOne(Author::class, 'authors_id');
    }
}
