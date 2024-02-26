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
        $karyawan = Riwayat::findofFail($id);
        // $karyawan = Riwayat::where('nik', $nik)->where('status', 'masih bekerja')->first();

        $user = Auth::user();
        $karyawan_id = Karyawan::where('nik', $user->niknpwp)->value('id');

        $karyawan->update([
            'status' => 'menunggu',
        ]);

        return redirect()->route('karyawan.view', $karyawan_id);
    }

    public function batal($nik)
    {
        $karyawan = Riwayat::where('nik', $nik)->where('status', 'menunggu')->first();

        $user = Auth::user();
        $karyawan_id = Karyawan::where('nik', $user->niknpwp)->value('id');

        $karyawan->update([
            'status' => 'masih bekerja',
        ]);

        return redirect()->route('karyawan.view', $karyawan_id);
    }

    public function pemberhentian($nik, $status)
    {
        $karyawan = Riwayat::where('nik', $nik)->where('status', 'masih bekerja')->first();

        $user = Auth::user();
        $karyawan_id = Karyawan::where('nik', $user->niknpwp)->value('id');

        $tahun_berhenti = date('Y');

        $karyawan->update([
            'status' => $status,
            'akhir' => $tahun_berhenti,
        ]);

        return redirect()->route('karyawan.view', $karyawan_id)->with('success', '');
    }
}
