<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Kelas;

class Jurnal extends Model
{
    use HasFactory;

    protected $table = 'jurnals';

    protected $fillable = [
        'id',
        'tanggal',
        'nama_guru',
        'kelas',
        'kompetensi_keahlian',
        'mapel',
        'waktu_mulai',
        'waktu_selesai',
        'tanggal_pengajaran',
        'materi_yang_diajarkan',
        'evaluasi_perkembangan_kbm',
        'laporan_perkembangan_siswa',
    ];

    public function kelas()
    {

    }

}