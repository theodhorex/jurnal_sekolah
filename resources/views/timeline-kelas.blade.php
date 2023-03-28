@extends('layouts.user_type.auth')

@section('content')
    <div class="row">
        <div class="col mx-3">
            <div class="row">
                <div class="col">
                    {{-- <a href="{{ url('export-pdf', $kelas->id) }}" class="btn bg-gradient-primary">Export PDF</a> --}}
                    {{-- <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn bg-gradient-primary">Export PDF</a> --}}
                    {{-- @if (Str::contains($kelas->guru_pengampu, Auth::user()->name)) --}}
                    <a href="{{ url('export-pdf', $kelas->id) }}" class="btn bg-gradient-primary">Export PDF</a>
                    {{-- @endif --}}
                </div>
            </div>
            <div class="row">
                @if (session('success'))
                    <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                        <span class="alert-text text-white">
                            {{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                    </div>
                @endif
            </div>
            <h2 class="mb-3"><i class="fa fa-arrow-left me-3 cursor-pointer" onClick="history.back()"></i> Timeline kelas
                {{ $kelas->kelas }} {{ $kelas->jurusan }}
            </h2>
            @foreach ($jurnal_kelas->groupBy(function ($item) {
            return Carbon\Carbon::parse($item->tanggal_pengajaran)->isoFormat('MMMM');
        }) as $month => $groupedItems)
                <div class="accordion bg-gradient-primary rounded my-2" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <div class="row">
                                <div class="col d-flex">
                                    <button class="accordion-button text-light font-weight-bold my-auto" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#{{ $month }}" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        {{ $month }}
                                    </button>
                                </div>
                            </div>
                        </h2>
                        <div style="width: 100%; overflow-x: scroll;" id="{{ $month }}"
                            class="accordion-collapse collapse border-top" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
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
                                            <th style="border: 1px solid white;">Siswa yang bersangkutan</th>
                                            <th style="border: 1px solid white;">Laporan perkembangan siswa</th>
                                            <th style="border: 1px solid white;">Lampiran</th>
                                        </tr>
                                    </thead>
                                    <tbody style="border: 1px solid white;">
                                        @foreach ($groupedItems as $jurnal)
                                            <tr style="border: 1px solid white; color: white;">
                                                <td style="border: 1px solid white;">
                                                    @if ($jurnal->nama_guru == Auth::user()->name)
                                                        <a href="{{ url('edit-timeline', $jurnal->id) }}"
                                                            class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                        <br>
                                                        <a class="btn btn-primary" id="button_hapus_timeline"
                                                            onClick="hapusTimeline({{ $jurnal->id }})">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td style="border: 1px solid white;" class="text-center">
                                                    {{ date('d-m-Y', strtotime($jurnal->tanggal_pengajaran)) }}</td>
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
                                                    {{ $jurnal->nama_siswa_yang_bersangkutan }}
                                                </td>
                                                <td style="border: 1px solid white;">
                                                    {{ $jurnal->laporan_perkembangan_siswa }}
                                                </td>
                                                <td style="border: 1px solid white;">
                                                    @php
                                                        $link = explode(',', $jurnal->lampiran);
                                                    @endphp
                                                    <ul class="text-center mx-auto">
                                                        @foreach ($link as $l)
                                                            <li style="list-style: none;"><a href="{{ $l }}"
                                                                    target="blank"
                                                                    class="text-light">{{ $l }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </td>
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

        {{-- Modal --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Export timeline kelas</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <a href="{{ url('export-pdf', $kelas->id) }}" class="btn bg-gradient-primary">Export Semua</a>
                        <a href="{{ url('export-pdf-mandiri', $kelas->id) }}" class="btn bg-gradient-primary">Export
                            Mandiri</a>
                        {{-- <a href="#" class="btn bg-gradient-primary">Export Harian</a> --}}
                    </div>
                </div>
            </div>
        </div>
    @endsection
    <script src="{{ asset('jquery/jquery-3.6.3.min.js') }}"></script>
    <script>
        function hapusTimeline(id) {
            Swal.fire({
                title: 'Anda yakin ingin menghapus timeline ini?',
                text: "Timeline akan dihapus dari database!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ url('hapus-timeline') }}/" + id;
                    Swal.fire(
                        'Berhasil dihapus!',
                        'Timeline berhasil dihapus!.',
                        'success'
                    )
                }
            })
        }
    </script>
