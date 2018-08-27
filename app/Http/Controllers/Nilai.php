<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\M_nilai;
use App\Http\Model\M_siswa;
use App\Http\Model\M_kelas;
use Illuminate\Support\Facades\Crypt;

class Nilai extends Controller
{
    public function index()
    {
    	$nilai = new M_nilai();
    	$data = $nilai->getDataNilai();
    	return view('Nilai/nilai', ['data' => $data]);
    }

    public function add()
    {
    	$data['siswa'] = M_siswa::get();
    	$data['kelas'] = M_kelas::get();
    	return view('Nilai.add', $data);
    }

    public function insert(Request $request)
    {
    	$nilai = new M_nilai();
    	$nilai->NIS = $request->NIS;
    	$nilai->kelas = $request->kelas;
    	$nilai->semester = $request->semester;
    	$nilai->agama_islam = $request->agama;
    	$nilai->pkn = $request->pkn;
    	$nilai->b_indo = $request->b_indo;
    	$nilai->b_inggris = $request->b_inggris;
    	$nilai->mtk = $request->mtk;
    	$nilai->ipa = $request->ipa;
    	$nilai->ips = $request->ips;
    	$nilai->seni_budaya = $request->seni_budaya;
    	$nilai->penjaskes = $request->penjaskes;
    	$nilai->tik = $request->tik;
    	$nilai->plkj = $request->plkj;
    	$nilai->tata_busana = $request->tata_busana;
    	$nilai->NA = $request->nilai_akhir;
    	$nilai->save();
    	return redirect('nilai');
    }

    public function delete($id)
    {
    	$id_nilai = Crypt::decrypt($id);
    	$data = M_nilai::where('id_nilai', $id_nilai)->delete();
    	return redirect('nilai');
    }

    public function edit($id)
    {
    	$id_nilai = Crypt::decrypt($id);

    	$nilai = new M_nilai();
    	$data['data'] = $nilai->getWhereDataNilai($id_nilai);
    	$data['siswa'] = M_siswa::get();
    	$data['kelas'] = M_kelas::get();
    	return view('Nilai.edit', $data);
    }

    public function update($valueID, Request $request)
    {
    	$id = Crypt::decrypt($valueID);
    	$data = M_nilai::where('id_nilai', $id)->update([
    		'kelas' => $request->kelas,
    		'semester' => $request->semester,
    		'agama_islam' => $request->agama,
    		'pkn' => $request->pkn,
    		'b_indo' => $request->b_indo,
    		'b_inggris' => $request->b_inggris,
    		'mtk' => $request->mtk,
    		'ipa' => $request->ipa,
    		'ips' => $request->ips,
    		'seni_budaya' => $request->seni_budaya,
    		'penjaskes' => $request->penjaskes,
    		'tik' => $request->tik,
    		'plkj' => $request->plkj,
    		'tata_busana' => $request->tata_busana,
    		'NA' => $request->nilai_akhir,
    	]);
    	return redirect('nilai');
    }

}
