<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use App\Models\Centroid;
use App\Models\dataPilihan;
use App\Models\DataIndustri;
use Illuminate\Http\Request;


class KmeansController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('is_admin');
    }

    public function index()
    {
        $data = dataPilihan::orderBy('kecamatan')->get();
    

        return view('pages.kmeans.index', [
            'active' => 'Kmeans',
            'data' => $data
        ]);
    }

    public function tampilCentroid()
    {
        $centroid = Centroid::where('iterasi', 0)->orderBy('total', 'asc')->get();
        $cluster = Cluster::where('iterasi', 1)->get();

        return view('pages.hasil.index',[
            'active' => 'hasil',
            'data' => $centroid,
            'cluster' => $cluster
        ]);
    }

    //hapus data pilihan
    public function truncate()
    {
        dataPilihan::truncate();

        return back();
    }


    //Proses kmeans
    public function kmeans(Request $request)
    {
        //hapus(kosongkan) table cluster
        Cluster::truncate();
        //hapus centroid selain yang belum di proses
        Centroid::whereNotIn('iterasi', [0])->delete();
        //ambil data industri
        $industri = dataPilihan::all();

         //ambil data centroid awal
        // $centroids = Centroid::where('iterasi', 0)->get();
        $centroid = Centroid::where('iterasi', 0);
        $centroids = $centroid->orderBy('total')->get(); 

        //proses mencari cluster function cluster
        $this->cluster($industri, $centroids);
        //mencari centroid baru
        $this->avarageCluster($centroids, 0);

        $iterasi = 1;
        $Loop = 0;
        $maxLoop = 100;

        //check jika inputan ada maka maxLoop diganti dengan inputan
        if ($request->maxLoop) {
            $maxLoop = $request->maxLoop;
        }
        while ($Loop < $maxLoop ) {
            
            //ambil data centroid awal
            $centroids = Centroid::where('iterasi', $iterasi)->get();
            
            //proses mencari cluster function cluster
            $this->cluster($industri, $centroids);

            //mencari centroid baru
            $this->avarageCluster($centroids, $iterasi);


            $centroidAwal = Cluster::where('iterasi', $iterasi-1)->select('index')->get();
            $centroidAkhir = Cluster::where('iterasi', $iterasi)->select('index')->get();

            $check = array();
            $check = [];
            for ($i=0; $i < count($centroidAwal); $i++) { 
                if ($centroidAwal[$i] == $centroidAkhir[$i])
                {
                    $check[$i]= 1;
                }
                else{
                    $check[$i] = 2;
                }
            }

            if (!in_array(2, $check)) {
                break;
            }
            $Loop++;
            $iterasi++;


        }

        return redirect('/dbi');
        
    }


    //mencari kValue
    public function kvalue(Request $request)
    {
        Centroid::truncate();
        $data = dataPilihan::all();

        // $centroids = $data->random($request->kvalue);
        $centroids = $data->take($request->kvalue);
        $centroids->all();
        // $centroids->orderBy('total', 'desc')->get();

        foreach ($centroids as $centroid)
        {
            
            $dataBaru = new Centroid;

            $dataBaru->kecamatan = $centroid->kecamatan;
            $dataBaru->berizin = $centroid->berizin;
            $dataBaru->tidak_berizin = $centroid->tidak_berizin;
            $dataBaru->total = $centroid->total;
            $dataBaru->tahun = $centroid->tahun; 
            $dataBaru->iterasi = '0';
            $dataBaru->save();
        }

        return redirect('/hasil');
    }


    //proses clusterisasi
    public function cluster($industri, $centroids)
    {
        $i = 0;
        //Euclidean
        foreach ($industri as $key => $data) {
            //variable penampung hasil euclidean
            $k_nilai = array();
            
            foreach ( $centroids as $key => $centroid)
            {
                $sum = sqrt(
                                pow(($data->berizin)-($centroid->berizin), 2)+
                                pow(($data->tidak_berizin)-($centroid->tidak_berizin), 2)+
                                pow(($data->total)-($centroid->total), 2)
                            );  
                $k_nilai[] = $sum;
                $i++;
                $iterasi =  $centroid->iterasi;

            }
            
            //variable centroid terdekat
            $k_min = min($k_nilai);
            //variable penentu centroid
            $index = array_search($k_min, $k_nilai);
            
            //pengulangan yang dilakukan untuk menyimpan data, jika data kosong akan di beri nilai nol
            for ($j=0; $j < 25; $j++) { 
                if (empty($k_nilai[$j]))
                {
                    $k_nilai[$j] = 0;
                }
            }
            
            $id = $data->id;
            $this->createCluster($k_nilai, $id, $k_min, $index, $iterasi);
        }
    }

    //mencari centroid baru
    function avarageCluster($centroids, $iterasiAwal)
    {
        $j = $iterasiAwal;
        for ($i=1; $i <= count($centroids); $i++) { 
            $join = Cluster::where('iterasi', $j)
                ->where('index', $i)
                ->join('data_pilihans', 'data_pilihans.id', '=', 'clusters.data_industri')->get();
            
            $berizin = $join->avg('berizin');
            $tidak_berizin = $join->avg('tidak_berizin');
            $total = $join->avg('total');
            $iterasi = $j+1;

            Centroid::create([
                'kecamatan'=> $i,
                'berizin' => $berizin,
                'tidak_berizin' => $tidak_berizin,
                'total' => $total,
                'iterasi' => $iterasi
            ]);
        }
    }
    

    // function memasukkan data cluster
    public function createCluster($k_nilai, $data_id, $k_min, $index, $iterasi)
    {
        Cluster::create([
            'data_industri' => $data_id,
            'c1'            => $k_nilai[0],
            'c2'            => $k_nilai[1],
            'c3'            => $k_nilai[2],
            'c4'            => $k_nilai[3],
            'c5'            => $k_nilai[4],
            'c6'            => $k_nilai[5],
            'c7'            => $k_nilai[6],
            'c8'            => $k_nilai[7],
            'c9'            => $k_nilai[8],
            'c10'           => $k_nilai[9],
            'c11'           => $k_nilai[10],
            'c12'           => $k_nilai[11],
            'c13'           => $k_nilai[12],
            'c14'           => $k_nilai[13],
            'c15'           => $k_nilai[14],
            'c16'           => $k_nilai[15],
            'c17'           => $k_nilai[16],
            'c18'           => $k_nilai[17],
            'c19'           => $k_nilai[18],
            'c20'           => $k_nilai[19],
            'c21'           => $k_nilai[20],
            'c22'           => $k_nilai[21],
            'c23'           => $k_nilai[22],
            'c24'           => $k_nilai[23],
            'c25'           => $k_nilai[24],
            'cluster'       => $k_min,
            'index'         => $index+1,
            'iterasi'       => $iterasi

        ]);
    }


}
