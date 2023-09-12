<?php

namespace App\Http\Controllers;

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

        // Mencari Centroid Terakhir sebagai nilai s
        $centroid = Centroid::where('iterasi', $iterasi);
    
        
        // Mencari Nilai M 

        for ($i=0; $i < count($centroid); $i++) { 
            //variable penampung hasil euclidean
            $k_nilai = array();
            $nilai_perulangan = 0;
            $perulangan = 1;
            $centroids = $centroid[$i];
            foreach ($centroid as $key => $cen) {
                // if ($nilai_perulangan == $cen) {
                //     for ($j=0; $j < $perulangan; $j++) { 
                //         continue;
                //     }
                    
                // }

                for ($j=0; $j <= $i ; $j++) { 
                    
                }

                $sum = sqrt(
                                pow(($centroids->berizin)-($cen->berizin), 2)+
                                pow(($centroids->tidak_berizin)-($cen->tidak_berizin), 2)+
                                pow(($centroids->total)-($cen->total), 2)
                            );  
                
                $k_nilai[] = $sum;
                $i++;
            }
            $nilai_perulangan++;
            $perulangan++;
        }

        
    }

    
}
