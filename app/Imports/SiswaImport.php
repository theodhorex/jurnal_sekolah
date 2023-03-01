<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            'nama_siswa' => $row[0],
            'nipd' => $row[1], 
            'jk' => $row[2],
            'kelas' => $row[3], 
            'jurusan' => $row[4], 
        ]);
    }
}