@extends('layouts.user_type.auth')

@section('content')
    @if (Auth::user()->role == 'admin')
        <div class="row mx-1">
            <div class="col-6"></div>
            <div class="col-6">
                <a class="btn btn-sm bg-gradient-primary mx-2 btn-sm mb-0 float-end" type="button" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">+&nbsp; Kelas Baru</a>
                <a class="btn btn-sm bg-gradient-primary mx-1 btn-sm mb-0 float-end" type="button" data-bs-toggle="modal"
                    data-bs-target="#exampleModal3">+&nbsp; Import Data Siswa</a>
            </div>
        </div>
    @elseif(Auth::user()->role == 'visitor')
    @else
        <h3 class="ms-3">List kelas untuk {{ Auth::user()->name }}</h3>
    @endif
    <div class="row mt-4 mx-1">
    @if($kelas->count() < 1)
        <h4 class="fw-semibold my-0 py-0 mb-4">Belum ada kelas untuk {{ Auth::user()->name }}</h4>
    @else
        @foreach ($kelas as $kelass)
            <div class="col-lg-3 mb-lg-0 mb-4">
                <div class="card mb-4" onClick="detailKelas({{ $kelass->id }})">
                    <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                        <div class="row">
                            <div class="col-6">
                                <a href="javascript:;" class="d-block ms-2 font-weight-bold">
                                    {{ $kelass->kelas }} {{ $kelass->jurusan }} - <b>{{ $kelass->angkatan }}</b> </a>
                                <a href="#" class="text-decoration-none ms-2">{{ $kelass->tahun_ajaran }}</a>
                            </div>
                            <div class="col-6">
                                <img src="@if ($kelass->jurusan == 'RPL') {{ asset('assets/img/logo-kelas/Group 4.png') }}@elseif($kelass->jurusan == 'PPLG'){{ asset('assets/img/logo-kelas/Group 4.png') }}@elseif($kelass->jurusan == 'MM'){{ asset('assets/img/logo-kelas/Group 5.png') }}@elseif($kelass->jurusan == 'DKV1'){{ asset('assets/img/logo-kelas/Group 5.png') }}@elseif($kelass->jurusan == 'DKV2'){{ asset('assets/img/logo-kelas/Group 5.png') }}@elseif($kelass->jurusan == 'TKRO'){{ asset('assets/img/logo-kelas/Group 8.png') }}@elseif($kelass->jurusan == 'TB'){{ asset('assets/img/logo-kelas/Group 6.png') }}@elseif($kelass->jurusan == 'KULINER'){{ asset('assets/img/logo-kelas/Group 6.png') }}@elseif($kelass->jurusan == 'BKP'){{ asset('assets/img/logo-kelas/Group 7.png') }}@elseif($kelass->jurusan == 'TKP'){{ asset('assets/img/logo-kelas/Group 7.png') }} @endif"
                                    alt="..." class="avatar shadow float-end">
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-2">
                        <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Jumlah murid:
                            <b>{{ $siswa->where('kelas', $kelass->kelas)->where('jurusan', $kelass->jurusan)->count() }}</b></span>

                    </div>
                </div>
            </div>
        @endforeach
        @endif
    </div>


    @php
    use Illuminate\Support\Str;
    @endphp
    @if (Str::contains(Auth::user()->role, 'guru'))
        <h3 class="ms-3">Kelas lainnya</h3>
        <div class="row mt-4 mx-1">
            @foreach ($general_kelas as $kelasss)
                <div class="col-lg-3 mb-lg-0 mb-4">
                    <div class="card mb-4" onClick="detailKelas({{ $kelasss->id }})">
                        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                            <div class="row">
                                <div class="col-6">
                                    <a href="javascript:;" class="d-block ms-2 font-weight-bold">
                                        {{ $kelasss->kelas }} {{ $kelasss->jurusan }} - <b>{{ $kelasss->angkatan }}</b>
                                    </a>
                                    <a href="#" class="text-decoration-none ms-2">{{ $kelasss->tahun_ajaran }}</a>
                                </div>
                                <div class="col-6">
                                    <img src="@if ($kelasss->jurusan == 'RPL') {{ asset('assets/img/logo-kelas/Group 4.png') }}@elseif($kelasss->jurusan == 'PPLG'){{ asset('assets/img/logo-kelas/Group 4.png') }}@elseif($kelasss->jurusan == 'MM'){{ asset('assets/img/logo-kelas/Group 5.png') }}@elseif($kelasss->jurusan == 'DKV1'){{ asset('assets/img/logo-kelas/Group 5.png') }}@elseif($kelasss->jurusan == 'DKV2'){{ asset('assets/img/logo-kelas/Group 5.png') }}@elseif($kelasss->jurusan == 'TKRO'){{ asset('assets/img/logo-kelas/Group 8.png') }}@elseif($kelasss->jurusan == 'TB'){{ asset('assets/img/logo-kelas/Group 6.png') }}@elseif($kelasss->jurusan == 'KULINER'){{ asset('assets/img/logo-kelas/Group 6.png') }}@elseif($kelasss->jurusan == 'BKP'){{ asset('assets/img/logo-kelas/Group 7.png') }}@elseif($kelasss->jurusan == 'TKP'){{ asset('assets/img/logo-kelas/Group 7.png') }} @endif"
                                        alt="..." class="avatar shadow float-end">
                                </div>
                            </div>
                        </div>

                        <div class="card-body pt-2">
                            <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Jumlah
                                murid:
                                <b>{{ $siswa->where('kelas', $kelasss->kelas)->where('jurusan', $kelasss->jurusan)->count() }}</b></span>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Akun</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <input type="text" id="kelas" name="kelas" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-3">
                                <label for="jurusan" class="form-label">Kompetensi Keahlian</label>
                                <input type="text" id="jurusan" name="jurusan" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-3">
                                <label for="jumlah_siswa" class="form-label">Jumlah Siswa</label>
                                <input type="number" name="jumlah_siswa" id="jumlah_siswa" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group mb-3">
                                <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                                <input type="text" name="tahun_ajaran" id="tahun_ajaran" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" onClick="tambahKelasBaru()">Simpan</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel2">Detail Kelas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="imported-page"></div>
                </div>
                <div id="modal-footer-detail-kelas" class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel3">Import Data Siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4">
                    <label for="" style="color: rgba(0, 0, 0, 0.406);">*File excel harus mencakup.</label>
                    <hr>
                    <form action="{{ url('import-data-siswa') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="file" class="form-label">Pilih file data siswa (Excel).</label>
                            <input type="file" name="file" id="file" required class="form-control"
                                accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <script src="{{ asset('jquery/jquery-3.6.3.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            
        });
        function detailKelas(id) {
            $.get("{{ url('detail-kelas') }}/" + id, {}, function(data, status) {
                $("#imported-page").html(data);
                $("#exampleModal2").modal('show');
            });
        }

        function tambahKelasBaru() {
            $.ajax({
                type: 'GET',
                url: '{{ url('tambah-kelas') }}',
                data: {
                    kelas: $('#kelas').val(),
                    kompetensi_keahlian: $('#jurusan').val(),
                    jumlah_siswa: $('#jumlah_siswa').val(),
                    tahun_ajaran: $('#tahun_ajaran').val(),
                    angkatan: $('#angkatan').val(),
                },
                success: function(data) {
                    $('.btn-close').click()
                },
                error: function(err) {
                    console.log(response.text(err));
                }
            });
        }
    </script>
@endsection
