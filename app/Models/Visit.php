<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visit extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'visits';

    protected $fillable = [
        'patron_id',
        'check_in_date',
        'check_in_time',
        'check_out_date',
        'check_out_time',
    ];
}
