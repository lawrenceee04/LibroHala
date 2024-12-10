<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Author extends Model
{
    protected $table = 'book_authors';

    use HasFactory, SoftDeletes, Searchable;
}
