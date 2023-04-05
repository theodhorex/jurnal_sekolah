<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Redirect;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Avatar;

// Excel
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SiswaImport;
use App\Imports\GuruImport;

// Models
use App\Models\User;
use App\Models\Kelas;
use App\Models\Jurnal;
use App\Models\Siswa;

class MainController extends Controller
{
    public function dashboard()
    {
        $tanggalHariIni = Carbon::now()->toDateString();

        $total_siswa = Siswa::where('status', 'aktif')->count();
        $total_kelas = Kelas::count();
        if (Str::contains(Auth::user()->role, 'guru')) {
            $total_timeline = Jurnal::where('nama_guru', Auth::user()->name);
            $recent_timeline = Jurnal::whereDate('created_at', $tanggalHariIni)->where('nama_guru', Auth::user()->name)->latest()->get();
        } else {
            $total_timeline = Jurnal::all();
            $recent_timeline = Jurnal::whereDate('created_at', $tanggalHariIni)->latest()->limit(5)->get();
        }
        $total_mapel = User::all();
        $total_akun = User::count();
        return view('dashboard', compact(['total_siswa', 'total_kelas', 'total_akun', 'total_timeline', 'recent_timeline', 'total_mapel']));
    }

    public function generalTimeline(Request $request)
    {
        $timeline = new Jurnal;
        if (Str::contains(Auth::user()->role, 'guru')) {
            $timeline->where('nama_guru', Auth::user()->name);
        }

        if ($request->filled('from') and $request->filled('to')) {
            $timeline = $timeline->whereBetween('tanggal_pengajaran', [$request->from, $request->to]);
        }

        $timeline = $timeline->latest()->get();

        return view('general_timeline', compact('timeline'));
    }

    public function filterRole(Request $request)
    {
        $result  = User::where('role', 'LIKE', '%' . $request->role . '%')->get();
        return response()->json($result);
    }

    public function userManagement()
    {
        return view('laravel-examples/user-management');
    }

    public function tambahAkun(Request $request)
    {
        $user = new User;
        $user->name = $request->nama_akun;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->mapel = $request->mapel;
        $user->password = Hash::make($request->password);

        $user->save();
    }

    public function detailAkun($id){
        $target = User::find($id);
        return view('ajax/detail-akun', compact('target'));
    }

    public function editAkun($id)
    {
        $target = User::find($id);

        return view('ajax/edit-akun', compact('target'));
    }

    public function updateAkun($id, Request $request)
    {
        $target = User::find($id);

        $target->name = $request->nama_akun;
        $target->email = $request->email;
        $target->role = $request->role;
        $target->mapel = $request->mapel;

        $target->update();
    }

    public function hapusAkun($id)
    {
        $target = User::find($id);
        $target->delete();
    }

    public function listKelas()
    {
        if (!Str::contains(Auth::user()->role, 'guru')) {
            $kelas = Kelas::where('status', 'aktif')->get();
            $siswa = Siswa::all();
        } else {
            $kelas = Kelas::where('guru_pengampu', 'LIKE', '%' . Auth::user()->name . '%')->get();
            if (Str::contains(Auth::user()->role, 'guru')) {
                $general_kelas = Kelas::where('guru_pengampu', 'NOT LIKE', '%' . Auth::user()->name . '%')->get();
            }
            $siswa = Siswa::all();
        }
        if (Str::contains(Auth::user()->role, 'guru')) {
            return view('list-kelas', compact(['kelas', 'siswa', 'general_kelas']));
        } else {
            return view('list-kelas', compact(['kelas', 'siswa']));
        }
    }

    public function filterStatusKelas(Request $request)
    {
        $result  = Kelas::where('status', 'LIKE', '%' . $request->status . '%')->get();
        return response()->json($result);
    }

