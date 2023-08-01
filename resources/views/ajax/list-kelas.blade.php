@if ($kelas->count() < 1)
    <h4 class="fw-semibold my-0 py-0 mb-4">Belum ada kelas untuk {{ Auth::user()->name }}</h4>
@else
    @foreach ($kelas as $kelass)
        <div class="col-lg-3 mb-lg-0 mb-1">
            <div class="card mb-4" onClick="detailKelas({{ $kelass->id }})">
                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                    <div class="row">
                        <div class="col-6">
                            <a href="javascript:;" class="d-block ms-2 font-weight-bold">
                                {{ $kelass->kelas }} {{ $kelass->jurusan }}</a>
                            <a href="#" class="text-decoration-none ms-2">{{ $kelass->tahun_ajaran }}</a>
                        </div>
                        <div class="col-6">
                            <img src="@if(str_contains($kelass->jurusan, 'PPLG')){{ asset('assets/img/logo-kelas/Group 4.png') }}@elseif(str_contains($kelass->jurusan, 'DKV')){{ asset('assets/img/logo-kelas/Group 5.png') }}@elseif(str_contains($kelass->jurusan, 'TP')){{ asset('assets/img/logo-kelas/Group 8.png') }}@elseif(str_contains($kelass->jurusan, 'KULINER')){{ asset('assets/img/logo-kelas/Group 6.png') }}@elseif(str_contains($kelass->jurusan, 'TKP')){{ asset('assets/img/logo-kelas/Group 7.png') }} @endif"
                                alt="..." class="avatar shadow float-end">
                        </div>
                    </div>
                </div>

                <div class="card-body pt-2">
                    <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Jumlah
                        murid:
                        <b>{{ $kelass->jumlah_siswa }}</b></span>

                </div>
            </div>
        </div>
    @endforeach
@endif
