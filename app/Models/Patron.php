<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patron extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'patrons';

    protected $fillable = [
        'patron_id',
        'first_name',
        'middle_name',
        'last_name',
    ];
}
