<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;


// Extend Controller
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', [MainController::class, 'dashboard'])->name('dashboard');

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('user-management', [MainController::class, 'userManagement'])->name('user-management');
	Route::get('tambah-akun', [MainController::class, 'tambahAkun'])->name('tambah-akun');
	Route::get('edit-akun/{id}', [MainController::class, 'editAkun'])->name('edit-akun');
	Route::get('update-akun/{id}', [MainController::class, 'updateAkun'])->name('update-akun');
	Route::get('hapus-akun/{id}', [MainController::class, 'hapusAkun'])->name('hapus-akun');

	Route::get('list-kelas', [MainController::class, 'listKelas'])->name('list-kelas');
	Route::get('detail-kelas/{id}', [MainController::class, 'detailKelas'])->name('detail-kelas');
	Route::get('tambah-kelas', [MainController::class, 'tambahKelas'])->name('tambah-kelas');
	Route::get('timeline-kelas/{id}', [MainController::class, 'timelineKelas'])->name('timeline-kelas');
	Route::get('edit-guru-pengampu/{id}', [MainController::class, 'editGuruPengampu'])->name('edit-guru-pengampu');
	Route::get('update-guru-pengampu/{id}', [MainController::class, 'updateGuruPengampu'])->name('update-guru-pengampu');
	Route::get('filter-role', [MainController::class, 'filterRole'])->name('filter-role');
	Route::get('list-mapel', [MainController::class, 'listMapel'])->name('list-mapel');
	Route::get('form-jurnal/{id}', [MainController::class, 'formJurnal'])->name('form-jurnal');
	Route::post('form-jurnal-send/{id}', [MainController::class, 'formJurnalSend'])->name('form-jurnal-send');
	Route::get('cari-siswa', [MainController::class, 'cariSiswa'])->name('cari-siswa');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');