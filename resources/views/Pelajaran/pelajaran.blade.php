@extends('Layout/layout')


@section('title','Sistem Penilaian Rapot')

@section('page-header','Mata Pelajaran')

@section('content')

<table id="list-data" class="table table-bordered table-hover">
	<a class="btn mybutton btn-sm" href="{{ url('pelajaran/add') }}"><i class="fa fa-plus"></i> Add Data</a> <br><br>
	<thead>
		<tr bgcolor="#e63900" style="color:white;font-weight: bold">
			<th>No</th>
			<th>Kode Mata Pelajaran</th>
			<th>Mata Pelajaran</th>
			<th>KKM</th>
			<th width="90">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=0;  ?>
		@foreach ($data as $dataRows)
		<?php $no++; ?>
		<tr>
			<td>{{ $no }}</th>
			<td>{{ $dataRows->kode_matapelajaran }}</td>
			<td>{{ $dataRows->mata_pelajaran }}</td>
			<td>{{ $dataRows->kkm }}</td>
			<td align="center">
				<a class="btn mybutton btn-sm" href="{{ url('pelajaran/edit/'.Crypt::encrypt($dataRows->kode_matapelajaran)) }}" title="Edit Data" ><i class="fa fa-pencil"></i></a>
				&nbsp;
				<a class="btn mybutton btn-sm" title="Delete Data" onclick="return confirm('Apakah anda ingin menghapus data ini?')" href="{{ url('pelajaran/delete/'.Crypt::encrypt($dataRows->kode_matapelajaran)) }}"><i class="fa fa-trash"></i></a>
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