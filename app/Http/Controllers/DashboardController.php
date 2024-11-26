<?php

namespace App\Http\Controllers;

use App\Charts\WeeklyVisitsChart;
use App\Models\Book;
use App\Models\Issued;
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
            'patrons' => Patron::all()->count(),
            'books' => Book::all()->count(),
            'thesis' => 0,
            'issued' => Issued::all()->count(),
            'chart' => $chart->build(),
            'visits' => Visit::today()
        ]);
    }
}
