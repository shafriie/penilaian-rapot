<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use App\Http\Model\M_siswa;
use App\Http\Model\M_guru;
use Illuminate\Support\Facades\DB;

class M_login extends Model
{
    protected $table = 'tbl_users';
    protected $fillable = ['username','password','created_at','status','ket_status'];
    public $timestamps = false;

    public function getData()
    {
    	$data = DB::table('tbl_users as users')
    		      ->join('tbl_siswa as siswa','users.username','=','siswa.username')
    		      ->select('users.id','users.username', 'users.password', 'siswa.NIS', 'siswa.nama', 'siswa.tempat_lahir', 
    		      	'siswa.tanggal_lahir', 'siswa.jenis_kelamin', 'siswa.agama', 'siswa.alamat')
    		      ->get();
    	return $data;
    }

    public function getDataWhere($id)
    {
        $data = DB::table('tbl_users as users')
                  ->join('tbl_siswa as siswa','users.username','=','siswa.username')
                  ->select('users.id','users.username', 'users.password', 'siswa.NIS', 'siswa.nama', 'siswa.tempat_lahir', 
                    'siswa.tanggal_lahir', 'siswa.jenis_kelamin', 'siswa.agama', 'siswa.alamat')
                  ->where('users.username', $id)
                  ->first();
        return $data;
    }

    public function siswa()
    {
    	return $this->belongsTo(M_siswa::class, 'username');
    }

    public function getFullName($status, $username)
    {
        if ($status == 1) {
            $data = M_guru::where('username', $username)->first();
            return $data->nama_guru;
        }
        else
        {
            $data = M_siswa::where('username', $username)->first();
            return $data->nama;
        }
    }

    public function getDataProfile($status, $username)
    {
        if ($status == 1) {
            $data = DB::table('tbl_users as users')
                      ->join('tbl_guru as guru','users.username','=','guru.username')
                      ->select('users.id','users.username', 'users.password', 'guru.kode_guru', 'guru.nama_guru', 'guru.jenis_kelamin', 'guru.tempat_lahir', 'guru.tanggal_lahir', 'guru.alamat')
                      ->where('users.username', $username)
                      ->first();
        }
        else
        {
            $data = DB::table('tbl_users as users')
                      ->join('tbl_siswa as siswa','users.username','=','siswa.username')
                      ->select('users.id','users.username', 'users.password', 'siswa.NIS', 'siswa.nama', 'siswa.tempat_lahir', 
                        'siswa.tanggal_lahir', 'siswa.jenis_kelamin', 'siswa.agama', 'siswa.alamat')
                      ->where('users.username', $username)
                      ->first();
        }

        return $data;

    }

}
