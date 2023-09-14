<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use Illuminate\Http\Request;
use App\Charts\Cluster1Chart;
use App\Charts\JumlahIndustri1Chart;

class PrintController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('is_admin');
    }

    public function index(Cluster1Chart $chart, JumlahIndustri1Chart $chartIndustri)
    {
$iterasi = Cluster::distinct('iterasi')->pluck('iterasi')->toArray();
        $hasil = max($iterasi);

        $filterData = Cluster::where('iterasi', $hasil)
                    ->join('data_pilihans', 'data_pilihans.id', '=', 'clusters.data_industri')
                    ->orderBy('index', 'asc');

        $index_akhir = Cluster::where('iterasi', $iterasi)->distinct('index')->orderBy('index')->pluck('index')->toArray();

        $viewData = $filterData->get();

        return view('pages.hasil.print', [
            'data' => $viewData,
            'active' => 'hasil',
            'iterasi' => $iterasi,
            'kesimpulan' => $index_akhir,
            'chart' => $chart->build(),
            'chartIndustri' => $chartIndustri->build(),
        ]);

    }
}
