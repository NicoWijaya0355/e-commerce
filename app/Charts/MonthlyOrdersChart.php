<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use App\Models\Order;
class MonthlyOrdersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    } 
   
    public function build()
    {
        $tahun= date('Y');
        $bulan= date('M');
        for($i=0;$i<=$bulan;$i++){
            $totalOrder=Order::whereYear('created_at',$tahun)->whereMonth('created_at',$bulan)->count();
            $dataBulan[]=Carbon::create()->month($i)->format('F');
            $dataTotalOrder[]=$totalOrder;
        }
        dd($dataBulan);
        return $this->chart->pieChart()
            ->setTitle('Total Order')
            ->setSubtitle('Total Order By Month')
            ->addData('Total Order',$dataTotalOrder)
            ->setXAxis($dataBulan);
    }
}