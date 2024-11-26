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
        // return an array of count(visits) from the last 7 days
        return $counts;
    }
}
