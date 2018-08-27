<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="{{ asset('image/icon.png') }}">
	
	<title>@yield('title')</title>
</head>
<body>

<style>
.footer {
	padding: 20px;
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: black;
    color: white;
    text-align: center;
}
.mybutton {
	background-color: #e63900;color:white;font-weight:bold
}
.mybutton:hover{
	color: white;
}
.activeMenu{
	font-weight: bold
}
.errorActive{
	color:red;
	font-style: italic;
	font-size: 14px	
}
</style>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

<!-- Datatable -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<nav class="navbar navbar-expand-lg" style="background-color:#e63900;font-weight: bold;color: white ">
  <a class="navbar-brand" href="#" style="color: white">Sistem Penilaian Rapot</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
    </ul>
    <ul class="navbar-nav">
    	<li style="margin-right: 20px">
    		<a href="{{ url('profile') }}" class="mybutton"><i class="fa fa-user"></i> <b>My Profile</b></a>
    	</li>
    	<li style="margin-right: 20px">
    		<a href="{{ url('logout') }}" class="mybutton"><i class="fa fa-power-off"></i> <b>Logout</b></a>
    	</li>
    </ul>
  </div>
</nav>

<div class="container-fluid" style="margin-top: 3%">
	<div class="row">
		<div class="col-md-2">
			<ul class="list-group">
				<li class="list-group-item text-center" style="color:white;background-color: #e63900"><b>Menu Bar</b></li>
				<li class="list-group-item {{ Request::segment(1) == 'dashboard'?'activeMenu':'' }}"><a href="{{ url('dashboard') }}" style="text-decoration: none;color: black">Dashboard</a></li>
				<?php $status=Session::get('usersStatus'); if($status == 1){ ?>

				<li class="list-group-item {{ Request::segment(1) == 'siswa'?'activeMenu':'' }}"><a href="{{ url('siswa') }}" style="text-decoration: none;color: black">Data Siswa</a></li>
				<li class="list-group-item {{ Request::segment(1) == 'pelajaran'?'activeMenu':'' }}"><a href="{{ url('pelajaran') }}" style="text-decoration: none;color: black">Mata Pelajaran</a></li>
				<li class="list-group-item {{ Request::segment(1) == 'kelas'?'activeMenu':'' }}"><a href="{{ url('kelas') }}" style="text-decoration: none;color: black">Kelas</a></li>
				<li class="list-group-item {{ Request::segment(1) == 'nilai'?'activeMenu':'' }}"><a href="{{ url('nilai') }}" style="text-decoration: none;color: black">Mengelola Nilai</a></li>
				<?php } ?>
				
				<li class="list-group-item {{ Request::segment(1) == 'laporan'?'activeMenu':'' }}"><a href="{{ url('laporan') }}" style="text-decoration: none;color: black">Laporan Nilai</a></li>
			</ul>
		</div>
		<div class="col-md-10">
			
			<ul class="list-group">
				<li class="list-group-item text-left" style="color:white;background-color: #e63900"><b>@yield('page-header')</b></li>
				
			</ul>
			<hr>
			@yield('content')
		</div>
	</div>
	
</div>

<div align="center" style="padding:50px;margin-top: 20%;background-color: #e63900;color: white">
  <!-- Brand/logo -->
  <span align="center" class="text-center"><b>Sistem Penilaian Rapot Version 1.2.1 - Copyright&copy;<?= date('Y') ?> By Syafrie Syamsudin</b></span>
</div>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js
"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

{{-- javascript --}}
@yield('javascript')

</body>
</html>
