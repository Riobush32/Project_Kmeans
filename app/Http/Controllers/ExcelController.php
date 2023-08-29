<?php

namespace App\Http\Controllers;

use App\Http\Requests\dataIndustriRequest;
use Illuminate\Http\Request;
use App\Imports\IndustriImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function storeIndustri(dataIndustriRequest $request) 
    {
        $file = $request->file('excel');
        $tahun = $request->input('tahun');
        Excel::import(new IndustriImport($tahun), $file);
        return back()->with('success', 'Di Input');
    }
}
