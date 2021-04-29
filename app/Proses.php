<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Proses extends Model
{
    protected $table = 'normalisasi';
    protected $primarykey = 'id';
    protected $fillable = [
        'id_karyawan',
        'id_kriteria',
        'id_subkriteria'

    ];
}