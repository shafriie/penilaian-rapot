@extends('Layout/layout')

@section('title','Sistem Penilaian Rapot')

@section('page-header','Data Nilai')

@section('content')

<table id="list-data" class="table table-responsive table-bordered table-responsive-sm table-hover">
	<a class="btn mybutton btn-sm" href="{{ url('nilai/add') }}"><i class="fa fa-plus"></i> Add Data</a> <br><br>
	<thead>
		<tr bgcolor="#e63900" style="color:white;font-weight: bold">
			<th>No</th>
			<th>Nama</th>
			<th>Kelas</th>
			<th>Semester</th>
			<th>Agama Islam</th>
			<th>PKN</th>
			<th>B Indo</th>
			<th>B Inggris</th>
			<th>MTK</th>
			<th>IPA</th>
			<th>IPS</th>
			<th>Seni Budaya</th>
			<th>Penjaskes</th>
			<th>TIK</th>
			<th>PLKJ</th>
			<th>Tata Busana</th>
			<th>Nilai Akhir</th>
			<th width="200">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=0;  ?>
		@foreach ($data as $dataRows)
		<?php $no++; ?>
		<tr>
			<td>{{ $no }}</th>
			<td>{{ $dataRows->nama }}</td>
			<td>{{ $dataRows->kelas }}</td>
			<td>{{ $dataRows->semester }}</td>
			<td>{{ $dataRows->agama_islam }}</td>
			<td>{{ $dataRows->pkn }}</td>
			<td>{{ $dataRows->b_indo }}</td>
			<td>{{ $dataRows->b_inggris }}</td>
			<td>{{ $dataRows->mtk }}</td>
			<td>{{ $dataRows->ipa }}</td>
			<td>{{ $dataRows->ips }}</td>
			<td>{{ $dataRows->seni_budaya }}</td>
			<td>{{ $dataRows->penjaskes }}</td>
			<td>{{ $dataRows->tik }}</td>
			<td>{{ $dataRows->plkj }}</td>
			<td>{{ $dataRows->tata_busana }}</td>
			<td>{{ $dataRows->NA }}</td>
			<td align="center">
				<a class="btn mybutton btn-sm" href="{{ url('nilai/edit/'.Crypt::encrypt($dataRows->id_nilai)) }}" title="Edit Data" ><i class="fa fa-pencil"></i></a>
				<br>
				<br>
				<a class="btn mybutton btn-sm" title="Delete Data" onclick="return confirm('Apakah anda ingin menghapus data ini?')" href="{{ url('nilai/delete/'.Crypt::encrypt($dataRows->id_nilai)) }}"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@endsection

@section('javascript')

<script type="text/javascript">
	$(document).ready(function() {
		$('#list-data').DataTable({
			"responsive": true
		});
	});
</script>

@endsection