@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="row mb-3 mx-4">
                    <div class="col-md-3">
                        <label for="filter_role" class="form-label">Role</label>
                        <select name="filter_role" id="filter_role" class="form-control">
                            <option value="" selected="true" disabled="disabled">-- Pilih Role --
                            </option>
                            <option value="guru">Guru</option>
                            <option value="visitor">Visitor</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="cari_nama" class="form-label">Nama</label>
                        <input type="text" name="cari_nama" id="cari_nama" class="form-control"
                            placeholder="Cari nama pengguna">
                    </div>
                </div>
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">List semua akun</h5>
                            </div>
                            <a class="btn bg-gradient-primary btn-sm mb-0" type="button" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">+&nbsp; Akun Baru</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Foto
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            role
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Dibuat
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="target_result">
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($get_user as $user)
                                        <tr id="tabel_user">
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $i++ }}</p>
                                            </td>
                                            <td>
                                                <div>
                                                    <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0 text-capitalize">{{ $user->name }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $user->role }}</p>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $user->created_at->diffForHumans() }}</span>
                                            </td>
                                            <td class="text-center">
                                                <a onClick="editAkun({{ $user->id }})" class="mx-3"
                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                </a>
                                                <span onClick="hapusAkun({{ $user->id }})">
                                                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>









    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Akun</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="nama_akun" class="form-label">Nama</label>
                        <input type="text" id="nama_akun" name="nama_akun" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="mapel" class="form-label">Mata Pelajaran</label>
                                <input type="text" id="mapel" name="mapel" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" id="role" name="role" class="form-control">
                                    <option value="" selected="true" disabled="disabled">-- Pilih Role --
                                    </option>
                                    <option value="visitor">Visitor</option>
                                    <option value="guru">Guru</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" id="password" name="password" class="form-control">
                        <div class="form-text">
                            Kata sandi harus memiliki panjang 8-20 karakter, yang mengandung angka dan huruf, dan tidak
                            mengandung spasi, karakter spesial, dan emoji.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" onClick="tambahAkun()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div id="imported-page"></div>
        </div>
    </div>

    <!--  Jquery  -->
    <script src="{{ asset('jquery/jquery-3.6.3.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#filter_role').change(function() {
                $.ajax({
                    type: "GET",
                    url: '{{ url('user-management') }}',
                    data: {
                        role_result: $(this).val(),
                        status: true
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        let number = 1;
                        let resultss = data.map(function(e) {
                            return `
                                        <tr id="tabel_user">
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">${number++}</p>
                                            </td>
                                            <td>
                                                <div>
                                                    <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0 text-capitalize">${e['name']}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">${e['email']}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">${e['role']}</p>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">${e['created_at']}</span>
                                            </td>
                                            <td class="text-center">
                                                <a onClick="editAkun(${e['id']})" class="mx-3"
                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                </a>
                                                <span onClick="hapusAkun(${e['id']})">
                                                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                </span>
                                            </td>
                                        </tr>
                            `;
                        });
                        $('#target_result').html(resultss);
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });

            $('#cari_nama').keyup(function() {
                $.ajax({
                    type: "GET",
                    url: '{{ url('user-management') }}',
                    data: {
                        result: $(this).val(),
                        search: true
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        let number = 1;
                        let results = data.map(function(e) {
                            return `
                                        <tr id="tabel_user">
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">${number++}</p>
                                            </td>
                                            <td>
                                                <div>
                                                    <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0 text-capitalize">${e['name']}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">${e['email']}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">${e['role']}</p>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">${e['created_at']}</span>
                                            </td>
                                            <td class="text-center">
                                                <a onClick="editAkun(${e['id']})" class="mx-3"
                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                </a>
                                                <span onClick="hapusAkun(${e['id']})">
                                                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                </span>
                                            </td>
                                        </tr>
                            `;
                        });
                        $('#target_result').html(results);
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });
        });

        function tambahAkun() {
            $.ajax({
                type: "GET",
                url: "{{ url('tambah-akun') }}",
                data: {
                    nama_akun: $('#nama_akun').val(),
                    email: $('#email').val(),
                    role: $('#role').val(),
                    mapel: $('#mapel').val(),
                    password: $('#password').val()
                },
                success: function(data) {
                    $('.btn-close').click();
                    console.log('berhasil!');
                },
                error: function(err) {
                    console.log(err)
                }
            });
        }

        function editAkun(id) {
            $.get("{{ url('edit-akun') }}/" + id, {}, function(data, status) {
                $("#imported-page").html(data);
                $("#exampleModal2").modal('show');
            });
        }

        function updateAkun(id) {
            $.ajax({
                type: "GET",
                url: "{{ url('update-akun') }}/" + id,
                data: {
                    nama_akun: $('#nama_akuns').val(),
                    email: $('#emails').val(),
                    role: $('#roles').val(),
                },
                success: function(data) {
                    $('.btn-close').click();
                    console.log('berhasil update!');
                },
                error: function(err) {
                    console.log(err)
                }
            });
        }

        function hapusAkun(id) {
            if (confirm('Yakin ingin menghapus akun ini ?') == true) {
                $.ajax({
                    type: "get",
                    url: "{{ url('hapus-akun') }}/" + id,
                    data: {
                        nama_akun: $('#nama_akuns').val(),
                        email: $('#emails').val(),
                        role: $('#roles').val(),
                    },
                    success: function(data) {
                        console.log('Berhasil dihapus!');
                    }
                });
            }
        }
    </script>
@endsection
