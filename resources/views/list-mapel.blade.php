@extends('layouts.user_type.auth')

@section('content')

    <head>
        <style>
            .table th.fit,
            .table td.fit {
                white-space: nowrap;
                width: 1%;
            }
        </style>
    </head>
    <h2 class="mx-3">List mapel di SMK BN</h2>
    <!-- <a href="#" class="btn btn-primary mx-3 mt-3">Tambah mapel</a> -->
    <div class="form-group mx-3 mt-3">
        <input class="form-control" type="search" name="cari_mapel" id="cari_mapel" placeholder="Cari mapel disini..">
    </div>
    <div class="mx-3">
        <div class="card">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 fit text-center">#</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mapel</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Guru Pengampu</th>
                        </tr>
                    </thead>
                    <tbody id="result_target">
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($mapel as $mapels)
                        <tr>
                            <td class="text-center">
                                <span>{{ $i++ }}</span>
                            </td>
                            <td>{{ $mapels->mapel }}</td>
                            <td>{{ $mapels->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="{{ asset('jquery/jquery-3.6.3.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#cari_mapel').on('keyup', function() {
                $.ajax({
                    type: "GET",
                    url: "{{ url('list-mapel') }}",
                    data: {
                        result: $(this).val(),
                        search: true
                    },
                    dataType: "JSON",
                    success: function(data) {
                        let no = 1;
                        let result = data.map(function(e) {
                            return `
                                <tr>
                                    <td class="fit text-center">${no++}</td>
                                    <td>${e['mapel']}</td>
                                    <td>${e['name']}</td>
                                </tr>

                        `;
                        });
                        $('#result_target').html(result);
                    },
                    error: function(err) {
                        console.log(err.responseText);
                    }
                });
            });
        });
    </script>
@endsection
