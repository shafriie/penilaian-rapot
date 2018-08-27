<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\M_siswa;
use App\Http\Model\M_login;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Validator;

class Siswa extends Controller
{
    public function index()
    {
    	$siswa = new M_login();
    	$data['data'] = $siswa->getData();
    	return view('Siswa/siswa', $data);
	}

	public function insert(Request $request)
	{
		$siswa = new M_siswa();

		$input = $request->all();
        $rules = array(
                        'username' => 'required|unique:tbl_users,username',
                    );
        $messages = array(
                        'username.unique' => 'Username sudah ada. Silahkan masukan username yang lain',
                    );
        $labelName = array(
            
        );

        $validator = Validator::make($input, $rules, $messages);
        $validator->setAttributeNames($labelName);

        if ($validator->fails()) {
        	return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
        	$siswa->NIS = $request->NIS;
			$siswa->username = $request->username;
			$siswa->nama = $request->nama;
			$siswa->tempat_lahir = $request->tempat_lahir;
			$siswa->tanggal_lahir = $request->tgl_lahir;
			$siswa->jenis_kelamin = $request->jenis_kelamin;
			$siswa->agama = $request->agama;
			$siswa->alamat = $request->alamat;
			$siswa->save();

			$users = new M_login();
			$users->username = $request->username;
			$users->password = $request->password;
			$users->status = 2;
			$users->ket_status = 'Siswa';
			$users->save();

			return redirect('siswa');
        }
	}

	public function edit($id)
	{
		$valueID = Crypt::decrypt($id);
		$siswa = new M_login();
		$data['data'] = $siswa->getDataWhere($valueID);
		return view('siswa/edit',$data);
	}

	public function update($valUsername, Request $request)
	{
		$username = Crypt::decrypt($valUsername);
		$siswa = M_siswa::where('username', $username)
						->update([
							'NIS' 			=> $request->NIS, 
							'nama' 			=> $request->nama, 
							'tempat_lahir' 	=> $request->tempat_lahir,
							'tanggal_lahir' => $request->tgl_lahir,
							'jenis_kelamin' => $request->jenis_kelamin,
							'agama' 		=> $request->agama,
							'alamat' 		=> $request->alamat,
						]);
		
		$users = M_login::where('username', $username)
				        ->update([
				        	'password' => $request->password
				        ]);

		return redirect('siswa');
	}

	public function delete($id)
	{
		$valueID = Crypt::decrypt($id);
		$siswa = M_siswa::where('username', $valueID)->delete();
		return redirect('siswa');
	}

}
