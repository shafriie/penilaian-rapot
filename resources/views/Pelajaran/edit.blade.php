@extends('Layout/layout')

@section('title','Sistem Penilaian Raport')

@section('page-header','Edit Mata Pelajaran')

@section('content')

<form action="{{ url('pelajaran/update/'. Crypt::encrypt($data->kode_matapelajaran) ) }}" method="POST">
{{ csrf_field('PUT') }}
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="kd_mapel">Kode Mata Pelajaran</label>
        <input required type="text" id="kd_mapel" name="kd_mapel" class="form-control" placeholder="Kode Mata Pelajaran" readonly value="{{ $data->kode_matapelajaran }}">
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label for="mapel">Mata Pelajaran</label>
        <input type="text" id="mapel" name="mapel" class="form-control" placeholder="Mata Pelajaran" value="{{ $data->mata_pelajaran }}" autofocus>
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label for="kkm">KKM</label>
        <input type="number" placeholder="KKM" name="kkm" id="kkm" class="form-control" value="{{ $data->kkm }}">
      </div>
    </div>

  </div>
  
  <div class="form-group">
    <button class="btn mybutton btn-sm" type="submit"><i class="fa fa-save"></i> Save</button>
    <button class="btn mybutton btn-sm" onclick="location.href='{{ url('pelajaran') }}'" type="button"><i class="fa fa-caret-square-o-left"></i> Back</button>
  </div>

</form>

@endsection