    public function detailKelas($id)
    {
        $kelas = Kelas::find($id);
        $timeline_kelas = Jurnal::where('id_kelas', $id)->latest()->limit(3)->get();
        $siswa = Siswa::all();
        $guru_pengampu = $kelas->guru_pengampu;
        $gurus = str_ireplace('"', '', $guru_pengampu);
        $guruss = explode(',', $gurus);
        $guru = str_ireplace(['[', ']'], '', $guruss);
        $collection = new Collection($guru);
        $collection = $collection->take(5);
        return view('ajax/detail-kelas', compact(['kelas', 'collection', 'timeline_kelas', 'siswa']));
    }

    public function updateDetailKelas(Request $request, $id)
    {
        $target_kelas = Kelas::find($id);

        $target_kelas->kelas = $request->kelas;
        $target_kelas->jurusan = $request->jurusan;
        $target_kelas->tahun_ajaran = $request->tahun_ajaran;
        $target_kelas->jumlah_siswa = $request->jumlah_siswa;

        $target_kelas->update();
    }

    public function tambahKelas(Request $request)
    {
        $kelas_baru = new Kelas;
        $kelas_baru->kelas = $request->kelas;
        $kelas_baru->jurusan = $request->kompetensi_keahlian;
        $kelas_baru->jumlah_siswa = $request->jumlah_siswa;
        $kelas_baru->angkatan = $request->angkatan;
        $kelas_baru->tahun_ajaran = $request->tahun_ajaran;
        $kelas_baru->status = 'aktif';
        $kelas_baru->guru_pengampu = 'guru-example';

        $kelas_baru->save();
        return back();
    }

    public function hapusKelas($id){
        $kelas = Kelas::find($id);
        $kelas->delete();
    }

    public function timelineKelas($id)
    {
        $kelas = Kelas::find($id);
        $undone_jurnal_kelas = Jurnal::where('id_kelas', $id);
        // $jurnal_kelas = collect($undone_jurnal_kelas)->map(function ($item) {
        //     $carbon = Carbon::createFromFormat('Y-m-d H:i:s', $item['tanggal']);
        //     // $timestamp = $carbon->timestamp;
        //     // $item['tanggal'] = $timestamp;
        //     $item['minggu_ke'] = $carbon->weekOfMonth;
        //     $item['bulan_apa'] = $carbon -> month;
        //     return $item;
        // });

        $jurnal_kelas = $undone_jurnal_kelas->orderBy(DB::raw('MONTH(tanggal_pengajaran)'), 'desc')->get();
        return view('timeline-kelas', compact(['kelas', 'jurnal_kelas']));
    }

    public function editGuruPengampu($id)
    {
        $nama_guru = User::where('role', 'LIKE', '%' . 'guru' . '%')->get();
        $kelas = Kelas::find($id);
        $guru_pengampu = $kelas->guru_pengampu;
        $gurus = str_ireplace('"', '', $guru_pengampu);
        $guruss = explode(',', $gurus);
        $guru = str_ireplace(['[', ']'], '', $guruss);
        return view('edit-guru-pengampu', compact(['kelas', 'guru', 'nama_guru']));
    }

    public function listGuruPengampu($id)
    {
        $kelas = Kelas::find($id);
        $guru_pengampu = $kelas->guru_pengampu;
        $gurus = str_ireplace('"', '', $guru_pengampu);
        $guruss = explode(',', $gurus);
        $guru = str_ireplace(['[', ']'], '', $guruss);
        return view('ajax/list-guru-pengampu', compact('guru'));
    }

    public function updateGuruPengampu($id, Request $request)
    {
        $kelas = Kelas::find($id);
        $kelas->guru_pengampu = $request->result;
        $kelas->save();
    }

    public function listMapel(Request $request)
    {
        if ($request->has('search')) {
            $mapel = User::where('mapel', 'LIKE', '%' . $request->result . '%');

            if ($request->search == true) {
                return json_encode($mapel->latest()->get());
            }
        } else {
            $mapel = User::where('role', 'guru')->orderBy('mapel', 'asc')->latest()->get();
        }
        return view('list-mapel', compact('mapel'));
    }

