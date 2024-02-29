<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Perusahaan;
use App\Models\Riwayat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    public function store(Request $request)
    {
        $nikExist = Karyawan::where("nik", $request->nik)->first();
        if ($nikExist) {
            $updateKaryawan = Karyawan::where("nik", $request->nik)->first();

            $updateKaryawan->update([
                'posisi' => $request->posisi,
                'alamat' => $request->alamat,
            ]);

            Riwayat::create([
                'nik' => $request->nik,
                'npwp_perusahaan' => Auth::user()->niknpwp,
                'mulai' => $request->mulai,
                'akhir' => "Now",
                'status' => "masih bekerja",
            ]);
            return redirect()->route('perusahaan')->with('success', 'Karyawan berhasil ditambahkan.');
        } else {
            // Validasi input, termasuk validasi gambar
            $validatedData = $request->validate([
                'nik' => 'required|integer',
                'nama' => 'required|string',
                'posisi' => 'required|string',
                'alamat' => 'required|string',
                'gender' => 'required|string',
                'tempat_lahir' => 'required|string',
                'lahir' => 'required|date',
            ]);

            Karyawan::create($validatedData);

            Riwayat::create([
                'nik' => $request->nik,
                'npwp_perusahaan' => Auth::user()->niknpwp,
                'mulai' => $request->mulai,
                'akhir' => "Now",
                'status' => "masih bekerja",
            ]);
            User::create([
                'niknpwp' => $request->nik,
                'username' => $request->nik,
                'password' => Hash::make($request->nik),
                'role' => "karyawan",
            ]);
            // Redirect ke halaman yang sesuai, dan beri pesan sukses jika diperlukan
            return redirect()->route('perusahaan')->with('success', 'Karyawan berhasil ditambahkan.');
        }
    }

    public function view($id)
    {
        $nik = Auth::user()->niknpwp;
        $npwp_perusahaan_sekarang = Riwayat::where('nik', $nik)
            ->whereIn('status', ['masih bekerja', 'menunggu'])
            ->value('npwp_perusahaan');
        $npwp_perusahaan_lama = Riwayat::where('nik', $nik)
            ->whereIn('status', ['Baik', 'Buruk', 'tunggu review'])
            ->pluck('npwp_perusahaan');
        $perusahaan = Perusahaan::where('npwp', $npwp_perusahaan_sekarang)->first();
        $perusahaan_lama = Perusahaan::whereIn('npwp', $npwp_perusahaan_lama)->orderBy('created_at', 'desc')->get();
        $karyawan = Karyawan::all()->where('nik', $nik)->first();
        $riwayat = Riwayat::where('nik', $nik)
            ->whereNot('akhir', 'Now')
            ->orderBy('created_at', 'desc')
            ->get();

        $tahunLahir = date('Y', strtotime($karyawan->lahir));

        $umur = date('Y') - $tahunLahir;

        return view('karyawan.dashboard', [
            'karyawan' => $karyawan,
            'riwayats' => $riwayat,
            'perusahaan' => $perusahaan,
            'perusahaan_lama' => $perusahaan_lama,
            'umur' => $umur,
            'id' => $id,
        ]);
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $request->validate([
            'nik' => 'required|integer',
            'nama' => 'required|string',
            'posisi' => 'required|string',
            'alamat' => 'required|string',
            'gender' => 'required|string',
            'tempat_lahir' => 'required|string',
            'lahir' => 'required|date',
        ]);

        $karyawan->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'posisi' => $request->posisi,
            'alamat' => $request->alamat,
            'gender' => $request->gender,
            'tempat_lahir' => $request->tempat_lahir,
            'lahir' => $request->lahir,
        ]);

        return redirect()->route('karyawan.view', $id)->with('success', '');
    }
}
