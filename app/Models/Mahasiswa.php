<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    // Tambahkan atribut yang bisa diisi secara mass assignment
    protected $fillable = [
        'nim',      // NIM mahasiswa
        'nama',     // Nama mahasiswa
        'jurusan',    // Email mahasiswa
    ];
}
