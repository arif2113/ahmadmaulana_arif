<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    // Tambahkan atribut yang bisa diisi secara mass assignment
    protected $fillable = [
        'nidn',      // NIM mahasiswa
        'nama',     // Nama mahasiswa
        'matakuliah',    // Email mahasiswa
    ];
}
