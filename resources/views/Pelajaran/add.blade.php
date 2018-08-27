@extends('Layout/layout')


@section('title','Sistem Penilaian Raport')

@section('page-header','Add Mata Pelajaran')

@section('content')

<form action="{{ url('pelajaran/insert') }}" method="POST">
{{ csrf_field() }}
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="kd_mapel">Kode Mata Pelajaran</label>
        <input type="text" id="kd_mapel" name="kd_mapel" class="form-control" placeholder="Kode Mata Pelajaran" autofocus>
        @if ($errors->has('kd_mapel'))<span class="errorActive">{{ $errors->first('kd_mapel') }}</span>@endif
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label for="mapel">Mata Pelajaran</label>
        <input type="text" id="mapel" name="mapel" class="form-control" placeholder="Mata Pelajaran">
        @if ($errors->has('mapel'))<span class="errorActive">{{ $errors->first('mapel') }}</span>@endif
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label for="kkm">KKM</label>
        <input type="text" placeholder="KKM" name="kkm" id="kkm" class="form-control">
        @if ($errors->has('kkm'))
          <span class="errorActive">{{ $errors->first('kkm') }}</span>
        @endif
      </div>
    </div>

  </div>
  
  <div class="form-group">
    <button class="btn mybutton btn-sm" type="submit"><i class="fa fa-save"></i> Save</button>
    <button class="btn mybutton btn-sm" onclick="location.href='{{ url('pelajaran') }}'" type="button"><i class="fa fa-caret-square-o-left"></i> Back</button>
  </div>

</form>

@endsection