<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Timeline kelas</title>
</head>

<body>
    @foreach ($data->groupBy(function ($item) {
        return Carbon\Carbon::parse($item->tanggal)->format('F');
    }) as $month => $datas)
        <h2 class="text-center mb-3">{{ $month }}</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Guru</th>
                    <th>Mapel</th>
                    <th>Kelas</th>
                    <th>Kompetensi Keahlian</th>
                    <th>Waktu mulai</th>
                    <th>Waktu selesai</th>
                    <th>Materi yang diajarkan</th>
                    <th>Evaluasi perkembangan KBM</th>
                    <th>Laporan perkembangan siswa</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $d)
                    <tr>
                        <td>{{ $d->tanggal }}</td>
                        <td>{{ $d->nama_guru }}</td>
                        <td>{{ $d->mapel }}</td>
                        <td class="text-center">{{ $d->kelas }}</td>
                        <td class="text-center">{{ $d->kompetensi_keahlian }}</td>
                        <td>{{ $d->waktu_mulai }}</td>
                        <td>{{ $d->waktu_selesai }}</td>
                        <td>{{ $d->materi_yang_diajarkan }}</td>
                        <td>{{ $d->evaluasi_perkembangan_kbm }}</td>
                        <td>{{ $d->laporan_perkembangan_siswa }}</td>
                        <td>Sementara kosong</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    @endforeach

</body>

</html>
