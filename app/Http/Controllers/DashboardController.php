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
            'thesis' => Journal::all()->count(),
            'issued' => Issued::all()->count(),

            // Visits this week
            'chart' => $chart->build(),

            // Today
            'visits' => Visit::today(),
            'percentComparedYesterday' => Visit::percentComparedYesterday(),

            'issued_books' => 0,


        ]);
    }
}
