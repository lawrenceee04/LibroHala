<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Publisher extends Model
{
    protected $table = 'publishers';

    use HasFactory, SoftDeletes, Searchable;

    protected $fillable = [
        'name',
    ];
}
