<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issued extends Model
{
    use HasFactory;

    protected $table = 'issued_books';
}
