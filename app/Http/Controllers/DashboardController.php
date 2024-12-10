<?php

namespace App\Http\Controllers;

use App\Charts\WeeklyVisitsChart;
use App\Models\Book;
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
            'thesis' => 0,
            'issued' => 0,

            // Visits this week
            'chart' => $chart->build(),

            // Today
            'visits' => 0,
            'percentComparedYesterday' => 0,

            'issued_books' => 0,


        ]);
    }
}
