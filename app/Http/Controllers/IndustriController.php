<?php

namespace App\Http\Controllers;

use App\Models\dataPilihan;
use App\Models\DataIndustri;
use Illuminate\Http\Request;

class IndustriController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('is_admin');
    }

    public function index()
    {
        $tahunData = DataIndustri::distinct('tahun')->pluck('tahun')->toArray();

        return view('pages.dataIndustri.index', [
            'active' => 'dataIndustri',
            'data' => $tahunData
        ]);
    }

    public function filterTahun($tahun)
    {
        $dataIndustri = DataIndustri::where('tahun', $tahun)->paginate(5);

        return view('pages.dataIndustri.filterTahun', [
            'active' => 'dataIndustri',
            'data' => $dataIndustri,
            'tahun' => $tahun
        ]);
    }

    public function truncate($tahun)
    {
        DataIndustri::where('tahun', $tahun)->delete();
        return back()->with('delete', 'Di Hapus');
    }

    public function dataPilihan($tahun)
    {
        $dataPilihan = DataIndustri::where('tahun', $tahun)->get();
        dataPilihan::truncate();

        foreach ($dataPilihan as $data)
        {
            $dataBaru = new dataPilihan;

            $dataBaru->kecamatan = $data->kecamatan;
            $dataBaru->berizin = $data->berizin;
            $dataBaru->tidak_berizin = $data->tidak_berizin;
            $dataBaru->total = $data->total;
            $dataBaru->tahun = $data->tahun;

            $dataBaru->save();

        }
            return redirect('/kmeans');

    }
}
