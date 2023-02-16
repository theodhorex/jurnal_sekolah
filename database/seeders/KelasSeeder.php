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
                'jurusan' => 'RPL',
                'jumlah_siswa' => '30',
                'guru_pengampu' => 'Guru 1',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023'
            ],
            [
                'kelas' => 'X',
                'jurusan' => 'MM',
                'jumlah_siswa' => '30',
                'guru_pengampu' => 'Guru 2',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023'
            ],
            [
                'kelas' => 'X',
                'jurusan' => 'TKRO',
                'jumlah_siswa' => '30',
                'guru_pengampu' => 'Guru 3',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023'
            ],
            [
                'kelas' => 'X',
                'jurusan' => 'BKP',
                'jumlah_siswa' => '30',
                'guru_pengampu' => 'Guru 4',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023'
            ],
            [
                'kelas' => 'X',
                'jurusan' => 'TB',
                'jumlah_siswa' => '30',
                'guru_pengampu' => 'Guru 5',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023'
            ],
            
            [
                'kelas' => 'XI',
                'jurusan' => 'RPL',
                'jumlah_siswa' => '30',
                'guru_pengampu' => 'Guru 1',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023'
            ],
            [
                'kelas' => 'XI',
                'jurusan' => 'MM',
                'jumlah_siswa' => '30',
                'guru_pengampu' => 'Guru 2',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023'
            ],
            [
                'kelas' => 'XI',
                'jurusan' => 'TKRO',
                'jumlah_siswa' => '30',
                'guru_pengampu' => 'Guru 3',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023'
            ],
            [
                'kelas' => 'XI',
                'jurusan' => 'BKP',
                'jumlah_siswa' => '30',
                'guru_pengampu' => 'Guru 4',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023'
            ],
            [
                'kelas' => 'XI',
                'jurusan' => 'TB',
                'jumlah_siswa' => '30',
                'guru_pengampu' => 'Guru 5',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023'
            ],
            
            [
                'kelas' => 'XII',
                'jurusan' => 'RPL',
                'jumlah_siswa' => '30',
                'guru_pengampu' => 'Guru 1',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023'
            ],
            [
                'kelas' => 'XII',
                'jurusan' => 'MM',
                'jumlah_siswa' => '30',
                'guru_pengampu' => 'Guru 2',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023'
            ],
            [
                'kelas' => 'XII',
                'jurusan' => 'TKRO',
                'jumlah_siswa' => '30',
                'guru_pengampu' => 'Guru 3',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023'
            ],
            [
                'kelas' => 'XII',
                'jurusan' => 'BKP',
                'jumlah_siswa' => '30',
                'guru_pengampu' => 'Guru 4',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023'
            ],
            [
                'kelas' => 'XII',
                'jurusan' => 'TB',
                'jumlah_siswa' => '30',
                'guru_pengampu' => 'Guru 5',
                'angkatan' => '10',
                'tahun_ajaran' => '2019/2023'
            ],
        ];

        foreach($kelas as $kelass => $value){
            Kelas::create($value);
        }
    }
}