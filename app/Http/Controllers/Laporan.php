<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\M_nilai;

class Laporan extends Controller
{
    public function index()
    {
    	$nilai = new M_nilai();
    	$data = $nilai->getDataNilai();
    	return view('Laporan/laporan', ['data' => $data]);
    }
}
