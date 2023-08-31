<?php

namespace App\Charts;

use App\Models\Cluster;
use App\Models\Centroid;
use App\Models\dataPilihan;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class JumlahIndustri1Chart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\HorizontalBar
    {
        // $data = dataPilihan::all();

        $iterasi = Cluster::distinct('iterasi')->pluck('iterasi')->toArray();
        $hasil = max($iterasi);
        $data = Cluster::where('iterasi', $hasil)
                ->join('data_pilihans', 'data_pilihans.id', '=', 'clusters.data_industri')->orderBy('index')->get();

        $berizin = array();
        $tidakBerizin = array();
        $total = array();
        $kecamatan = array();

        $i = 0;
        foreach ($data as $key => $value) {
            $berizin[$i] = $value->berizin;
            $tidakBerizin[$i] = $value->tidak_berizin;
            $kecamatan[$i] = $value->kecamatan;
            $total[$i] = $value->total;
            $tahun = $value->tahun;
            $i++;
        }
        
        return $this->chart->horizontalBarChart()
            ->setTitle('Data Industri')
            ->setSubtitle('Data Tahun '.$tahun)
            ->setColors(['#FFC107', '#D32F2F', '#4287f5'])
            ->setHeight(800)
            ->addData('Berizin', $berizin)
            ->addData('Tidak Berizin', $tidakBerizin)
            ->addData('Total', $total)
            ->setXAxis($kecamatan);
    }
}
