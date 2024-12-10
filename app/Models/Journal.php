<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Journal extends Model
{
    protected $table = 'journals';

    use HasFactory, SoftDeletes, Searchable;

    protected $fillable = [
        'issn',
        'title',
        'publisher',
        'language',
        'subject_area',
        'start_year',
        'end_year',
        'is_peer_reviewed',
        'publication_frequency',
        'description'
    ];
}
