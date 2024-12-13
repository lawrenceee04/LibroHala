<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public static function today()
    {
        return Visit::whereDate('check_in_date', today())->count();
    }

    public static function lastWeek()
    {
        $counts = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = today()->subDays($i);
            $counts[] = Visit::whereDate('check_in_date', $date)->count();
        }
        return $counts;
    }

    public static function percentComparedYesterday()
    {
        $yesterday = Visit::whereDate('check_in_date', today()->subDay())->count();
        $today = Visit::whereDate('check_in_date', today())->count();

        if ($yesterday != 0) {
            $percentage = ($today - $yesterday) / $yesterday * 100;
        } else {
            $percentage = 0;
        }

        return number_format($percentage, 0);
    }
}
