@extends('layouts.user_type.auth')
@php
    $lol = Auth::user()->mapel;
    $mapel = explode(',', $lol);
@endphp

@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('virtual-select/virtual-select.min.css') }}">
    </head>
    <h2 class="mx-3"><i class="fa fa-arrow-left cursor-pointer me-3 mb-4" onClick="history.back()"></i> Jurnal untuk kelas
        {{ $jurnal->kelas }} {{ $jurnal->kompetensi_keahlian }}</h2>
    <form action="{{ url('edit-timeline-send', $jurnal->id) }}" method="post">
        @csrf
        <div class="mx-3">
            <div class="row">
                <div class="col">
                    <div class="form-group mb-3">
                        <label for="waktu_mulai" class="form-label">Waktu mulai</label>
                        <input type="time" name="waktu_mulai" id="waktu_mulai" class="form-control"
                            value="{{ $jurnal->waktu_mulai }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mb-3">
                        <label for="waktu_selesai" class="form-label">Waktu selesai</label>
                        <input type="time" name="waktu_selesai" id="waktu_selesai" class="form-control"
                            value="{{ $jurnal->waktu_selesai }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group mb-3">
                        <label for="dropdown_mapel" class="form-label">Pilih mapel</label>
                        <br>
                        <select id="dropdown_mapel" class="rounded" multiple name="native-select"
                            placeholder="{{ $jurnal -> mapel }}" data-search="true">
                            @foreach ($mapel as $map)
                                <option value="{{$map}}">{{ $map }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" id="mapel" name="mapel" value="{{$jurnal->mapel}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mb-3">
                        <label for="materi_yang_diajarkan" class="form-label">Materi yang diajarkan</label>
                        <input type="text" name="materi_yang_diajarkan" id="mater_yang_diajarkan" class="form-control" value="{{ $jurnal -> materi_yang_diajarkan }}">
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="evaluasi_perkembangan_kbm" class="form-label">Evaluasi perkembangan KBM</label>
                <textarea name="evaluasi_perkembangan_kbm" id="evaluasi_perkembangan_kbm" cols="30" rows="10"
                    class="form-control">{{ $jurnal -> evaluasi_perkembangan_kbm }}</textarea>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Pilih siswa</label>
                <br>
                <select id="dropdown_nama_siswa" class="rounded" multiple name="native-select"
                    placeholder="Pilih nama siswa" data-search="true">
                    <option value="">{{ $jurnal -> nama_siswa_yang_bersangkutan }}</option>
                </select>
            </div>
            <input type="hidden" id="nama_siswa_yang_bersangkutan" name="nama_siswa_yang_bersangkutan">
            <div class="form-group mb-3">
                <label for="laporan_perkembangan_siswa" class="form-label">Laporan perkembangan siswa/i</label>
                <textarea name="laporan_perkembangan_siswa" id="laporan_perkembangan_siswa" cols="30" rows="10"
                    class="form-control">{{ $jurnal -> laporan_perkembangan_siswa }}</textarea>
            </div>
            <div class="row">
                <div class="col">
                    <input type="submit" class="btn bg-gradient-primary float-end">
                </div>
            </div>
        </div>
    </form>



    <script src="{{ asset('jquery/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('virtual-select/virtual-select.min.js') }}"></script>
    <script>
        VirtualSelect.init({
            ele: 'select'
        });
    </script>
    <script>
        $('#dropdown_nama_siswa').change(function() {
            $('#nama_siswa_yang_bersangkutan').val($(this).val());
            console.log($('#nama_siswa_yang_bersangkutan').val());
        });

        $('#dropdown_mapel').change(function() {
            $('#mapel').val($(this).val());
            console.log($('#mapel').val());
        });
    </script>
@endsection
