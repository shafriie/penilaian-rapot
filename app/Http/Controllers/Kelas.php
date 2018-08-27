<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\M_kelas;
use Illuminate\Support\Facades\Crypt;

class Kelas extends Controller
{
    public function index()
    {
    	$data = M_kelas::all();
    	return view('Kelas/kelas', ['data' => $data]);
    }

    public function insert(Request $request)
    {
    	$kelas = new M_kelas();
    	$kelas->nama_kelas = $request->nama_kelas;
    	$kelas->wali_kelas = $request->wali_kelas;
    	$kelas->save();
    	return redirect('kelas');
    }

    public function edit($valueID)
    {
    	$id = Crypt::decrypt($valueID);
    	$data['data'] = M_kelas::where('id_kelas', $id)->first();
    	return view('Kelas/edit',$data);
    }

    public function update($valueID, Request $request)
    {
    	$id = Crypt::decrypt($valueID);
    	$data = M_kelas::where('id_kelas', $id)->update([
    		'nama_kelas' => $request->nama_kelas,
    		'wali_kelas' => $request->wali_kelas,
    	]);
    	return redirect('kelas');
    }	

    public function delete($id_kelas)
    {
    	$id = Crypt::decrypt($id_kelas);
    	$data = M_kelas::where('id_kelas', $id)->delete();
    	return redirect('kelas');
    }

}
