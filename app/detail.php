<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail extends Model
{
    protected $table = 'detail_normalisasi';
    protected $primarykey = 'id';
    protected $fillable = [
        'id_karyawan',
        'bobot_c1',
        'bobot_c2',
        'bobot_c3',
        'bobot_c4'



    ];
}