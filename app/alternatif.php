<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alternatif extends Model
{
    protected $table = 'alternatif';
    protected $primarykey = 'id';
    protected $fillable = [

        'nama_alternatif',

    ];
}