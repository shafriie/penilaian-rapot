<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use App\Http\Model\M_login;

class M_siswa extends Model
{

    protected $table = 'tbl_siswa';
    protected $fillable = ['NIS','username','nama','tempat_lahir','tanggal_lahir','jenis_kelamin','agama','alamat'];
    public $timestamps = false;

    public function users() {
	    return $this->hasMany(M_login::class, 'username');
	}

}
