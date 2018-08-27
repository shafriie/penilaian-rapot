@extends('Layout/layout')

@section('title','Sistem Penilaian Rapot')

@section('page-header','Laporan Nilai')

@section('content')

<table id="list-data" class="table table-bordered table-hover table-responsive">
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
		</tr>
		@endforeach
	</tbody>
</table>

@endsection

@section('javascript')

<script type="text/javascript">
	$(document).ready(function() {
		$('#list-data').DataTable({
			dom: 'Bfrtip',
	        buttons: [
	            'copy', 'csv', 'excel', 'pdf', 'print'
	        ]
		});
	});
</script>

@endsection