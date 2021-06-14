<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanksi extends Model
{
    protected $table = 'ketentuan';
    protected $primarykey = 'id';
    protected $fillable = [
        'nama_sanksi',
        'nilai_ketentuan',

    ];
}