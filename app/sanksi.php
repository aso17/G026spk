<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanksi extends Model
{
    protected $table = 'ketentuan_sanksi';
    protected $primarykey = 'id';
    protected $fillable = [
        'nama_sanksi',
        'nilai_ketentuan',

    ];
}