<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Model\M_siswa;

class M_nilai extends Model
{
    protected $table = 'tbl_nilai';

    protected $fillable = ['NIS','kelas','semester','agama_islam','pkn','b_indo','b_inggris','mtk','ipa','ips','seni_budaya','penjaskes','tik','plkj','tata_busana','NA'];

    public $timestamps = false;

    public function getNisSiswa($username)
    {
        $data = M_siswa::where('username', $username)->first();
        return @$data->NIS;
    }

    public function getDataNilai()
    {
        $status = Session::get('usersStatus');
        $username = Session::get('username');
        $nis = $this->getNisSiswa($username);
        if ($status == 1) {
            $data = DB::table('tbl_nilai as nilai')->join('tbl_siswa as siswa','nilai.NIS','=','siswa.NIS')
                                                   ->select('nilai.id_nilai','siswa.nama','nilai.kelas','nilai.semester','nilai.agama_islam','nilai.pkn','nilai.b_indo','nilai.b_inggris','nilai.mtk','nilai.ipa','nilai.ips','nilai.seni_budaya','nilai.penjaskes','nilai.tik','nilai.plkj','nilai.tata_busana','nilai.NA')
                                                   ->get();
        }
        else
        {
            $data = DB::table('tbl_nilai as nilai')->join('tbl_siswa as siswa','nilai.NIS','=','siswa.NIS')
                                                   ->select('nilai.id_nilai','siswa.nama','nilai.kelas','nilai.semester','nilai.agama_islam','nilai.pkn','nilai.b_indo','nilai.b_inggris','nilai.mtk','nilai.ipa','nilai.ips','nilai.seni_budaya','nilai.penjaskes','nilai.tik','nilai.plkj','nilai.tata_busana','nilai.NA')
                                                   ->where('siswa.NIS', $nis)
                                                   ->get();
        }
        
        return $data;
    }

    public function getWhereDataNilai($id_nilai)
    {
    	$data = DB::table('tbl_nilai as nilai')->join('tbl_siswa as siswa','nilai.NIS','=','siswa.NIS')
    									       ->select('nilai.id_nilai','nilai.NIS','siswa.nama','nilai.kelas','nilai.semester','nilai.agama_islam','nilai.pkn','nilai.b_indo','nilai.b_inggris','nilai.mtk','nilai.ipa','nilai.ips','nilai.seni_budaya','nilai.penjaskes','nilai.tik','nilai.plkj','nilai.tata_busana','nilai.NA')
    									       ->where('nilai.id_nilai', $id_nilai)
    									       ->first();
    	return $data;
    }

}
