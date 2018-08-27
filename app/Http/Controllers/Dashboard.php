<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Model\M_siswa;
use App\Http\Model\M_pelajaran;
use App\Http\Model\M_kelas;
use App\Http\Model\M_nilai;

class Dashboard extends Controller
{
    public function index()
    {
    	$data['siswa'] = M_siswa::count();
    	$data['pelajaran'] = M_pelajaran::count();
    	$data['kelas'] = M_kelas::count();
    	$data['nilai'] = M_nilai::count();
    	return view('Dashboard/dashboard', $data);
    }
}
