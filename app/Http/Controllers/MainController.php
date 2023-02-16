<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Redirect;
use PDF;
use DB;

// Models
use App\Models\User;
use App\Models\Kelas;
use App\Models\Jurnal;
use App\Models\Siswa;

class MainController extends Controller
{
    public function dashboard(){
        $total_siswa = Siswa::count();
        $total_kelas = Kelas::count();
        $total_akun = User::where('role', 'guru')->count();
        return view('dashboard', compact(['total_siswa', 'total_kelas', 'total_akun']));
    }

    public function filterRole(Request $request){
        $result  = User::where('role', 'LIKE', '%' . $request -> role . '%')->get();
        return response()->json($result);
    }
    
    public function userManagement(Request $request){
        if($request -> has('search')){
            $get_user = User::where('name', 'LIKE', '%' . $request -> result . '%');

            if($request -> search == true){
                return json_encode($get_user->get());
            }
        }else if($request -> has('status')){
            $get_user = User::where('role', 'LIKE', '%' . $request -> role_result . '%');

            if($request -> status == true){
                return json_encode($get_user->get());
            }
        }else{
            $get_user = User::latest()->get();
        }
        return view('laravel-examples/user-management', compact('get_user'));
    }

    public function tambahAkun(Request $request){
        $user = new User;
        $user -> name = $request -> nama_akun;
        $user -> email = $request -> email;
        $user -> role = $request -> role;
        $user -> mapel = $request -> mapel;
        $user -> password = Hash::make($request -> password);

        $user -> save();
    }

    public function editAkun($id){
        $target = User::find($id);

        return view('ajax/edit-akun', compact('target'));
    }

    public function updateAkun($id, Request $request){
        $target = User::find($id);

        $target -> name = $request -> nama_akun;
        $target -> email = $request -> email;
        $target -> role = $request -> role;

        $target -> update();
    }

    public function hapusAkun($id){
        $target = User::find($id);
        $target -> delete();
    }

    public function listKelas(){
        if(Auth::user()->role != 'guru'){
            $kelas = Kelas::all();
        }else{
            $kelas = Kelas::where('guru_pengampu', 'LIKE', '%' . Auth::user()->name . '%')->get();
        }
        return view('list-kelas', compact('kelas'));
    }

    public function detailKelas($id){
        $kelas = Kelas::find($id);  
        $guru_pengampu = $kelas -> guru_pengampu;
        $gurus = str_ireplace('"', '', $guru_pengampu);
        $guruss = explode(',', $gurus);
        $guru = str_ireplace(['[', ']'], '', $guruss);
        return view('ajax/detail-kelas', compact(['kelas', 'guru']));
    }

    public function tambahKelas(Request $request){
        $kelas_baru = new Kelas;
        $kelas_baru -> kelas = $request -> kelas;
        $kelas_baru -> jurusan = $request -> kompetensi_keahlian;
        $kelas_baru -> jumlah_siswa = $request -> jumlah_siswa;
        $kelas_baru -> angkatan = $request -> angkatan;
        $kelas_baru -> tahun_ajaran = $request -> tahun_ajaran;

        $kelas_baru -> save();
        return back();
    }

    public function timelineKelas($id){
        $kelas = Kelas::find($id);
        $undone_jurnal_kelas = Jurnal::where('id_kelas', $id)->get();
        $jurnal_kelas = collect($undone_jurnal_kelas)->map(function ($item) {
            $carbon = Carbon::createFromFormat('Y-m-d H:i:s', $item['tanggal']);
            // $timestamp = $carbon->timestamp;
            // $item['tanggal'] = $timestamp;
            $item['minggu_ke'] = $carbon->weekOfMonth;
            $item['bulan_apa'] = $carbon -> month;
            return $item;
        });
        
        return view('timeline-kelas', compact([ 'kelas', 'jurnal_kelas' ]));
    }

    public function editGuruPengampu($id){
        $nama_guru = User::where('role', 'guru')->get();
        $kelas = Kelas::find($id);
        $guru_pengampu = $kelas -> guru_pengampu;
        $gurus = str_ireplace('"', '', $guru_pengampu);
        $guruss = explode(',', $gurus);
        $guru = str_ireplace(['[', ']'], '', $guruss);
        return view('edit-guru-pengampu', compact(['kelas', 'guru', 'nama_guru']));
    }

    public function updateGuruPengampu($id, Request $request){
        $kelas = Kelas::find($id);
        $kelas -> guru_pengampu = $request -> result;
        $kelas -> save();
        // echo $request -> result;
    }

    public function listMapel(Request $request){
        if($request->has('search')){
            $mapel = User::where('mapel', 'LIKE', '%' . $request -> result . '%');

            if($request -> search == true){
                return json_encode($mapel -> get());
            }
        }else{
            $mapel = User::where('role', 'guru')->get();
        }
        return view('list-mapel', compact('mapel'));
    }

    public function formJurnal($id){
        $kelass = Kelas::find($id);
        $siswa = Siswa::where([['kelas', $kelass -> kelas], ['jurusan', $kelass -> jurusan]])->get();
        return view('form-jurnal', compact(['kelass', 'siswa']));
        // dd($siswa);
    }
    
    public function formJurnalSend(Request $request, $id){
        $target_kelas = new Jurnal; 
        $kelas = Kelas::find($id);

        $target_kelas -> id_kelas = $id;
        $target_kelas -> tanggal = Carbon::now();
        $target_kelas -> nama_guru = Auth::user()->name;
        $target_kelas -> kelas = $kelas -> kelas;
        $target_kelas -> kompetensi_keahlian = $kelas -> jurusan;
        $target_kelas -> mapel = Auth::user()->mapel;
        $target_kelas -> materi_yang_diajarkan = $request -> materi_yang_diajarkan;
        $target_kelas -> evaluasi_perkembangan_kbm = $request -> evaluasi_perkembangan_kbm;
        if($request -> nama_siswa_yang_bersangkutan){
            $target_kelas -> nama_siswa_yang_bersangkutan = $request -> nama_siswa_yang_bersangkutan;
        }else{
            $target_kelas -> nama_siswa_yang_bersangkutan = 'Semua siswa';
        }
        $target_kelas -> laporan_perkembangan_siswa = $request -> laporan_perkembangan_siswa;
        $target_kelas -> waktu_mulai = $request -> waktu_mulai;
        $target_kelas -> waktu_selesai = $request -> waktu_selesai;

        $target_kelas -> save();
        return back();
    }

    public function cariSiswa(Request $request){
        if($request -> has('search')){
            // $get_siswa = Jurnal::where('nama_siswa_yang_bersangkutan', 'LIKE', '$' . $request -> result . '%');
            $get_siswa = DB::table('jurnals')->where('nama_siswa_yang_bersangkutan', 'like', '%'.$request->result.'%');
            if($request -> search == true){
                return json_encode($get_siswa -> get());
            }
        }else{
            $get_siswa = Jurnal::all();
        }
        
        return view('cari-siswa', compact('get_siswa'));
        // dd($get_siswa);
    }








}