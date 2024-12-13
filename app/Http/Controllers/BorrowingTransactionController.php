<?php

namespace App\Http\Controllers;

use App\Models\BorrowingTransaction;
use Illuminate\Http\Request;

class BorrowingTransactionController extends Controller
{
    public static function issuedBooksLastWeek()
    {
        $counts = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = today()->subDays($i);
            $counts[] = BorrowingTransaction::whereDate('borrow_date', $date)->count();
        }
        return $counts;
    }

    public static function issuedBooksToday()
    {
        return BorrowingTransaction::whereDate("borrow_date", today())->count();
    }

    public static function issuedBooksPercentComparedYesterday()
    {
        $yesterday = BorrowingTransaction::whereDate('borrow_date', today()->subDay())->count();

        if ($yesterday != 0) {
            $today = BorrowingTransaction::whereDate('borrow_date', today())->count();
            $percentage = ($today - $yesterday) / $yesterday * 100;
        } else {
            $percentage = 0;
        }

        return number_format($percentage, 0);
    }

    public static function returnedBooksToday()
    {
        return BorrowingTransaction::whereDate("return_date", today())->count();
    }

    public static function returnedBooksPercentComparedYesterday()
    {
        $yesterday = BorrowingTransaction::whereDate('return_date', today()->subDay())->count();

        if ($yesterday != 0) {
            $today = BorrowingTransaction::whereDate('return_date', today())->count();
            $percentage = ($today - $yesterday) / $yesterday * 100;
        } else {
            $percentage = 0;
        }

        return number_format($percentage, 0);
    }
}
