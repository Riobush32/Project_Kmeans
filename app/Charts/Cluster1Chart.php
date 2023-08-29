<?php

namespace App\Charts;

use App\Models\Centroid;
use App\Models\Cluster;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class Cluster1Chart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $iterasi = Cluster::distinct('iterasi')->pluck('iterasi')->toArray();
        $hasil = max($iterasi);
        $loop = Centroid::where('iterasi', 0)->get();

        $clusterIndex = array();
        $i = 0;
        $tahun = 0;
        $clusterInfo = array();
        foreach ($loop as $key => $value) {
            $cluster = Cluster::where('iterasi', $hasil)
                                ->join('data_industris', 'data_industris.id', '=', 'clusters.data_industri')
                                ->where('index', $i+1)
                                ->get();
            $clusterIndex[$i] = $cluster->count();

            $clusterInfo[$i] = 'Cluster'.$i+1;

            $tahun = $value->tahun;

            $i++;
        }
        return $this->chart->pieChart()
            ->setTitle('Kmeans Industri')
            ->setSubtitle('Season '.$tahun)
            ->setWidth(350)
            ->setHeight(350)
            ->addData($clusterIndex)
            ->setLabels($clusterInfo);
    }
}
