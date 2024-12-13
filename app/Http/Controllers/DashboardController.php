<?php

namespace App\Http\Controllers;

use App\Charts\WeeklyVisitsChart;
use App\Models\Book;
use App\Models\BorrowingTransaction;
use App\Models\Issued;
use App\Models\Journal;
use App\Models\Patron;
use App\Models\Visit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(WeeklyVisitsChart $chart)
    {
        return view('dashboard', [
            // 4 Cards
            'patrons' => Patron::all()->count(),
            'books' => Book::all()->count(),
            'thesis' => Journal::all()->count(),
            'issued' => BorrowingTransaction::all()->count(),

            // Visits this week
            'chart' => $chart->build(),

            // Today
            'visits' => VisitController::today(),
            'visitsPercentComparedYesterday' => VisitController::percentComparedYesterday(),

            'issuedBooks' => BorrowingTransactionController::issuedBooksToday(),
            'issuedBooksPercentComparedYesterday' => BorrowingTransactionController::issuedBooksPercentComparedYesterday(),

            'returnedBooks' => BorrowingTransactionController::returnedBooksToday(),
            'returnedBooksPercentComparedYesterday' => BorrowingTransactionController::returnedBooksPercentComparedYesterday(),
        ]);
    }
}
