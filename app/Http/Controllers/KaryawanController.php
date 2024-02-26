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
            return redirect()->route('detail')->with('error', 'NIK sudah terdaftar!');
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
                'id_perusahaan' => Auth::user()->id,
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
        $id_perusahaan_sekarang = Riwayat::where('nik', $nik)
            ->whereIn('status', ['masih bekerja', 'menunggu'])
            ->value('id_perusahaan');
        $id_perusahaan_lama = Riwayat::where('nik', $nik)
            ->value('id_perusahaan');
        $perusahaan = Perusahaan::where('id', $id_perusahaan_sekarang)->first();
        $perusahaan_lama = Perusahaan::where('id', $id_perusahaan_lama)->get();
        $karyawan = Karyawan::all()->where('nik', $nik)->first();
        $riwayat = Riwayat::where('nik', $nik)
            ->orderBy('mulai', 'desc')
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
