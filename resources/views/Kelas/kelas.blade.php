@extends('Layout/layout')

@section('title','Sistem Penilaian Rapot')

@section('page-header','Data Kelas')

@section('content')

<table id="list-data" class="table table-bordered table-hover">
	<a class="btn mybutton btn-sm" href="{{ url('kelas/add') }}"><i class="fa fa-plus"></i> Add Data</a> <br><br>
	<thead>
		<tr bgcolor="#e63900" style="color:white;font-weight: bold">
			<th>No</th>
			<th>Nama Kelas</th>
			<th>Wali Kelas</th>
			<th width="90">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=0;  ?>
		@foreach ($data as $dataRows)
		<?php $no++; ?>
		<tr>
			<td>{{ $no }}</th>
			<td>{{ $dataRows->nama_kelas }}</td>
			<td>{{ $dataRows->wali_kelas }}</td>
			<td align="center">
				<a class="btn mybutton btn-sm" href="{{ url('kelas/edit/'.Crypt::encrypt($dataRows->id_kelas)) }}" title="Edit Data" ><i class="fa fa-pencil"></i></a>
				&nbsp;
				<a class="btn mybutton btn-sm" title="Delete Data" onclick="return confirm('Apakah anda ingin menghapus data ini?')" href="{{ url('kelas/delete/'.Crypt::encrypt($dataRows->id_kelas)) }}"><i class="fa fa-trash"></i></a>
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