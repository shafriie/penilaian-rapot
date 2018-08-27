<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Model\M_pelajaran;
use Illuminate\Support\Facades\Crypt;

class Pelajaran extends Controller
{
    public function index()
    {
    	$data = M_pelajaran::all();
    	return view('Pelajaran/pelajaran', ['data' => $data]);
    }

    public function insert(Request $request)
    {
        $input = $request->all();
        $rules = array(
                        'kd_mapel' => 'required|min:8|unique:tbl_matapelajaran,kode_matapelajaran',
                        'mapel'    => 'required',
                        'kkm'      => 'required|numeric'
                    );
        $messages = array(
                        'kd_mapel.unique'   => 'Kode Mata Pelajaran sudah ada',
                    );
        $labelName = array(
            'kd_mapel' => 'Kode Mata Pelajaran',
            'mapel'    => 'Mata Pelajaran',
            'kkm'      => 'KKM'
        );

        $validator = Validator::make($input, $rules, $messages);
        $validator->setAttributeNames($labelName);

        if ($validator->fails()) {
            return redirect('pelajaran/add')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
            $pelajaran = new M_pelajaran();
            $pelajaran->kode_matapelajaran = $request->kd_mapel;
            $pelajaran->mata_pelajaran = $request->mapel;
            $pelajaran->kkm = $request->kkm;
            $pelajaran->save();

            return redirect('pelajaran');
        }
    }

    public function edit($id)
    {
    	$valueID = Crypt::decrypt($id);
    	$data['data'] = M_pelajaran::where('kode_matapelajaran', $valueID)->first();
    	return view('Pelajaran/edit',$data);
    }

    public function update($id, Request $request)
    {
    	$valueID = Crypt::decrypt($id);

        $input = $request->all();

        $rules = array(
            'kd_mapel' => 'required', 
            'mapel' => 'required', 
            'kkm' => 'required|numeric', 
        );

        $message = array(

        );

        $labelName = array(
            'kd_mapel' => 'Kode Mata Pelajaran',
            'mapel'    => 'Mata Pelajaran',
            'kkm'      => 'KKM'

        );

        $validator = Validator::make($input, $rules, $message, $labelName);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        else
        {
            $pelajaran = M_pelajaran::where('kode_matapelajaran', $valueID)->update([
                'kode_matapelajaran' => $request->kd_mapel,
                'mata_pelajaran'             => $request->mapel,
                'kkm'                => $request->kkm,
            ]);

            return redirect('pelajaran');
        }


    	

    }

    public function delete($id)
    {
    	$valueID = Crypt::decrypt($id);
    	$pelajaran = M_pelajaran::where('kode_matapelajaran', $valueID)->delete();
    	return redirect('pelajaran');
    }

}
