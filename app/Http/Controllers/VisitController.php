<?php

namespace App\Http\Controllers;

use App\Models\Patron;
use App\Models\Visit;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function index()
    {
        return view('kiosk.index');
    }

    public function store(Request $request)
    {
        $record = $request->validateWithBag("checkinout", [
            'patron_id' => ['required', 'exists:App\Models\Patron,patron_id']
        ]);

        $existingVisit = Visit::where('patron_id', $record['patron_id'])
            ->whereNotNull('check_in_date')
            ->whereNull('check_out_date')
            ->first();

        if ($existingVisit) {
            $existingVisit->update([
                'check_out_date' => today(),
                'check_out_time' => now()->format('H:i:s')
            ]);
        } else {
            Visit::create([
                'patron_id' => $record['patron_id'],
                'check_in_date' => today(),
                'check_in_time' => now()->format('H:i:s')
            ]);
        }

        // Flash success message to the session
        session()->flash('isSuccess', Patron::where('patron_id', $record['patron_id'])->select('first_name', 'last_name')->first());

        return redirect()->back();
    }

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
