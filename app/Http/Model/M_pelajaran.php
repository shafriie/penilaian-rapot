<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class M_pelajaran extends Model
{
    protected $table = 'tbl_matapelajaran';

    protected $fillable = ['kode_matapelajaran','mata_pelajaran','kkm'];

    public $timestamps = false;

}
