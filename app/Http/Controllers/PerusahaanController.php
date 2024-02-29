<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Perusahaan;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerusahaanController extends Controller
{
    public function viewdetail($id)
    {
        $user = Auth::user();

        $perusahaan = Riwayat::where('nik', $user->niknpwp)->where('status', ['masih bekerja', 'menunggu'])->value('npwp_perusahaan');
        return view('karyawan.detailperusahaan', [
            'perusahaan' => Perusahaan::where('npwp', $perusahaan)->first(),
            'id' => $id
        ]);
    }

    public function detail()
    {
        $user = Auth::user();

        return view('perusahaan.detail', [
            'perusahaan' => Perusahaan::where('npwp', $user->niknpwp)->first(),
            'nama' => Perusahaan::where('npwp', $user->niknpwp)->value('nama'),
        ]);
    }

    public function viewkaryawan()
    {
        $npwp = Auth::user()->niknpwp;
        $perusahaan = Perusahaan::where('npwp', $npwp)->value('npwp');

        // Ambil semua NIK yang sesuai dengan ID perusahaan
        $niks = Riwayat::where('npwp_perusahaan', $perusahaan)->whereIn('status', ['masih bekerja', 'menunggu'])->pluck('nik');

        return view('perusahaan.daftarkaryawan', [
            'karyawans' => Karyawan::whereIn('nik', $niks)->get(),
            'riwayats' => Riwayat::where('npwp_perusahaan', $perusahaan)
                ->whereIn('status', ['masih bekerja', 'menunggu']) // Menggunakan whereIn() untuk status
                ->get(),
            'nama' => Perusahaan::where('npwp', $npwp)->value('nama'),
        ]);
    }

    public function viewkaryawanLama()
    {
        $npwp = Auth::user()->niknpwp;
        $perusahaan = Perusahaan::where('npwp', $npwp)->value('npwp');

        // Ambil semua NIK yang sesuai dengan ID perusahaan
        $niks = Riwayat::where('npwp_perusahaan', $perusahaan)->where('status', 'tunggu review')->pluck('nik');

        return view('perusahaan.karyawanreview', [
            'karyawans' => Karyawan::whereIn('nik', $niks)->get(),
            'riwayats' => Riwayat::where('npwp_perusahaan', $perusahaan)
                ->where('status', 'tunggu review') // Menggunakan whereIn() untuk status
                ->get(),
            'nama' => Perusahaan::where('npwp', $npwp)->value('nama'),
        ]);
    }
}
