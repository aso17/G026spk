<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kriteria extends Model
{
    protected $table = 'Kriteria';
    protected $primarykey = 'id';
    protected $fillable = [
        'kode_kriteria',
        'nama_kriteria',
        'bobot',
        'type',
    ];
}