    public function formJurnal($id)
    {
        $kelass = Kelas::find($id);
        $siswa = Siswa::where([['kelas', $kelass->kelas], ['jurusan', $kelass->jurusan], ['status', 'aktif']])->get();
        $mapelLoggedUser = explode(',', Auth::user()->mapel);
        return view('form-jurnal', compact(['kelass', 'siswa', 'mapelLoggedUser']));
    }

    public function formJurnalSend(Request $request, $id)
    {
        $target_kelas = new Jurnal;
        $kelas = Kelas::find($id);

        $target_kelas->id_kelas = $id;
        $target_kelas->tanggal = Carbon::now();
        $target_kelas->nama_guru = Auth::user()->name;
        $target_kelas->kelas = $kelas->kelas;
        $target_kelas->kompetensi_keahlian = $kelas->jurusan;
        $target_kelas->mapel = $request->mapel;
        $target_kelas->materi_yang_diajarkan = $request->materi_yang_diajarkan;
        $target_kelas->evaluasi_perkembangan_kbm = $request->evaluasi_perkembangan_kbm;
        if ($request->nama_siswa_yang_bersangkutan) {
            $target_kelas->nama_siswa_yang_bersangkutan = $request->nama_siswa_yang_bersangkutan;
        } else {
            $target_kelas->nama_siswa_yang_bersangkutan = 'Semua siswa';
        }
        $target_kelas->laporan_perkembangan_siswa = $request->laporan_perkembangan_siswa;
        $target_kelas->waktu_mulai = $request->waktu_mulai;
        $target_kelas->waktu_selesai = $request->waktu_selesai;
        $target_kelas->tanggal_pengajaran = $request->tanggal_pengajaran;
        $target_kelas->lampiran = $request->lampiran;

        $target_kelas->save();
        return redirect('timeline-kelas/' . $id)->with('success', 'Jurnal berhasil ditambahkan!');
    }

    public function editTimeline($id)
    {
        $jurnal = Jurnal::find($id);
        return view('ajax/edit-timeline', compact('jurnal'));
    }

    public function editTimelineSend($id, Request $request)
    {
        $target = Jurnal::find($id);

        $target->waktu_mulai = $request->waktu_mulai;
        $target->waktu_selesai = $request->waktu_selesai;
        $target->mapel = $request->mapel;
        $target->materi_yang_diajarkan = $request->materi_yang_diajarkan;
        $target->evaluasi_perkembangan_kbm = $request->evaluasi_perkembangan_kbm;
        $target->laporan_perkembangan_siswa = $request->laporan_perkembangan_siswa;

        $target->update();
        return back();
    }

    public function deleteTimeline($id)
    {
        $target = Jurnal::find($id);
        $target->delete();
        return back();
    }

    public function cariSiswa(Request $request)
    {
        if ($request->has('search')) {
            // $get_siswa = Jurnal::where('nama_siswa_yang_bersangkutan', 'LIKE', '$' . $request -> result . '%');
            $get_siswa = Jurnal::where('nama_siswa_yang_bersangkutan', 'LIKE', '%' . $request->result . '%')->orWhere('nama_guru', 'LIKE', '%' . $request->result . '%');
            if ($request->search == true) {
                return json_encode($get_siswa->get());
            }
        } else {
            $get_siswa = Jurnal::all();
        }

        return view('cari-siswa', compact('get_siswa'));
    }

