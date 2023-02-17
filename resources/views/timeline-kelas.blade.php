@extends('layouts.user_type.auth')

@section('content')
    <div class="row">
        <div class="col mx-3">
            <div class="row">
                <div class="col">
                    <a href="{{ url('export-pdf', $kelas->id) }}" class="btn bg-gradient-primary">Export PDF</a>
                </div>
            </div>
            <h2 class="mb-3"><i class="fa fa-arrow-left me-3 cursor-pointer" onClick="history.back()"></i> Timeline kelas
                {{ $kelas->kelas }} {{ $kelas->jurusan }}
            </h2>
            @foreach ($jurnal_kelas->groupBy(function ($item) {
            return Carbon\Carbon::parse($item->tanggal)->format('F');
        }) as $month => $groupedItems)
                <div class="accordion bg-gradient-primary rounded my-2" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <div class="row">
                                <div class="col d-flex">
                                    <button class="accordion-button text-light font-weight-bold my-auto" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        {{ $month }}
                                    </button>
                                </div>
                                <div class="col ">
                                    <a href="" class="btn btn-warning btn-sm float-end m-3">Export PDF</a>
                                </div>
                            </div>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse show collapse border-top"
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-light">
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
                                        @foreach ($groupedItems as $jurnal)
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
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
