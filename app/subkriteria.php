<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subkriteria extends Model
{
    protected $table = 'subkriteria';
    protected $primarykey = 'id';
    protected $fillable = [
        'id_kriteria',
        'sub_kriteria',
        'bobot_subkriteria',
    ];
}