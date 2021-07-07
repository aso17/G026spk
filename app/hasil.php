<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hasil extends Model
{
    protected $table = 'hasil';
    protected $primarykey = 'id';
    protected $fillable = [
        'karyawan_id',
        'id_sanksi',
        'hasil',
        'status_pengajuan',
        'tgl_pengajuan',
        'tgl_approve'
    ];
}