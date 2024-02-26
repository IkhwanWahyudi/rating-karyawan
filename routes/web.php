<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\RiwayatController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/daftar', function () {
    return view('daftar');
})->name('daftar');

Route::post(
    '/register/action',
    [AuthController::class, 'registerAction']
)->name('daftar.action');

Route::post(
    '/login/action',
    [AuthController::class, 'loginAction']
)->name('login.action');

Route::get('/Perusahaan/Tambah-Karyawan', function () {
    return view('perusahaan.tambahkaryawan');
})->name('tambah-karyawan');

Route::controller(PerusahaanController::class)->group(function () {
    Route::get('/perusahaan/detail/{id}', 'viewdetail')->name('detailperusahaan');
    Route::get('/perusahaan/detail', 'detail')->name('detail');
    Route::get('/perusahaan/Daftar-Karyawan', 'viewkaryawan')->name('perusahaan');
});

Route::controller(KaryawanController::class)->group(function () {
    Route::get('/perusahaan/Tambah-Karyawan/action', 'store')->name('karyawan.store');
    Route::post('/perusahaan/Ubah-Profil/{id}/action', 'update')->name('karyawan.ubah');
    Route::get('/karyawan/dashboard/{id}', 'view')->name('karyawan.view');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/dashboard', 'view')->name('admin');
});

Route::controller(RiwayatController::class)->group(function () {
    Route::post('/karyawan/Pengajuan-Pemberhentian/{id}/action', 'pengajuan')->name('karyawan.berhenti');
    Route::post('/karyawan/Batal-Pemberhentian/{id}/action', 'batal')->name('karyawan.batal');
});

Route::get('/logout', [
    AuthController::class, 'logout'
])->name('logout');
