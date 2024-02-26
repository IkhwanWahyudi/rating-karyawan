<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Perusahaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerAction(Request $request)
    {
        $usernameExist = User::where("username", $request->username)->first();
        if ($usernameExist) {
            session()->flash('error', 'Username sudah digunakan!');
            return redirect('/daftar');
        }

        $npwpExist = User::where("niknpwp", $request->npwp)->first();
        if ($npwpExist) {
            session()->flash('error', 'NPWP sudah terdaftar!');
            return redirect('/daftar');
        }

        User::create([
            'niknpwp' => $request->npwp,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        Perusahaan::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'pemilik' => $request->pemilik,
            'npwp' => $request->npwp,
            'tahun_berdiri' => $request->tahun_berdiri,
        ]);

        session()->flash('success', 'Registration successful!');
        return redirect('/');
    }

    public function loginAction(Request $request)
    {
        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        if (Auth::attempt($data)) {
            $user = Auth::user();
            if ($user->role == "karyawan") {
                $karyawan_id = Karyawan::where('nik', $user->niknpwp)->value('id');
                return redirect()->route('karyawan.view', $karyawan_id);
            } elseif ($user->role == "perusahaan") {
                return redirect()->route('detail');
            } elseif ($user->role == "admin") {
                return redirect()->route('admin');
            }
        } else {
            session()->flash('error', 'Username or password is incorrect!');
            return redirect('/');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
