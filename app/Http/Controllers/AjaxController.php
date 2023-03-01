<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Model
use App\Models\User;

class AjaxController extends Controller
{
    //User Management Site
    public function listAkun(Request $request){
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
        return view('ajax/list-akun', compact('get_user'));
    }
}