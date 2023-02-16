@extends('layouts.user_type.auth')

@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('virtual-select/virtual-select.min.css') }}">
    </head>
    <h2 class="mx-3"><i class="fa fa-arrow-left cursor-pointer me-3 mb-4" onClick="history.back()"></i> Jurnal untuk kelas
        {{ $kelass->kelas }} {{ $kelass->jurusan }}</h2>
    <form action="{{ url('form-jurnal-send', $kelass->id) }}" method="post">
        @csrf
        <div class="mx-3">
            <div class="row">
                <div class="col">
                    <div class="form-group mb-3">
                        <label for="waktu_mulai" class="form-label">Waktu mulai</label>
                        <input type="time" name="waktu_mulai" id="waktu_mulai" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mb-3">
                        <label for="waktu_selesai" class="form-label">Waktu selesai</label>
                        <input type="time" name="waktu_selesai" id="waktu_selesai" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group mb-3">
                        <label for="materi_yang_diajarkan" class="form-label">Materi yang diajarkan</label>
                        <input type="text" name="materi_yang_diajarkan" id="mater_yang_diajarkan" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="evaluasi_perkembangan_kbm" class="form-label">Evaluasi perkembangan KBM</label>
                <textarea name="evaluasi_perkembangan_kbm" id="evaluasi_perkembangan_kbm" cols="30" rows="10"
                    class="form-control"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Pilih siswa</label>
                <br>
                <select id="dropdown_nama_siswa" class="rounded" multiple name="native-select" placeholder="Pilih nama siswa"
                    data-search="true">
                    @foreach($siswa as $siswaa)
                    <option value="{{ $siswaa -> nama_siswa }}">{{$siswaa -> nama_siswa}}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" id="nama_siswa_yang_bersangkutan" name="nama_siswa_yang_bersangkutan">
            <div class="form-group mb-3">
                <label for="laporan_perkembangan_siswa" class="form-label">Laporan perkembangan siswa/i</label>
                <textarea name="laporan_perkembangan_siswa" id="laporan_perkembangan_siswa" cols="30" rows="10"
                    class="form-control"></textarea>
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
    </script>
@endsection
