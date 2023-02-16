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
                kelas {{ $kelas -> kelas }} {{ $kelas -> jurusan }}
            </h3>
        </div>
        <select id="dropdown_nama_guru" class="mb-3 rounded" multiple name="native-select" placeholder="Pilih guru"
            data-search="true">
            @foreach($nama_guru as $guruu)
            <option value="{{$guruu -> name}}">{{$guruu -> name}}</option>
            @endforeach
        </select>
        <div id="wrapper-div">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="fit">No</th>
                        <th>Nama</th>
                        <th class="fit">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach($guru as $gurus)
                    <tr>
                        <th class="fit text-center">{{ $i++ }}</th>
                        <td>{{$gurus}}</td>
                        <td class="fit"><a href="#" class="btn btn-primary"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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

});
$('#dropdown_nama_guru').change(function() {
    let id_kelas = "{{ $kelas -> id }}";
    $.ajax({
        type: "GET",
        url: "{{ url('update-guru-pengampu') }}/" + id_kelas,
        data: {
            result: $('#dropdown_nama_guru').val()
        },
        success: function(data) {
            console.log('berhasil');
        },
        error: function(err) {
            console.log(err.responseText);
        }
    });
});
</script>
@endsection