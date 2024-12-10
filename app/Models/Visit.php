<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $table = 'visits';

    protected $fillable = [
        'patron_id',
        'check_in_date',
        'check_in_time',
        'check_out_date',
        'check_out_time',
    ];

    public static function today()
    {
        return self::whereDate('check_in_date', today())->count();
    }

    public static function lastWeek()
    {
        $counts = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = today()->subDays($i);
            $counts[] = self::whereDate('check_in_date', $date)->count();
        }
        return $counts;
    }

    public static function percentComparedYesterday()
    {
        $yesterdayVisitCount = self::whereDate('check_in_date', today()->subDay())->count();
        $todayVisitCount = self::whereDate('check_in_date', today())->count();

        if ($yesterdayVisitCount != 0) {
            $percentage = ($todayVisitCount - $yesterdayVisitCount) / $yesterdayVisitCount * 100;
        } else {
            $percentage = 0;
        }

        return number_format($percentage, 0);
    }
}
