<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\M_login;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use App\Http\Model\M_guru;
use App\Http\Model\M_siswa;

class Profile extends Controller
{
    public function index()
    {
    	$username = Session::get('username');
    	$status = Session::get('usersStatus');
    	$users = new M_login();

    	$data['data'] = $users->getDataProfile($status, $username);
    	if ($status == 1) {
    		return view('Profile/profile_guru', $data);
    	}
    	else
    	{
    		return view('Profile/profile_siswa', $data);
    	}
    }

    public function updateGuru($valueID, Request $request)
    {
    	$id = Crypt::decrypt($valueID);
    	$guru = M_guru::where('username', $id)->update([
    		'nama_guru' => $request->nama,
    		'jenis_kelamin' => $request->jenis_kelamin,
    		'tempat_lahir' => $request->tempat_lahir,
    		'tanggal_lahir' => $request->tgl_lahir,
    		'alamat' => $request->alamat
    	]);

    	$users = M_login::where('username', $id)->update([
    		'password' => $request->password
    	]);

    	return redirect('profile');
    }

    public function updateSiswa($valUsername, Request $request)
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

		return redirect('profile');
	}

}
