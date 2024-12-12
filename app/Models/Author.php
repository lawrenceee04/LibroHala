<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Author extends Model
{
    protected $table = 'authors';

    use HasFactory, SoftDeletes, Searchable;

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_authors');
    }
}
