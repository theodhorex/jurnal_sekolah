@extends('layouts.user_type.auth')

@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('virtual-select/virtual-select.min.css') }}">

        <style>
            .table th.fit,
            .table td.fit {
                white-space: nowrap;
                width: 1%;
            }
        </style>
    </head>
    <div class="row">
        <div class="col">
            <div class="row">
                <h3 class="mb-4"><a class="me-3" onClick="history.back()"><i
                            class="fa fa-arrow-left cursor-pointer"></i></a> Guru
                    pengampu untuk
                    kelas {{ $kelas->kelas }} {{ $kelas->jurusan }}
                </h3>
            </div>
            <select id="dropdown_nama_guru" class="mb-3 rounded" multiple name="native-select" placeholder="Pilih guru"
                data-search="true">
                @foreach ($nama_guru as $guruu)
                    <option value="{{ $guruu->name }}" @if (Str::contains($kelas->guru_pengampu, $guruu->name)) selected @endif>
                        {{ $guruu->name }}</option>
                @endforeach
            </select>
            <div id="wrapper-div" class="wrapper-list-guru-pengampu">
                
            </div>
        </div>
    </div>


    <script src="{{ asset('jquery/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('virtual-select/virtual-select.min.js') }}"></script>
    <script>
        VirtualSelect.init({
            ele: 'select'
        });
    </script>
    <script>
        $(document).ready(function() {
            listGuruPengampu();
        });
        $('#dropdown_nama_guru').change(function() {
            let id_kelas = "{{ $kelas->id }}";
            $.ajax({
                type: "GET",
                url: "{{ url('update-guru-pengampu') }}/" + id_kelas,
                data: {
                    result: $('#dropdown_nama_guru').val()
                },
                success: function(data) {
                    console.log('berhasil');
                    listGuruPengampu();
                },
                error: function(err) {
                    console.log(err.responseText);
                }
            });
        });

        function listGuruPengampu() {
            $.get("{{ url('list-guru-pengampu') }}/" + "{{ $kelas->id }}", {}, function(data, status) {
                $(".wrapper-list-guru-pengampu").html(data);
            });
        }
    </script>
@endsection
