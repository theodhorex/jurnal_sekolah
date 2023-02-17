<head>
    <style>
        .table th.fit,
        .table td.fit {
            white-space: nowrap;
            width: 1%;
        }
    </style>
</head>
<div id="detail-kelas-container" class="px-3">
    <div class="row">
        @if (Auth::user()->role != 'admin')
            <div class="col">
                <h4 class="mb-0">{{ $kelas->kelas }} {{ $kelas->jurusan }} - <b>{{ $kelas->angkatan }}</b></h4>
            </div>
        @else
            <div class="col-6">
                <h4 class="mb-0">{{ $kelas->kelas }} {{ $kelas->jurusan }} - <b>{{ $kelas->angkatan }}</b></h4>
            </div>
            <div class="col-6">
                <a onClick="editDetailKelas()" class="float-end" data-bs-toggle="tooltip"
                    data-bs-original-title="Edit user">
                    <i class="fas fa-edit text-secondary"></i>
                </a>
            </div>
        @endif
    </div>
    <span class="mb-1">Tahun ajaran : {{ $kelas->tahun_ajaran }}</span>
    <br>
    <span>Jumlah siswa/i : <b>{{ $kelas->jumlah_siswa }}</b></span>
    @if (Auth::user()->role == 'admin')
        <div class="row mt-4 mb-2">
            <div class="col-6">
                <h5>Guru pengampu</h5>
            </div>
            <div class="col-6">
                <a href="edit-guru-pengampu/{{ $kelas->id }}" class="float-end text-decoration-underline">Lihat
                    semua</a>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="fit">No</th>
                    <th class="text-start">Nama</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($guru as $guruu)
                    <tr>
                        <td class="fit text-center">{{ $i++ }}</td>
                        <td>{{ $guruu }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <hr>
    <div class="row">
        <div class="col-6">
            <h5>Timeline kelas</h5>
        </div>
        <div class="col-6">
            <a href="{{ url('timeline-kelas', $kelas->id) }}"
                class="text-secondary text-decoration-underline float-end">Lihat
                timeline</a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th class="fit">Mapel</th>
                <th class="fit text-center">Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach($timeline_kelas as $jurnal)
            <tr>
                <td class="px-4">{{ $jurnal -> nama_guru }}</td>
                <td class="fit text-center">{{ $jurnal -> mapel }}</td>
                <td class="fit text-center">{{ $jurnal -> created_at -> diffForHumans() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="form-jurnal/{{ $kelas->id }}" class="btn btn-primary">+ Tambah jurnal</a>
</div>

<script>
    function editDetailKelas() {
        $('#detail-kelas-container').html(`
        <div class="form-group mb-2">
            <label class="form-label">Kelas</label>
            <input id="kelas" name="kelas" type="text" value="{{ $kelas->kelas }}" class="form-control mb-2">
        </div>
        <div class="form-group mb-2">
            <label class="form-label">Jurusan</label>
            <input id="jurusan" name="jurusan" type="text" value="{{ $kelas->jurusan }}" class="form-control mb-2">
        </div>
        <div class="form-group mb-2">
            <label class="form-label">Tahun ajaran</label>
            <input id="tahun_ajaran" name="tahun_ajaran" type="text" value="{{ $kelas->tahun_ajaran }}" class="form-control mb-2">
        </div>
        <div class="form-group mb-2">
            <label class="form-label">Jumlah siswa</label>
            <input id="jumlah_siswa" name="jumlah_siswa" type="number" value="{{ $kelas->jumlah_siswa }}" class="form-control mb-2">
        </div>
    `);

        $('#modal-footer-detail-kelas').append('<button type="button" class="btn btn-primary">Simpan</button>');
    }

    function updateDetailKelas(id) {

    }
</script>
