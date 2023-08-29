<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use App\Models\Centroid;
use Illuminate\Http\Request;
use App\Charts\Cluster1Chart;
use App\Charts\JumlahIndustri1Chart;

class HasilController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('is_admin');
    }


    public function index()
    {
        $centroid = Centroid::where('iterasi', 0)->orderBy('total', 'asc')->get();
        $cluster = Cluster::where('iterasi', 1)->get();

        return view('pages.hasil.index',[
            'active' => 'hasil',
            'data' => $centroid,
            'cluster' => $cluster
        ]);
    }

    public function iterasi(Request $request)
    {
        //variable untuk menampilkan data yang ingin di filter
        $iterasi = Cluster::distinct('iterasi')->pluck('iterasi')->toArray();
        //variable untuk mengetahui jumlah nilai k
        $count = Centroid::where('iterasi', 0)->count();
        //variable hasil dari pengulangan pertama
        $viewData = Cluster::where('iterasi', 0)
                    ->join('data_industris', 'data_industris.id', '=', 'clusters.data_industri')
                    ->get();
        $iterasiKe = 0;
        $centroid = Centroid::where('iterasi', 0)->get();
        if($request->iterasi)
        {
            $viewData = Cluster::where('iterasi', $request->iterasi)
                    ->join('data_industris', 'data_industris.id', '=', 'clusters.data_industri')
                    ->get();
            $iterasiKe = $request->iterasi;
        $centroid = Centroid::where('iterasi', $request->iterasi)->get();

        }

        return view('pages.hasil.iterasi', [
            'active' => 'hasil',
            'data' => $iterasi,
            'count' => $count,
            'viewData' => $viewData,
            'ke' => $iterasiKe,
            'centroid' => $centroid
        ]);
    }

    public function hasilAkhir(Cluster1Chart $chart, JumlahIndustri1Chart $chartIndustri)
    {
        $iterasi = Cluster::distinct('iterasi')->pluck('iterasi')->toArray();
        $hasil = max($iterasi);


        $viewData = Cluster::where('iterasi', $hasil)
                    ->join('data_industris', 'data_industris.id', '=', 'clusters.data_industri')
                    ->orderBy('index', 'asc')
                    ->get();

        

        return view('pages.hasil.hasil-akhir', [
            'data' => $viewData,
            'active' => 'hasil',
            'iterasi' => $iterasi,
            'chart' => $chart->build(),
            'chartIndustri' => $chartIndustri->build(),
        ]);

    }

    public function chart(Cluster1Chart $chart)
    {
        return view('pages.hasil.chart',[
            'chart' => $chart->build(),
            'active' => 'hasil'
        ]);
    }
}