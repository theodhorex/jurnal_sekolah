    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="fit">No</th>
                <th>Nama</th>
                {{-- <th class="fit">Aksi</th> --}}
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($guru as $gurus)
                <tr>
                    <th class="fit text-center">{{ $i++ }}</th>
                    <td>{{ $gurus }}</td>
                    {{-- <td class="fit"><a href="#" class="btn btn-primary"><i class="fa fa-trash"></i></a>
                                </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
