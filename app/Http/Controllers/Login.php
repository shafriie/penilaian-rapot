<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\M_login;
use Illuminate\Support\Facades\Session;

class Login extends Controller
{
    public function submit(Request $request)
    {
        $login = new M_login();
    	$data = M_login::where('username', $request->username)->count();
    	if ($data > 0) {
    		$result = M_login::where('username', $request->username)
                             ->where('password', $request->password)->count();
    		if ($result > 0) {
                $dataLogin = M_login::where('username', $request->username)
                             ->where('password', $request->password)->first();
                $name = $login->getFullName($dataLogin->status, $dataLogin->username);

                Session::put('fullName', $name);
                Session::put('username', $dataLogin->username);
                Session::put('usersStatus', $dataLogin->status);
                Session::put('ketStatus', $dataLogin->ket_status);
                Session::put('isLoggedTrue', true);
                return redirect('dashboard');
    		}
    		else
    		{
    			Session::flash('message', "The password incorrect. Please try again!"); 
				Session::flash('color', 'red'); 
				return redirect('login');
    		}
    	}
    	else
    	{
    		Session::flash('message', "Username doesn't exist. Please try again!"); 
			Session::flash('color', 'red'); 
			return redirect('login');
    	}
    }

}
