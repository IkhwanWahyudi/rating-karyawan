<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawans';
    protected $fillable = ['nik', 'nama', 'posisi', 'alamat', 'gender', 'tempat_lahir', 'lahir'];
}