    function kenaikanKelas()
    {
        $siswa = Siswa::all();

        foreach ($siswa as $s) {
            $kelasInt = $this->convertToInt($s->kelas);
            $maxKelas = $this->convertToInt('XII');

            if ($kelasInt == $maxKelas) {
                $s->status = 'alumni';
            } else {
                $s->kelas = $this->convertToRoman($kelasInt + 1);
                $s->status = 'aktif';
            }

            $s->save();
        }
        $siswas = $s::select('kelas', 'jurusan', DB::raw('count(*) as jumlah_siswa'))
            ->groupBy('kelas', 'jurusan')
            ->pluck('jumlah_siswa');
        $kelas = Kelas::all();
        foreach($kelas as $k){
            $k->jumlah_siswa = Siswa::where('kelas', $k->kelas)->where('jurusan', $k->jurusan)->where('status', 'aktif')->count();
            $k->save();
        }
        echo 'Berhasil!';
    }

    // Export PDF
    public function exportTimelineKelas($id)
    {
        $data = Jurnal::where('id_kelas', $id)->get();
        $kelas = Kelas::find($id);

        $pdf = PDF::loadView('pdf-view', compact(['data', 'kelas']))->setPaper('A4', 'landscape');
        return $pdf->stream('Timeline kelas ' . $kelas->kelas . ' ' . $kelas->jurusan . ' ' . Carbon::now()->toDateString() . '.pdf');
    }

    public function exportTimelineKelass($id)
    {
        $data = Jurnal::where('id_kelas', $id)->where('nama_guru', Auth::user()->name)->get();
        $kelas = Kelas::find($id);

        $pdf = PDF::loadView('pdf-view2', compact('data'))->setPaper('A4', 'landscape');
        return $pdf->stream('Timeline kelas ' . $kelas->kelas . ' ' . $kelas->jurusan . ' ' . Carbon::now()->toDateString() . '.pdf');
    }


    // Import Excel
    public function importDataSiswa(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        $file = $request->file('file');
        $nama_file = rand() . $file->getClientOriginalName();
        $file->move('file_siswa', $nama_file);
        Excel::import(new SiswaImport, public_path('/file_siswa/' . $nama_file));

        $kelas = Kelas::all();

        foreach ($kelas as $k) {
            $siswa = Siswa::where('kelas', $k->kelas)->where('jurusan', $k->jurusan)->get();

            $jumlah_siswa = count($siswa);

            $kelas = Kelas::where('kelas', $k->kelas)->where('jurusan', $k->jurusan)->first();
            $kelas->jumlah_siswa = $jumlah_siswa;
            $kelas->save();
        }

        return redirect('/list-kelas')->with('success', 'Data siswa berhasil diimport!');
    }

    public function importDataGuru(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        $file = $request->file('file');
        $nama_file = rand() . $file->getClientOriginalName();
        $file->move('file_siswa', $nama_file);
        Excel::import(new GuruImport, public_path('/file_siswa/' . $nama_file));

        return redirect('/user-management')->with('success', 'Data akun guru berhasil diimport!');
    }



    // Testing function 
    public function testFunction()
    {
        return view('playground/pg');
    }


    // Roman convert
    function convertToRoman($num)
    {
        $n = intval($num);
        $result = '';

        $romanNumerals = array(
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1
        );

        foreach ($romanNumerals as $roman => $number) {
            while ($n >= $number) {
                $result .= $roman;
                $n -= $number;
            }
        }

        return $result;
    }

    function convertToInt($roman)
    {
        $romanToInt = [
            'I' => 1,
            'IV' => 4,
            'V' => 5,
            'IX' => 9,
            'X' => 10,
            'XL' => 40,
            'L' => 50,
            'XC' => 90,
            'C' => 100,
            'CD' => 400,
            'D' => 500,
            'CM' => 900,
            'M' => 1000
        ];

        $result = 0;

        for ($i = 0; $i < strlen($roman); $i++) {
            $currentChar = $roman[$i];
            $nextChar = $roman[$i + 1] ?? null;

            if ($nextChar && $romanToInt[$nextChar] > $romanToInt[$currentChar]) {
                $result -= $romanToInt[$currentChar];
            } else {
                $result += $romanToInt[$currentChar];
            }
        }

        return $result;
    }
}