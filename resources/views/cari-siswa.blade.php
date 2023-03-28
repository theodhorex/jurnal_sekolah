@extends('layouts.user_type.auth')

@section('content')
<head>
    <style>
        .wrapper{
            overflow-y: hidden;
            overflow-x: auto;
        }
        .wrapper::-webkit-scrollbar{
            display: none;
        }
    </style>
</head>
    <div class="row mx-3">
        <div class="col">
            <h2 class="mb-3">Cari nama siswa atau guru disini</h2>
        </div>
        <input type="search" name="cari_nama_siswa" id="cari_nama_siswa" class="form-control"
            placeholder="Cari nama siswa atau guru disini..">
    </div>
    
    <div class="wrapper">
        <div id="search-target" class="mx-3 mt-4" style="overflow-x: auto;">
            {{-- <h1>lollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollollol</h1> --}}
        </div>
    </div>

    <!--  Jquery  -->
    <script src="{{ asset('jquery/jquery-3.6.3.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#cari_nama_siswa').on('keyup', function() {
                $.ajax({
                    type: "GET",
                    url: "{{ url('cari-siswa') }}",
                    data: {
                        result: $(this).val(),
                        search: true
                    },
                    dataType: "json",
                    success: function(data) {
                        let search_result = data.map(function(e) {
                            return `
                                <table style="border: 1px solid black;" class="table">
                                    <thead style="border: 1px solid black;">
                                        <tr style="border: 1px solid black; color: black;">
                                            {{-- <th style="border: 1px solid black;" class="text-center">Aksi</th> --}}
                                            <th style="border: 1px solid black;" class="text-center">Tanggal</th>
                                            <th style="border: 1px solid black;">Nama Guru</th>
                                            <th class="text-center" style="border: 1px solid black;">Mapel</th>
                                            <th style="border: 1px solid black;" class="text-center">Kelas</th>
                                            <th style="border: 1px solid black;">Kompetensi Keahlian</th>
                                            <th style="border: 1px solid black;">Waktu mulai</th>
                                            <th style="border: 1px solid black;">Waktu selesai</th>
                                            <th style="border: 1px solid black;">Materi yang diajarkan</th>
                                            <th style="border: 1px solid black;">Evaluasi perkembangan KBM</th>
                                            <th style="border: 1px solid black;">Nama murid yang bersangkutan</th>
                                            <th style="border: 1px solid black;">Laporan perkembangan siswa</th>
                                            {{-- <th style="border: 1px solid black;">Keterangan</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody style="border: 1px solid black;">
                                        <tr style="border: 1px solid black; color: black;">
                                            {{-- <td style="border: 1px solid black;"><a href="#" class="btn btn-primary"><i --}}
                                            {{--             class="fa fa-edit"></i></a></td> --}}
                                            <td style="border: 1px solid black;" class="text-center">
                                                ${e['tanggal_pengajaran']}</td>
                                            <td style="border: 1px solid black;">${e['nama_guru']}</td>
                                            <td style="border: 1px solid black;">${e['mapel']}</td>
                                            <td style="border: 1px solid black;" class="text-center">
                                                ${e['kelas']}
                                            </td>
                                            <td style="border: 1px solid black;">
                                                ${e['kompetensi_keahlian']}
                                            </td>
                                            <td class="text-center" style="border: 1px solid black;">
                                                ${e['waktu_mulai']}</td>
                                            <td class="text-center" style="border: 1px solid black;">
                                                ${e['waktu_selesai']}</td>
                                            <td style="border: 1px solid black;">
                                                ${e['materi_yang_diajarkan']}
                                            </td>
                                            <td style="border: 1px solid black;">
                                                ${e['evaluasi_perkembangan_kbm']}
                                            </td>
                                            <td style="border: 1px solid black;">
                                                ${e['nama_siswa_yang_bersangkutan']}
                                            </td>
                                            <td style="border: 1px solid black;">
                                                ${e['laporan_perkembangan_siswa']}
                                            </td>
                                            {{-- <td style="border: 1px solid black;"></td> --}}

                                        </tr>
                                    </tbody>
                                </table>
                            `;
                        });
                        $('#search-target').html(search_result)
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });
        });
    </script>
@endsection
