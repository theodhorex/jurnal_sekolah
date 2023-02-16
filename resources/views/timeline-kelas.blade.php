@extends('layouts.user_type.auth')

@section('content')
    <div class="row">
        <div class="col mx-3">
            <div class="row">
                <div class="col">
                    <a href="" class="btn bg-gradient-primary">Export PDF</a>
                </div>
            </div>
            <h2 class="mb-3"><i class="fa fa-arrow-left me-3 cursor-pointer" onClick="history.back()"></i> Timeline kelas
                {{ $kelas->kelas }} {{ $kelas->jurusan }}
            </h2>
            <h3 class="mb-2">Februari</h3>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div id="minggu1" class="accordion-item bg-gradient-primary my-1 rounded">
                    <h2 class="accordion-header" id="flush-headingOne2">
                        <button class="accordion-button collapsed text-light font-weight-bold" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne2" aria-expanded="false"
                            aria-controls="flush-collapseOne2">
                            Minggu 1
                        </button>
                    </h2>
                    <div id="flush-collapseOne2" class="accordion-collapse collapse" aria-labelledby="flush-headingOne2"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body" style="overflow-x: scroll;">
                            <table style="border: 1px solid white;" class="table">
                                <thead style="border: 1px solid white;">
                                    <tr style="border: 1px solid white; color: white;">
                                        <th style="border: 1px solid white;" class="text-center">Aksi</th>
                                        <th style="border: 1px solid white;" class="text-center">Tanggal</th>
                                        <th style="border: 1px solid white;">Nama Guru</th>
                                        <th class="text-center" style="border: 1px solid white;">Mapel</th>
                                        <th style="border: 1px solid white;" class="text-center">Kelas</th>
                                        <th style="border: 1px solid white;">Kompetensi Keahlian</th>
                                        <th style="border: 1px solid white;">Waktu mulai</th>
                                        <th style="border: 1px solid white;">Waktu selesai</th>
                                        <th style="border: 1px solid white;">Materi yang diajarkan</th>
                                        <th style="border: 1px solid white;">Evaluasi perkembangan KBM</th>
                                        <th style="border: 1px solid white;">Laporan perkembangan siswa</th>
                                        <th style="border: 1px solid white;">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody style="border: 1px solid white;">
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($jurnal_kelas as $jurnal)
                                        @if ($jurnal->minggu_ke == 1)
                                            @if ($jurnal->bulan_apa == 2)
                                                <tr style="border: 1px solid white; color: white;">
                                                    <td style="border: 1px solid white;"><a href="#"
                                                            class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                                                    <td style="border: 1px solid white;" class="text-center">
                                                        {{ date('d-m-Y', strtotime($jurnal->tanggal)) }}</td>
                                                    <td style="border: 1px solid white;">{{ $jurnal->nama_guru }}</td>
                                                    <td style="border: 1px solid white;">{{ $jurnal->mapel }}</td>
                                                    <td style="border: 1px solid white;" class="text-center">
                                                        {{ $jurnal->kelas }}
                                                    </td>
                                                    <td style="border: 1px solid white;">{{ $jurnal->kompetensi_keahlian }}
                                                    </td>
                                                    <td class="text-center" style="border: 1px solid white;">
                                                        {{ $jurnal->waktu_mulai }}</td>
                                                    <td class="text-center" style="border: 1px solid white;">
                                                        {{ $jurnal->waktu_selesai }}</td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->materi_yang_diajarkan }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->evaluasi_perkembangan_kbm }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->laporan_perkembangan_siswa }}
                                                    </td>
                                                    <td style="border: 1px solid white;"></td>

                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="minggu2" class="accordion-item bg-gradient-primary my-1 rounded">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed text-light font-weight-bold" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo2" aria-expanded="false"
                            aria-controls="flush-collapseTwo2">
                            Minggu 2
                        </button>
                    </h2>
                    <div id="flush-collapseTwo2" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo2"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body" style="overflow-x: scroll;">
                            <table style="border: 1px solid white;" class="table">
                                <thead style="border: 1px solid white;">
                                    <tr style="border: 1px solid white; color: white;">
                                        <th class="text-center" style="border: 1px solid white;">Aksi</th>
                                        <th style="border: 1px solid white;" class="text-center">Tanggal</th>
                                        <th style="border: 1px solid white;">Nama Guru</th>
                                        <th class="text-center" style="border: 1px solid white;">Mapel</th>
                                        <th style="border: 1px solid white;" class="text-center">Kelas</th>
                                        <th style="border: 1px solid white;">Kompetensi Keahlian</th>
                                        <th style="border: 1px solid white;">Waktu mulai</th>
                                        <th style="border: 1px solid white;">Waktu selesai</th>
                                        <th style="border: 1px solid white;">Materi yang diajarkan</th>
                                        <th style="border: 1px solid white;">Evaluasi perkembangan KBM</th>
                                        <th style="border: 1px solid white;">Laporan perkembangan siswa</th>
                                        <th style="border: 1px solid white;">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody style="border: 1px solid white;">
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($jurnal_kelas as $jurnal)
                                        @if ($jurnal->minggu_ke == 2)
                                            @if ($jurnal->bulan_apa == 2)
                                                <tr style="border: 1px solid white; color: white;">
                                                    <td style="border: 1px solid white;"><a href="#"
                                                            class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                                                    <td style="border: 1px solid white;" class="text-center">
                                                        {{ date('d-m-Y', strtotime($jurnal->tanggal)) }}</td>
                                                    <td style="border: 1px solid white;">{{ $jurnal->nama_guru }}</td>
                                                    <td style="border: 1px solid white;">{{ $jurnal->mapel }}</td>
                                                    <td style="border: 1px solid white;" class="text-center">
                                                        {{ $jurnal->kelas }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->kompetensi_keahlian }}
                                                    </td>
                                                    <td class="text-center" style="border: 1px solid white;">
                                                        {{ $jurnal->waktu_mulai }}</td>
                                                    <td class="text-center" style="border: 1px solid white;">
                                                        {{ $jurnal->waktu_selesai }}</td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->materi_yang_diajarkan }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->evaluasi_perkembangan_kbm }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->laporan_perkembangan_siswa }}
                                                    </td>
                                                    <td style="border: 1px solid white;"></td>

                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="minggu3" class="accordion-item bg-gradient-primary my-1 rounded">
                    <h2 class="accordion-header" id="flush-headingThree2">
                        <button class="accordion-button collapsed text-light font-weight-bold" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseThree2" aria-expanded="false"
                            aria-controls="flush-collapseThree2">
                            Minggu 3
                        </button>
                    </h2>
                    <div id="flush-collapseThree2" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree2" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body" style="overflow-x: scroll;">
                            <table style="border: 1px solid white;" class="table">
                                <thead style="border: 1px solid white;">
                                    <tr style="border: 1px solid white; color: white;">
                                        <th class="text-center" style="border: 1px solid white;">Aksi</th>
                                        <th style="border: 1px solid white;" class="text-center">No</th>
                                        <th style="border: 1px solid white;" class="text-center">Tanggal</th>
                                        <th style="border: 1px solid white;">Nama Guru</th>
                                        <th class="text-center" style="border: 1px solid white;">Mapel</th>
                                        <th style="border: 1px solid white;" class="text-center">Kelas</th>
                                        <th style="border: 1px solid white;">Kompetensi Keahlian</th>
                                        <th style="border: 1px solid white;">Waktu mulai</th>
                                        <th style="border: 1px solid white;">Waktu selesai</th>
                                        <th style="border: 1px solid white;">Materi yang diajarkan</th>
                                        <th style="border: 1px solid white;">Evaluasi perkembangan KBM</th>
                                        <th style="border: 1px solid white;">Laporan perkembangan siswa</th>
                                        <th style="border: 1px solid white;">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody style="border: 1px solid white;">
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($jurnal_kelas as $jurnal)
                                        @if ($jurnal->minggu_ke == 3)
                                            @if ($jurnal->bulan_apa == 2)
                                                <tr style="border: 1px solid white; color: white;">
                                                    <td style="border: 1px solid white;"><a href="#"
                                                            class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                                                    <td style="border: 1px solid white;" class="text-center">
                                                        {{ date('d-m-Y', strtotime($jurnal->tanggal)) }}</td>
                                                    <td style="border: 1px solid white;">{{ $jurnal->nama_guru }}</td>
                                                    <td style="border: 1px solid white;">{{ $jurnal->mapel }}</td>
                                                    <td style="border: 1px solid white;" class="text-center">
                                                        {{ $jurnal->kelas }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->kompetensi_keahlian }}
                                                    </td>
                                                    <td class="text-center" style="border: 1px solid white;">
                                                        {{ $jurnal->waktu_mulai }}</td>
                                                    <td class="text-center" style="border: 1px solid white;">
                                                        {{ $jurnal->waktu_selesai }}</td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->materi_yang_diajarkan }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->evaluasi_perkembangan_kbm }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->laporan_perkembangan_siswa }}
                                                    </td>
                                                    <td style="border: 1px solid white;"></td>

                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="minggu4" class="accordion-item bg-gradient-primary my-1 rounded">
                    <h2 class="accordion-header" id="flush-headingFour2">
                        <button class="accordion-button collapsed text-light font-weight-bold" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseFour2" aria-expanded="false"
                            aria-controls="flush-collapseFour2">
                            Minggu 4
                        </button>
                    </h2>
                    <div id="flush-collapseFour2" class="accordion-collapse collapse" aria-labelledby="flush-headingFour2"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body" style="overflow-x: scroll;">
                            <table style="border: 1px solid white;" class="table">
                                <thead style="border: 1px solid white;">
                                    <tr style="border: 1px solid white; color: white;">
                                        <th style="border: 1px solid white;" class="text-center">Aksi</th>
                                        <th style="border: 1px solid white;" class="text-center">Tanggal</th>
                                        <th style="border: 1px solid white;">Nama Guru</th>
                                        <th class="text-center" style="border: 1px solid white;">Mapel</th>
                                        <th style="border: 1px solid white;" class="text-center">Kelas</th>
                                        <th style="border: 1px solid white;">Kompetensi Keahlian</th>
                                        <th style="border: 1px solid white;">Waktu mulai</th>
                                        <th style="border: 1px solid white;">Waktu selesai</th>
                                        <th style="border: 1px solid white;">Materi yang diajarkan</th>
                                        <th style="border: 1px solid white;">Evaluasi perkembangan KBM</th>
                                        <th style="border: 1px solid white;">Laporan perkembangan siswa</th>
                                        <th style="border: 1px solid white;">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody style="border: 1px solid white;">
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($jurnal_kelas as $jurnal)
                                        @if ($jurnal->minggu_ke == 4)
                                            @if ($jurnal->bulan_apa == 2)
                                                <tr style="border: 1px solid white; color: white;">
                                                    <td style="border: 1px solid white;"><a href="#"
                                                            class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                                                    <td style="border: 1px solid white;" class="text-center">
                                                        {{ date('d-m-Y', strtotime($jurnal->tanggal)) }}</td>
                                                    <td style="border: 1px solid white;">{{ $jurnal->nama_guru }}</td>
                                                    <td style="border: 1px solid white;">{{ $jurnal->mapel }}</td>
                                                    <td style="border: 1px solid white;" class="text-center">
                                                        {{ $jurnal->kelas }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->kompetensi_keahlian }}
                                                    </td>
                                                    <td class="text-center" style="border: 1px solid white;">
                                                        {{ $jurnal->waktu_mulai }}</td>
                                                    <td class="text-center" style="border: 1px solid white;">
                                                        {{ $jurnal->waktu_selesai }}</td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->materi_yang_diajarkan }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->evaluasi_perkembangan_kbm }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->laporan_perkembangan_siswa }}
                                                    </td>
                                                    <td style="border: 1px solid white;"></td>

                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="minggu5" class="accordion-item bg-gradient-primary my-1 rounded">
                    <h2 class="accordion-header" id="flush-headingFive2">
                        <button class="accordion-button collapsed text-light font-weight-bold" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseFive2" aria-expanded="false"
                            aria-controls="flush-collapseFive2">
                            Minggu 5
                        </button>
                    </h2>
                    <div id="flush-collapseFive2" class="accordion-collapse collapse" aria-labelledby="flush-headingFive2"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body" style="overflow-x: scroll;">
                            <table style="border: 1px solid white;" class="table">
                                <thead style="border: 1px solid white;">
                                    <tr style="border: 1px solid white; color: white;">
                                        <th style="border: 1px solid white;" class="text-center">Aksi</th>
                                        <th style="border: 1px solid white;" class="text-center">Tanggal</th>
                                        <th style="border: 1px solid white;">Nama Guru</th>
                                        <th class="text-center" style="border: 1px solid white;">Mapel</th>
                                        <th style="border: 1px solid white;" class="text-center">Kelas</th>
                                        <th style="border: 1px solid white;">Kompetensi Keahlian</th>
                                        <th style="border: 1px solid white;">Waktu mulai</th>
                                        <th style="border: 1px solid white;">Waktu selesai</th>
                                        <th style="border: 1px solid white;">Materi yang diajarkan</th>
                                        <th style="border: 1px solid white;">Evaluasi perkembangan KBM</th>
                                        <th style="border: 1px solid white;">Laporan perkembangan siswa</th>
                                        <th style="border: 1px solid white;">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody style="border: 1px solid white;">
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($jurnal_kelas as $jurnal)
                                        @if ($jurnal->minggu_ke == 4)
                                            @if ($jurnal->bulan_apa == 2)
                                                <tr style="border: 1px solid white; color: white;">
                                                    <td style="border: 1px solid white;"><a href="#"
                                                            class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                                                    <td style="border: 1px solid white;" class="text-center">
                                                        {{ date('d-m-Y', strtotime($jurnal->tanggal)) }}</td>
                                                    <td style="border: 1px solid white;">{{ $jurnal->nama_guru }}</td>
                                                    <td style="border: 1px solid white;">{{ $jurnal->mapel }}</td>
                                                    <td style="border: 1px solid white;" class="text-center">
                                                        {{ $jurnal->kelas }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->kompetensi_keahlian }}
                                                    </td>
                                                    <td class="text-center" style="border: 1px solid white;">
                                                        {{ $jurnal->waktu_mulai }}</td>
                                                    <td class="text-center" style="border: 1px solid white;">
                                                        {{ $jurnal->waktu_selesai }}</td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->materi_yang_diajarkan }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->evaluasi_perkembangan_kbm }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->laporan_perkembangan_siswa }}
                                                    </td>
                                                    <td style="border: 1px solid white;"></td>

                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>



            <h3 class="mb-2">Maret</h3>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div id="minggu1" class="accordion-item bg-gradient-primary my-1 rounded">
                    <h2 class="accordion-header" id="flush-headingOne3">
                        <button class="accordion-button collapsed text-light font-weight-bold" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne3" aria-expanded="false"
                            aria-controls="flush-collapseOne3">
                            Minggu 1
                        </button>
                    </h2>
                    <div id="flush-collapseOne3" class="accordion-collapse collapse" aria-labelledby="flush-headingOne3"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body" style="overflow-x: scroll;">
                            <table style="border: 1px solid white;" class="table">
                                <thead style="border: 1px solid white;">
                                    <tr style="border: 1px solid white; color: white;">
                                        <th style="border: 1px solid white;" class="text-center">Aksi</th>
                                        <th style="border: 1px solid white;" class="text-center">Tanggal</th>
                                        <th style="border: 1px solid white;">Nama Guru</th>
                                        <th class="text-center" style="border: 1px solid white;">Mapel</th>
                                        <th style="border: 1px solid white;" class="text-center">Kelas</th>
                                        <th style="border: 1px solid white;">Kompetensi Keahlian</th>
                                        <th style="border: 1px solid white;">Waktu mulai</th>
                                        <th style="border: 1px solid white;">Waktu selesai</th>
                                        <th style="border: 1px solid white;">Materi yang diajarkan</th>
                                        <th style="border: 1px solid white;">Evaluasi perkembangan KBM</th>
                                        <th style="border: 1px solid white;">Laporan perkembangan siswa</th>
                                        <th style="border: 1px solid white;">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody style="border: 1px solid white;">
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($jurnal_kelas as $jurnal)
                                        @if ($jurnal->minggu_ke == 1)
                                            @if ($jurnal->bulan_apa == 3)
                                                <tr style="border: 1px solid white; color: white;">
                                                    <td style="border: 1px solid white;"><a href="#"
                                                            class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                                                    <td style="border: 1px solid white;" class="text-center">
                                                        {{ date('d-m-Y', strtotime($jurnal->tanggal)) }}</td>
                                                    <td style="border: 1px solid white;">{{ $jurnal->nama_guru }}</td>
                                                    <td style="border: 1px solid white;">{{ $jurnal->mapel }}</td>
                                                    <td style="border: 1px solid white;" class="text-center">
                                                        {{ $jurnal->kelas }}
                                                    </td>
                                                    <td style="border: 1px solid white;">{{ $jurnal->kompetensi_keahlian }}
                                                    </td>
                                                    <td class="text-center" style="border: 1px solid white;">
                                                        {{ $jurnal->waktu_mulai }}</td>
                                                    <td class="text-center" style="border: 1px solid white;">
                                                        {{ $jurnal->waktu_selesai }}</td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->materi_yang_diajarkan }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->evaluasi_perkembangan_kbm }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->laporan_perkembangan_siswa }}
                                                    </td>
                                                    <td style="border: 1px solid white;"></td>

                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="minggu2" class="accordion-item bg-gradient-primary my-1 rounded">
                    <h2 class="accordion-header" id="flush-headingTwo3">
                        <button class="accordion-button collapsed text-light font-weight-bold" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo3" aria-expanded="false"
                            aria-controls="flush-collapseTwo3">
                            Minggu 2
                        </button>
                    </h2>
                    <div id="flush-collapseTwo3" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo3"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body" style="overflow-x: scroll;">
                            <table style="border: 1px solid white;" class="table">
                                <thead style="border: 1px solid white;">
                                    <tr style="border: 1px solid white; color: white;">
                                        <th class="text-center" style="border: 1px solid white;">Aksi</th>
                                        <th style="border: 1px solid white;" class="text-center">Tanggal</th>
                                        <th style="border: 1px solid white;">Nama Guru</th>
                                        <th class="text-center" style="border: 1px solid white;">Mapel</th>
                                        <th style="border: 1px solid white;" class="text-center">Kelas</th>
                                        <th style="border: 1px solid white;">Kompetensi Keahlian</th>
                                        <th style="border: 1px solid white;">Waktu mulai</th>
                                        <th style="border: 1px solid white;">Waktu selesai</th>
                                        <th style="border: 1px solid white;">Materi yang diajarkan</th>
                                        <th style="border: 1px solid white;">Evaluasi perkembangan KBM</th>
                                        <th style="border: 1px solid white;">Laporan perkembangan siswa</th>
                                        <th style="border: 1px solid white;">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody style="border: 1px solid white;">
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($jurnal_kelas as $jurnal)
                                        @if ($jurnal->minggu_ke == 2)
                                            @if ($jurnal->bulan_apa == 3)
                                                <tr style="border: 1px solid white; color: white;">
                                                    <td style="border: 1px solid white;"><a href="#"
                                                            class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                                                    <td style="border: 1px solid white;" class="text-center">
                                                        {{ date('d-m-Y', strtotime($jurnal->tanggal)) }}</td>
                                                    <td style="border: 1px solid white;">{{ $jurnal->nama_guru }}</td>
                                                    <td style="border: 1px solid white;">{{ $jurnal->mapel }}</td>
                                                    <td style="border: 1px solid white;" class="text-center">
                                                        {{ $jurnal->kelas }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->kompetensi_keahlian }}
                                                    </td>
                                                    <td class="text-center" style="border: 1px solid white;">
                                                        {{ $jurnal->waktu_mulai }}</td>
                                                    <td class="text-center" style="border: 1px solid white;">
                                                        {{ $jurnal->waktu_selesai }}</td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->materi_yang_diajarkan }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->evaluasi_perkembangan_kbm }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->laporan_perkembangan_siswa }}
                                                    </td>
                                                    <td style="border: 1px solid white;"></td>

                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="minggu3" class="accordion-item bg-gradient-primary my-1 rounded">
                    <h2 class="accordion-header" id="flush-headingThree3">
                        <button class="accordion-button collapsed text-light font-weight-bold" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseThree3" aria-expanded="false"
                            aria-controls="flush-collapseThree3">
                            Minggu 3
                        </button>
                    </h2>
                    <div id="flush-collapseThree3" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree3" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body" style="overflow-x: scroll;">
                            <table style="border: 1px solid white;" class="table">
                                <thead style="border: 1px solid white;">
                                    <tr style="border: 1px solid white; color: white;">
                                        <th class="text-center" style="border: 1px solid white;">Aksi</th>
                                        <th style="border: 1px solid white;" class="text-center">No</th>
                                        <th style="border: 1px solid white;" class="text-center">Tanggal</th>
                                        <th style="border: 1px solid white;">Nama Guru</th>
                                        <th class="text-center" style="border: 1px solid white;">Mapel</th>
                                        <th style="border: 1px solid white;" class="text-center">Kelas</th>
                                        <th style="border: 1px solid white;">Kompetensi Keahlian</th>
                                        <th style="border: 1px solid white;">Waktu mulai</th>
                                        <th style="border: 1px solid white;">Waktu selesai</th>
                                        <th style="border: 1px solid white;">Materi yang diajarkan</th>
                                        <th style="border: 1px solid white;">Evaluasi perkembangan KBM</th>
                                        <th style="border: 1px solid white;">Laporan perkembangan siswa</th>
                                        <th style="border: 1px solid white;">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody style="border: 1px solid white;">
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($jurnal_kelas as $jurnal)
                                        @if ($jurnal->minggu_ke == 3)
                                            @if ($jurnal->bulan_apa == 3)
                                                <tr style="border: 1px solid white; color: white;">
                                                    <td style="border: 1px solid white;"><a href="#"
                                                            class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                                                    <td style="border: 1px solid white;" class="text-center">
                                                        {{ date('d-m-Y', strtotime($jurnal->tanggal)) }}</td>
                                                    <td style="border: 1px solid white;">{{ $jurnal->nama_guru }}</td>
                                                    <td style="border: 1px solid white;">{{ $jurnal->mapel }}</td>
                                                    <td style="border: 1px solid white;" class="text-center">
                                                        {{ $jurnal->kelas }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->kompetensi_keahlian }}
                                                    </td>
                                                    <td class="text-center" style="border: 1px solid white;">
                                                        {{ $jurnal->waktu_mulai }}</td>
                                                    <td class="text-center" style="border: 1px solid white;">
                                                        {{ $jurnal->waktu_selesai }}</td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->materi_yang_diajarkan }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->evaluasi_perkembangan_kbm }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->laporan_perkembangan_siswa }}
                                                    </td>
                                                    <td style="border: 1px solid white;"></td>

                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="minggu4" class="accordion-item bg-gradient-primary my-1 rounded">
                    <h2 class="accordion-header" id="flush-headingFour3">
                        <button class="accordion-button collapsed text-light font-weight-bold" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseFour3" aria-expanded="false"
                            aria-controls="flush-collapseFour3">
                            Minggu 4
                        </button>
                    </h2>
                    <div id="flush-collapseFour3" class="accordion-collapse collapse" aria-labelledby="flush-headingFour3"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body" style="overflow-x: scroll;">
                            <table style="border: 1px solid white;" class="table">
                                <thead style="border: 1px solid white;">
                                    <tr style="border: 1px solid white; color: white;">
                                        <th style="border: 1px solid white;" class="text-center">Aksi</th>
                                        <th style="border: 1px solid white;" class="text-center">Tanggal</th>
                                        <th style="border: 1px solid white;">Nama Guru</th>
                                        <th class="text-center" style="border: 1px solid white;">Mapel</th>
                                        <th style="border: 1px solid white;" class="text-center">Kelas</th>
                                        <th style="border: 1px solid white;">Kompetensi Keahlian</th>
                                        <th style="border: 1px solid white;">Waktu mulai</th>
                                        <th style="border: 1px solid white;">Waktu selesai</th>
                                        <th style="border: 1px solid white;">Materi yang diajarkan</th>
                                        <th style="border: 1px solid white;">Evaluasi perkembangan KBM</th>
                                        <th style="border: 1px solid white;">Laporan perkembangan siswa</th>
                                        <th style="border: 1px solid white;">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody style="border: 1px solid white;">
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($jurnal_kelas as $jurnal)
                                        @if ($jurnal->minggu_ke == 4)
                                            @if ($jurnal->bulan_apa == 3)
                                                <tr style="border: 1px solid white; color: white;">
                                                    <td style="border: 1px solid white;"><a href="#"
                                                            class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                                                    <td style="border: 1px solid white;" class="text-center">
                                                        {{ date('d-m-Y', strtotime($jurnal->tanggal)) }}</td>
                                                    <td style="border: 1px solid white;">{{ $jurnal->nama_guru }}</td>
                                                    <td style="border: 1px solid white;">{{ $jurnal->mapel }}</td>
                                                    <td style="border: 1px solid white;" class="text-center">
                                                        {{ $jurnal->kelas }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->kompetensi_keahlian }}
                                                    </td>
                                                    <td class="text-center" style="border: 1px solid white;">
                                                        {{ $jurnal->waktu_mulai }}</td>
                                                    <td class="text-center" style="border: 1px solid white;">
                                                        {{ $jurnal->waktu_selesai }}</td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->materi_yang_diajarkan }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->evaluasi_perkembangan_kbm }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->laporan_perkembangan_siswa }}
                                                    </td>
                                                    <td style="border: 1px solid white;"></td>

                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="minggu5" class="accordion-item bg-gradient-primary my-1 rounded">
                    <h2 class="accordion-header" id="flush-headingFive3">
                        <button class="accordion-button collapsed text-light font-weight-bold" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseFive3" aria-expanded="false"
                            aria-controls="flush-collapseFive3">
                            Minggu 5
                        </button>
                    </h2>
                    <div id="flush-collapseFive3" class="accordion-collapse collapse" aria-labelledby="flush-headingFive3"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body" style="overflow-x: scroll;">
                            <table style="border: 1px solid white;" class="table">
                                <thead style="border: 1px solid white;">
                                    <tr style="border: 1px solid white; color: white;">
                                        <th style="border: 1px solid white;" class="text-center">Aksi</th>
                                        <th style="border: 1px solid white;" class="text-center">Tanggal</th>
                                        <th style="border: 1px solid white;">Nama Guru</th>
                                        <th class="text-center" style="border: 1px solid white;">Mapel</th>
                                        <th style="border: 1px solid white;" class="text-center">Kelas</th>
                                        <th style="border: 1px solid white;">Kompetensi Keahlian</th>
                                        <th style="border: 1px solid white;">Waktu mulai</th>
                                        <th style="border: 1px solid white;">Waktu selesai</th>
                                        <th style="border: 1px solid white;">Materi yang diajarkan</th>
                                        <th style="border: 1px solid white;">Evaluasi perkembangan KBM</th>
                                        <th style="border: 1px solid white;">Laporan perkembangan siswa</th>
                                        <th style="border: 1px solid white;">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody style="border: 1px solid white;">
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($jurnal_kelas as $jurnal)
                                        @if ($jurnal->minggu_ke == 5)
                                            @if ($jurnal->bulan_apa == 3)
                                                <tr style="border: 1px solid white; color: white;">
                                                    <td style="border: 1px solid white;"><a href="#"
                                                            class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                                                    <td style="border: 1px solid white;" class="text-center">
                                                        {{ date('d-m-Y', strtotime($jurnal->tanggal)) }}</td>
                                                    <td style="border: 1px solid white;">{{ $jurnal->nama_guru }}</td>
                                                    <td style="border: 1px solid white;">{{ $jurnal->mapel }}</td>
                                                    <td style="border: 1px solid white;" class="text-center">
                                                        {{ $jurnal->kelas }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->kompetensi_keahlian }}
                                                    </td>
                                                    <td class="text-center" style="border: 1px solid white;">
                                                        {{ $jurnal->waktu_mulai }}</td>
                                                    <td class="text-center" style="border: 1px solid white;">
                                                        {{ $jurnal->waktu_selesai }}</td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->materi_yang_diajarkan }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->evaluasi_perkembangan_kbm }}
                                                    </td>
                                                    <td style="border: 1px solid white;">
                                                        {{ $jurnal->laporan_perkembangan_siswa }}
                                                    </td>
                                                    <td style="border: 1px solid white;"></td>

                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
    <script src="{{ asset('jquery/jquery-3.6.3.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            let jurnals = "{{ $jurnal_kelas }}";
            jurnals = JSON.parse(jurnals.replace(/&quot;/g, '"'));


            for (let lol in jurnals) {
                console.log(jurnals[lol].bulan_apa);
            }

            let mingguKeAvailable = {
                isMingguKeSatuAvailable: false,
                isMingguKeDuaAvailable: false,
                isMingguKeTigaAvailable: false,
                isMingguKeEmpatAvailable: false,
                isMingguKeLimaAvailable: false
            }

            for (let index in jurnals) {
                if (jurnals[index].minggu_ke === 1) {
                    mingguKeAvailable.isMingguKeSatuAvailable = true
                } else if (jurnals[index].minggu_ke === 2) {
                    mingguKeAvailable.isMingguKeDuaAvailable = true
                } else if (jurnals[index].minggu_ke === 3) {
                    mingguKeAvailable.isMingguKeTigaAvailable = true
                } else if (jurnals[index].minggu_ke === 4) {
                    mingguKeAvailable.isMingguKeEmpatAvailable = true
                } else if (jurnals[index].minggu_ke === 5) {
                    mingguKeAvailable.isMingguKeLimaAvailable = true
                }
            }

            if (!mingguKeAvailable.isMingguKeSatuAvailable) {
                $('#minggu1').addClass('d-none');
            }
            if (!mingguKeAvailable.isMingguKeDuaAvailable) {
                $('#minggu2').addClass('d-none');
            }
            if (!mingguKeAvailable.isMingguKeTigaAvailable) {
                $('#minggu3').addClass('d-none');
            }
            if (!mingguKeAvailable.isMingguKeEmpatAvailable) {
                $('#minggu4').addClass('d-none');
            }
            if (!mingguKeAvailable.isMingguKeLimaAvailable) {
                $('#minggu5').addClass('d-none');
            }
        })
    </script>
