<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BorrowingTransaction extends Model
{
    protected $table = 'borrowing_transactions';

    use HasFactory, SoftDeletes;

    protected $fillable = [
        "patron_id",
        "book_id",
        "borrow_date",
        "due_date",
        "return_date",
        "status"
    ];
}
