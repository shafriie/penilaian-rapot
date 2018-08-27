<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Logout extends Controller
{
    public function index()
    {
    	Session::flush();
    	return redirect('login');
    }
}
