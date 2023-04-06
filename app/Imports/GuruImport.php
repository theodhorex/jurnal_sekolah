<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GuruImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name' => $row[0],
            'email' => $row[1], 
            'role' => $row[2],
            'mapel' => $row[3], 
            'password' => Hash::make('123'), 
        ]);
    }
}