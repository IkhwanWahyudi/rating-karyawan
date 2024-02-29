<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function pengajuan($id)
    {
        $karyawan = Riwayat::where('id', $id)->first();
        // $karyawan = Riwayat::where('nik', $nik)->where('status', 'masih bekerja')->first();

        $user = Auth::user();
        $karyawan_id = Karyawan::where('nik', $user->niknpwp)->value('id');

        $karyawan->update([
            'status' => 'menunggu',
        ]);

        return redirect()->route('karyawan.view', $karyawan_id);
    }

    public function batal($id)
    {
        $karyawan = Riwayat::where('id', $id)->first();

        // Memeriksa apakah riwayat karyawan ditemukan
        $user = Auth::user();
        $karyawan_id = Karyawan::where('nik', $user->niknpwp)->value('id');

        $karyawan->update([
            'status' => 'masih bekerja',
        ]);

        if ($user->role == "karyawan") {
            $karyawan_id = Karyawan::where('nik', $user->niknpwp)->value('id');
            return redirect()->route('karyawan.view', $karyawan_id);
        } else {
            return redirect()->route('perusahaan');
        }
    }

    public function pemberhentian($id)
    {
        $karyawan = Riwayat::where('id', $id)->first();
        $tahun_berhenti = date('Y');

        $karyawan->update([
            'status' => "tunggu review",
            'akhir' => $tahun_berhenti,
        ]);

        return redirect()->route('perusahaan');
    }

    public function reviewBaik($id)
    {
        $karyawan = Riwayat::where('id', $id)->first();

        $karyawan->update([
            'status' => "Baik",
        ]);

        return redirect()->route('perusahaan');
    }

    public function reviewBuruk($id)
    {
        $karyawan = Riwayat::where('id', $id)->first();

        $karyawan->update([
            'status' => "Buruk",
        ]);

        return redirect()->route('perusahaan');
    }
}
