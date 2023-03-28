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
                <h4 class="mb-0">{{ $kelas->kelas }} {{ $kelas->jurusan }}</h4>
                <span>Angkatan: <b class="text-capitalize">{{ $kelas->angkatan }}</b></span>
            </div>
        @else
            <div class="col-6">
                <h4 class="mb-0">{{ $kelas->kelas }} {{ $kelas->jurusan }}</h4>
                <span>Angkatan: <b class="text-capitalize">{{ $kelas->angkatan }}</b></span>
            </div>
            <div class="col-6">
                <a onClick="hapusKelas()" class="float-end mx-1">
                    <i class="fas fa-trash text-secondary cursor-pointer"></i>
                </a>
                <a onClick="editDetailKelas()" class="float-end mx-1" data-bs-toggle="tooltip"
                    data-bs-original-title="Edit user">
                    <i class="fas fa-edit text-secondary cursor-pointer"></i>
                </a>
            </div>
        @endif
    </div>
    <span class="mb-1">Tahun ajaran : {{ $kelas->tahun_ajaran }}</span>
    <br>
    <span>Jumlah siswa/i :
        <b>{{ $kelas->jumlah_siswa }}</b></span>
    <br>
    <span>Status: <b class="text-capitalize">{{ $kelas->status }}</b></span>
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
                @foreach ($collection as $guruu)
                    <tr>
                        <td class="fit text-center">{{ $i++ }}</td>
                        <td>{{ $guruu }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <hr>

    @if ($timeline_kelas->count() < 1)
        <h5 class="mb-3">Belum ada timeline kelas.</h5>
    @else
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
        <div class="wrapper" style="overflow-x: scroll;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="fit">Nama</th>
                        <th class="fit text-center">Mapel</th>
                        <th class="fit text-center">Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($timeline_kelas as $jurnal)
                        <tr>
                            <td class="fit px-4">{{ $jurnal->nama_guru }}</td>
                            <td class="fit text-center text-truncate">{{ Str::limit($jurnal->mapel, 20) }}</td>
                            <td class="fit text-center">{{ $jurnal->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if (Auth::user()->role == 'visitor')
    @elseif(Auth::user()->role == 'admin')
    @else
        @if (!str_contains($kelas->guru_pengampu, Auth::user()->name) === false)
            <a href="form-jurnal/{{ $kelas->id }}" class="btn btn-primary">+ Tambah jurnal</a>
        @else
        @endif
    @endif
</div>

<script>
    function editDetailKelas() {
        $('#detail-kelas-container').html(`
        <div class="form-group mb-2">
            <label class="form-label">Kelas</label>
            <input id="kelasss" name="kelas" type="text" value="{{ $kelas->kelas }}" class="form-control mb-2">
        </div>
        <div class="form-group mb-2">
            <label class="form-label">Jurusan</label>
            <input id="jurusanss" name="jurusan" type="text" value="{{ $kelas->jurusan }}" class="form-control mb-2">
        </div>
        <div class="form-group mb-2">
            <label class="form-label">Tahun ajaran</label>
            <input id="tahun_ajaranss" name="tahun_ajaran" type="text" value="{{ $kelas->tahun_ajaran }}" class="form-control mb-2">
        </div>
        <div class="form-group mb-2">
            <label class="form-label">Jumlah siswa</label>
            <input id="jumlah_siswass" name="jumlah_siswa" type="number" value="{{ $kelas->jumlah_siswa }}" class="form-control mb-2">
        </div>
    `);

        $('#modal-footer-detail-kelas').append(
            '<button type="button" onClick="updateDetailKelas({{ $kelas->id }})" class="btn btn-primary">Simpan</button>'
        );
    }

    function updateDetailKelas(id) {
        $.ajax({
            type: "GET",
            url: "{{ url('update-kelas', $kelas->id) }}",
            data: {
                kelas: $('#kelasss').val(),
                jurusan: $('#jurusanss').val(),
                tahun_ajaran: $('#tahun_ajaranss').val(),
                jumlah_siswa: $('#jumlah_siswass').val()
            },
            success: function(data) {
                $('#button_close_detail_kelas').click();
                listKelas();
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    function hapusKelas() {
        Swal.fire({
            title: 'Yakin ingin menghapus kelas ini?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#cb0c9f',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('hapus-kelas', $kelas->id) }}",
                    data: {
                        target_id: 'test'
                    },
                    success: function(data) {
                        $('#button_close_detail_kelas').click();
                        listKelas();
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }
        })
    }
</script>
