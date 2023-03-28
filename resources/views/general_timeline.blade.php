@extends('layouts.user_type.auth')

@section('content')

    <div class="card h-100">
        <div class="card-header pb-0">
            @php
                use Carbon\Carbon;
            @endphp
            <form action="" method="GET">
                @csrf
                <div class="row mx-1" mb-5>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="" class="form-label">Dari</label>
                            <input type="date" name="from" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="" class="form-label">Sampai</label>
                            <input type="date" name="to" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-1">
                        <label for="" class="form-label"></label><br>
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
            <div class="row mx-1">
                <div class="col d-flex">
                    <i class="fa fa-arrow-left my-auto me-3 cursor-pointer" onclick="history.back()"></i>
                    <h6 class="my-auto">Semua Timeline</h6>
                </div>
            </div>
        </div>
        <div class="card-body p-3 px-4">
            <div class="timeline timeline-one-side">
                @if ($timeline->count() < 1)
                    <h4 class="mx-5">
                        @if (!Str::contains(Auth::user()->role, 'admin'))
                            Kamu belum membuat jurnal hari ini.
                        @else
                            Belum ada jurnal.
                        @endif
                    </h4>
                @else
                    @foreach ($timeline as $timelines)
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="ni ni-bell-55 text-success text-gradient"></i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Kelas {{ $timelines->kelas }}
                                    {{ $timelines->kompetensi_keahlian }}, {{ $timelines->mapel }}</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                    {{ $timelines->nama_guru }}</p>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                    {{ $timelines->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

@endsection
