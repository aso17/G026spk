<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    protected $table = 'karyawan';
    protected $primarykey = 'nik_karyawan';
    protected $fillable = [
        'nik_karyawan',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'tanggal_mulaikerja',
        'jenis_kelamin',
        'agama',
        'departemen',
        'status_karyawan',
        'no_telepon',
        'foto',
        'email'
    ];
}