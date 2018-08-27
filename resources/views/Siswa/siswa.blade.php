@extends('Layout/layout')


@section('title','Sistem Penilaian Rapot')

@section('page-header','Data Siswa')

@section('content')

<table id="list-data" class="table table-bordered table-hover table-responsive">
	<a class="btn mybutton btn-sm" href="{{ url('siswa/add') }}"><i class="fa fa-plus"></i> Add Data</a> <br><br>
	<thead>
		<tr bgcolor="#e63900" style="color:white;font-weight: bold">
			<th>No</th>
			<th>Username</th>
			<th>Password</th>
			<th>Nama</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Agama</th>
			<th>Alamat</th>
			<th width="90">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=0;  ?>
		@foreach ($data as $dataRows)
		<?php $no++; ?>
		<tr>
			<td>{{ $no }}</th>
			<td>{{ $dataRows->username }}</td>
			<td>{{ $dataRows->password }}</td>
			<td>{{ $dataRows->nama }}</td>
			<td>{{ $dataRows->tempat_lahir }}</td>
			<td>{{ $dataRows->tanggal_lahir }}</td>
			<td>{{ $dataRows->jenis_kelamin }}</td>
			<td>{{ $dataRows->agama }}</td>
			<td>{{ $dataRows->alamat }}</td>
			<td align="center">
				<a class="btn mybutton btn-sm" href="{{ url('siswa/edit/'.Crypt::encrypt($dataRows->username)) }}" title="Edit Data" ><i class="fa fa-pencil"></i></a>
				&nbsp;
				<a class="btn mybutton btn-sm" title="Delete Data" onclick="return confirm('Apakah anda ingin menghapus data ini?')" href="{{ url('siswa/delete/'.Crypt::encrypt($dataRows->username)) }}"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@endsection

@section('javascript')

<script type="text/javascript">
	$(document).ready(function() {
		$('#list-data').DataTable();
	});
</script>

@endsection