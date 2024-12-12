<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Classe extends Model
{
    protected $table = 'classes';

    use HasFactory, SoftDeletes, Searchable;
}
