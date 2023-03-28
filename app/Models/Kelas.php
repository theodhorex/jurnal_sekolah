<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Jurnal;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'kelas',
        'jurusan',
        'jumlah_siswa',
        'guru_pengampu',
        'angkatan',
        'tahun_ajaran',
        'status'
    ];


    public function jurnal(){
        return $this -> hasMany(Jurnal::class, '');
    }
}