<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelas = [
            [
                'kelas' => 'X',
                'jurusan' => 'PPLG',
                'jumlah_siswa' => '0',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023',
                'status' => 'aktif'
            ],
            [
                'kelas' => 'X',
                'jurusan' => 'DKV1',
                'jumlah_siswa' => '0',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023',
                'status' => 'aktif'
            ],
            [
                'kelas' => 'X',
                'jurusan' => 'DKV2',
                'jumlah_siswa' => '0',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023',
                'status' => 'aktif'
            ],
            [
                'kelas' => 'X',
                'jurusan' => 'TKRO',
                'jumlah_siswa' => '0',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023',
                'status' => 'aktif'
            ],
            [
                'kelas' => 'X',
                'jurusan' => 'TKP',
                'jumlah_siswa' => '0',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023',
                'status' => 'aktif'
            ],
            [
                'kelas' => 'X',
                'jurusan' => 'KULINER',
                'jumlah_siswa' => '0',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023',
                'status' => 'aktif'
            ],
            
            [
                'kelas' => 'XI',
                'jurusan' => 'RPL',
                'jumlah_siswa' => '0',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023',
                'status' => 'aktif'
            ],
            [
                'kelas' => 'XI',
                'jurusan' => 'MM',
                'jumlah_siswa' => '0',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023',
                'status' => 'aktif'
            ],
            [
                'kelas' => 'XI',
                'jurusan' => 'TKRO',
                'jumlah_siswa' => '0',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023',
                'status' => 'aktif'
            ],
            [
                'kelas' => 'XI',
                'jurusan' => 'BKP',
                'jumlah_siswa' => '0',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023',
                'status' => 'aktif'
            ],
            [
                'kelas' => 'XI',
                'jurusan' => 'TB',
                'jumlah_siswa' => '0',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023',
                'status' => 'aktif'
            ],
            
            [
                'kelas' => 'XII',
                'jurusan' => 'RPL',
                'jumlah_siswa' => '0',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023',
                'status' => 'aktif'
            ],
            [
                'kelas' => 'XII',
                'jurusan' => 'MM',
                'jumlah_siswa' => '0',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023',
                'status' => 'aktif'
            ],
            [
                'kelas' => 'XII',
                'jurusan' => 'TKRO',
                'jumlah_siswa' => '0',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023',
                'status' => 'aktif'
            ],
            [
                'kelas' => 'XII',
                'jurusan' => 'BKP',
                'jumlah_siswa' => '0',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023',
                'status' => 'aktif'
            ],
            [
                'kelas' => 'XII',
                'jurusan' => 'TB',
                'jumlah_siswa' => '0',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023',
                'status' => 'aktif'
            ],
        ];

        foreach($kelas as $kelass => $value){
            Kelas::create($value);
        }
    }
}