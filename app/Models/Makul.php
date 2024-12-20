<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Makul extends Model
{
    // Tambahkan atribut yang bisa diisi secara mass assignment
    protected $fillable = [
        'kode',      // NIM mahasiswa
        'nama',     // Nama mahasiswa
        'sks',    // Email mahasiswa
    ];
}
