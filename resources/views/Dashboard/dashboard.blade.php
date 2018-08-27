@extends('Layout/layout')


@section('title','Sistem Penilaian Rapot')

@section('page-header','Dashboard')

@section('content')

<h5 style="font-family: verdana">Selamat datang {{ Session::get('fullName') }}. <br><br> Anda login sebagai {{ Session::get('ketStatus') }}</h5>
<br><br>


@if (Session::get('usersStatus') == 1)
<div class="row">
	<div class="col-md-6">
		<div class="card bg-warning text-white" style="padding: 15px;font-weight: bold">
			<div class="card-body">Jumlah Siswa : {{ $siswa }}</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card bg-primary text-white" style="padding: 15px;font-weight: bold">
			<div class="card-body">Total Mata Pelajaran : {{ $pelajaran }}</div>
		</div>
	</div>
</div>

<div class="row" style="margin-top: 40px">
	<div class="col-md-6">
		<div class="card bg-success text-white" style="padding: 15px;font-weight: bold">
			<div class="card-body">Jumlah Kelas : {{ $kelas }}</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card bg-danger text-white" style="padding: 15px;font-weight: bold">
			<div class="card-body">Nilai yang Sudah Masuk : {{ $nilai }}</div>
		</div>
	</div>
</div>
@endif

@endsection

@section('javascript')

<script type="text/javascript">
	$(document).ready(function() {
		$('#list-data').DataTable();
	});
</script>

@endsection