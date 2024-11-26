<?php

namespace App\Charts;

use App\Models\Visit;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class WeeklyVisitsChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        return $this->chart->areaChart()
            ->setFontColor('#ffffff')
            ->setColors(['#ffffff', '#24aee4'])
            ->setTitle('Visits this week')
            ->setSubtitle('Visits vs Issued Books')
            ->addData('Visits', Visit::lastWeek())
            ->addData('Issued Books', [])
            ->setXAxis([
                now()->subDays(6)->isoFormat('MMM D'),
                now()->subDays(5)->isoFormat('MMM D'),
                now()->subDays(4)->isoFormat('MMM D'),
                now()->subDays(3)->isoFormat('MMM D'),
                now()->subDays(2)->isoFormat('MMM D'),
                now()->subDays(1)->isoFormat('MMM D'),
                now()->isoFormat('MMM D')
            ])
            ->setGrid('#3F51B5', 0.1);
    }
}
