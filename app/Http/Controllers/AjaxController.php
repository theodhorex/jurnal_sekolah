<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

// Model
use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;

class AjaxController extends Controller
{
    //User Management Site
    public function listAkun(Request $request)
    {
        if ($request->has('search')) {
            $get_user = User::where('name', 'LIKE', '%' . $request->result . '%')->orderBy('name', 'asc');

            if ($request->search == true) {
                return json_encode($get_user->get());
            }
        } else if ($request->has('status')) {
            $get_user = User::where('role', 'LIKE', '%' . $request->role_result . '%')->orderBy('name', 'asc');

            if ($request->status == true) {
                return json_encode($get_user->get());
            }
        } else {
            $get_user = User::orderBy('name', 'asc')->latest()->get();
        }
        return view('ajax/list-akun', compact('get_user'));
    }


    // Kelas Management site
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
            return view('ajax/list-kelas', compact(['kelas', 'siswa', 'general_kelas']));
        } else {
            return view('ajax/list-kelas', compact(['kelas', 'siswa']));
        }
    }
}