<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
    @font-face {
        font-family: 'Lato';
        src: url('/storage/fonts/Lato/Lato-Black.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: 'Lato';
        src: url('/storage/fonts/Lato/Lato-BlackItalic.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: 'Lato';
        src: url('/storage/fonts/Lato/Lato-Bold.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: 'Lato';
        src: url('/storage/fonts/Lato/Lato-BoldItalic.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: 'Lato';
        src: url('/storage/fonts/Lato/Lato-Italic.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: 'Lato';
        src: url('/storage/fonts/Lato/Lato-Light.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: 'Lato';
        src: url('/storage/fonts/Lato/Lato-LightItalic.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: 'Lato';
        src: url('/storage/fonts/Lato/Lato-Regular.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: 'Lato';
        src: url('/storage/fonts/Lato/Lato-Thin.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: 'Lato';
        src: url('/storage/fonts/Lato/Lato-ThinItalic.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    * {
        font-family: 'Lato', sans-serif;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    /* tr:nth-child(even) {
        background-color: #dddddd;
    } */

    .report {
        font-size: 12px;
    }
    </style>
    <title>Timeline kelas</title>
</head>

<body>
    <h3 style="font-family: 'Lato', sans-serif;" class="text-center mb-4">Kelas {{ $kelas->kelas }}
        {{ $kelas->jurusan }}</h3>
    @foreach ($data->groupBy(function ($item) {
    return Carbon\Carbon::parse($item->tanggal)->locale('id')->isoFormat('MMMM');
    }) as $month => $datas)
    <h5 style="font-family: 'Lato', sans-serif;" class="text-center mb-3">{{ $month }}</h5>
    
    <table class="table table-bordered report">
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
                {{-- <th>Keterangan</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $d)
            <tr>
                <td>{{ $d->tanggal_pengajaran }}</td>
                <td>{{ $d->nama_guru }}</td>
                <td>{{ $d->mapel }}</td>
                <td class="text-center">{{ $d->kelas }}</td>
                <td class="text-center">{{ $d->kompetensi_keahlian }}</td>
                <td>{{ $d->waktu_mulai }}</td>
                <td>{{ $d->waktu_selesai }}</td>
                <td>{{ $d->materi_yang_diajarkan }}</td>
                <td>{{ $d->evaluasi_perkembangan_kbm }}</td>
                <td>{{ $d->laporan_perkembangan_siswa }}</td>
                {{-- <td>Sementara kosong</td> --}}
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