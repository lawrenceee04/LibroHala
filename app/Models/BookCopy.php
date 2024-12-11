<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class BookCopy extends Model
{
    protected $table = 'book_copies';

    use HasFactory, SoftDeletes, Searchable;

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
