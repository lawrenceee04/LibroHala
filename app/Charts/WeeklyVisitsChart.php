<?php

namespace App\Charts;

use App\Http\Controllers\BorrowingTransactionController;
use App\Http\Controllers\VisitController;
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
            ->setColors(['#16E988', '#E91677'])
            ->setTitle('Visits this week')
            ->setSubtitle('Visits vs Issued Books')
            ->addData('Visits', VisitController::lastWeek())
            ->addData('Issued Books', BorrowingTransactionController::issuedBooksLastWeek())
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
