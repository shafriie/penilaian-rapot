<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class M_kelas extends Model
{
    protected $table = 'tbl_kelas';

    protected $fillable = ['nama_kelas','wali_kelas'];

    public $timestamps = false;

}
