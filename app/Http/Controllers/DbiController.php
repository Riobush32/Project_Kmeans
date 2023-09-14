<?php

namespace App\Http\Controllers;

use App\Models\dbi;
use App\Models\NilaiM;
use App\Models\NilaiR;
use App\Models\NilaiS;
use App\Models\Cluster;
use App\Models\Centroid;
use Illuminate\Http\Request;

class DbiController extends Controller
{

    public function index(){

    }

    public function dbi()
    {
        // Mencari Iterasi Terakhir  
        $DataInterasi = Centroid::distinct('iterasi')->pluck('iterasi')->toArray();
        $iterasi = max($DataInterasi);

        // menjalankan function nilai s 
        $this->nilaiS();

        // menjalankan function nilai m
        $this->nilaiM();

        // menjalankan function nilai r 
        $this->nilaiR();

        // mencari nilai akurasi dengan dbi 
        $dbi = NilaiR::avg('nilai_r');

        dbi::create([
            'iterasi' => $iterasi-1,
            'dbi' => $dbi
        ]);
        
    }

    public function nilaiS()
    {
        NilaiS::truncate();
        // Mencari Iterasi Terakhir  
        $DataInterasi = Centroid::distinct('iterasi')->pluck('iterasi')->toArray();
        $iterasi = max($DataInterasi);
        $iterasiAkhir = $iterasi-1;

        //mencari nilai kvalue
        $centroidAwal = Centroid::where('iterasi', 0);
        $kvalue = $centroidAwal->count();

        for ($i=1; $i <= $kvalue; $i++) { 
            $centroid = 'c'.$i;
            $nilai_s = Cluster::where('iterasi', $iterasiAkhir)
                        ->avg($centroid);
            
            NilaiS::create([
                'centroid' => $centroid,
                'nilai_s' => $nilai_s,
                'iterasi' => $iterasi
            ]);
        }

    }

    public function nilaiM()
    {
        NilaiM::truncate();
        
        // Mencari Iterasi Terakhir  
        $DataInterasi = Centroid::distinct('iterasi')->pluck('iterasi')->toArray();
        $iterasi = max($DataInterasi);

        // mengambil data centroid akhir 
        $centroid = Centroid::where('iterasi', $iterasi-1)->get();

        // mencari nilai m 
            // inisialisasi untuk melihat nilai m yang diproses 
            $variable1 = 1;

            //index jumlah m
            $i = 0;

        foreach ($centroid as $key => $item) {
            // inisialisasi untuk melihat nilai m yang diproses 
            $variable2 = 1;
            

            foreach ($centroid as $key => $value) {
                // skip perulangan agar tidak ada redudansi data 
                if ($item == $value || $item >= $value) {
                        
                        $variable2++;
                        continue;
                }
                $i++;
                
                // rumus jarak euclidan 
                $euclidean = sqrt(
                                pow(($item->berizin)-($value->berizin), 2)+
                                pow(($item->tidak_berizin)-($value->tidak_berizin), 2)+
                                pow(($item->total)-($value->total), 2)
                            );  

                $inisial = 'm'.$variable1.$variable2;

                NilaiM::create([
                    'inisialisasi' => $inisial,
                    'index_m' => $i,
                    'nilai_m' => $euclidean,
                    'iterasi' => $iterasi-1,
                ]);

                $variable2++;
            }
            $variable1++;
        }
    }
    
    public function nilaiR()
    {
        NilaiR::truncate();
        // Mencari Iterasi Terakhir  
        $DataInterasi = Centroid::distinct('iterasi')->pluck('iterasi')->toArray();
        $iterasi = max($DataInterasi);

        // ambil nilai m 
        $nilaiM = NilaiM::all();

        //ambil nilai s
        $nilaiS = NilaiS::all();

        // mencari nilai r
            $variableFirstR = 1;
            $i = 0;
            foreach ($nilaiS as $key => $firstS)
            {

                

                $variableSecondR = 1;
                foreach ($nilaiS as $key => $secondS) {


                    // skip perulangan agar tidak ada redudansi data 
                    if ($firstS == $secondS || $firstS >= $secondS) {
                            
                            $variableSecondR++;
                            continue;
                    }

                    $i++;
                    // ambil nilai m 
                    $nilaiM = NilaiM::where('iterasi', $iterasi-1)
                            ->where('index_m', $i)
                            ->get();

                    foreach ($nilaiM as $key => $m) {
                        $nilaiR = ($firstS->nilai_s + $secondS->nilai_s)/$m->nilai_m;

                        $inisial = 'r'.$variableFirstR.$variableSecondR;

                        NilaiR::create([
                            'centroid' => $inisial,
                            'nilai_r' => $nilaiR,
                            'iterasi' => $iterasi-1,
                        ]);
                    }
                    

                    $variableSecondR++;
                }
                $variableFirstR++;
        }
    }

}
