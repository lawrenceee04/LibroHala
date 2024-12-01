<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patron extends Model
{
    use HasFactory;

    protected $table = 'patrons';

    protected $fillable = [
        'patron_id',
        'first_name',
        'middle_name',
        'last_name',
    ];
}
