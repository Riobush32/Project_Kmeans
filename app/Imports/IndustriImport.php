<?php

namespace App\Imports;

use App\Models\DataIndustri;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class IndustriImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    protected $tahun;

    public function __construct($tahun)
    {
        $this->tahun = $tahun;
    }
    public function model(array $row)
    {
        return new DataIndustri([
            'kecamatan' => $row['kecamatan'],
            'berizin' => $row['berizin'],
            'tidak_berizin' => $row['tidak_berizin'],
            'total' => $row['total'],
            'tahun' => $this->tahun
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }
}
