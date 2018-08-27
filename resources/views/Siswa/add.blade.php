@extends('Layout/layout')


@section('title','Sistem Penilaian Raport')

@section('page-header','Add Siswa')

@section('content')

<form action="{{ url('siswa/insert') }}" method="POST">
{{ csrf_field() }}
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="username">Username</label>
        <input required type="text" id="username" name="username" class="form-control" placeholder="Username" autofocus>
        @if ($errors->has('username'))
          <span class="errorActive">{{ $errors->first('username') }}</span>
        @endif
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="password">Password</label>
        <input required type="password" id="password" name="password" class="form-control" placeholder="Password">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="NIS">NIS</label>
        <input type="text" placeholder="NIS" name="NIS" id="NIS" required class="form-control">
      </div>
    </div>

    <div class="col-md-6">
     <div class="form-group">
      <label for="nama">Nama Lengkap</label>
      <input type="text" name="nama" placeholder="Nama Lengkap" name="nama" id="nama" required class="form-control">
    </div>
    </div>

    <div class="col-md-6">
     <div class="form-group">
      <label for="tempat_lahir">Tempat Lahir</label>
      <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" name="tempat_lahir" id="tempat_lahir" required class="form-control">
    </div>
    </div>

    <div class="col-md-6">
     <div class="form-group">
      <label for="tgl_lahir">Tanggal Lahir</label>
      <input type="date" name="tgl_lahir" placeholder="Tanggal Lahir" name="tgl_lahir" id="tgl_lahir" required class="form-control">
    </div>
    </div>

    <div class="col-md-6">
     <div class="form-group">
      <label for="jenis_kelamin">Jenis Kelamin</label>
      <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
        <option value="">-- Pilih --</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
      </select>
    </div>
    </div>

    <div class="col-md-6">
     <div class="form-group">
      <label for="agama">Agama</label>
      <select name="agama" id="agama" class="form-control" required>
        <option value="">-- Pilih --</option>
        <?php 
          $dataAgama = ['Islam','Kristen','Hindu','Buddha','KongHucu']; 
          for ($i = 0; $i < count($dataAgama) ; $i++){
        ?>
        <option value="<?= $dataAgama[$i] ?>"><?= $dataAgama[$i] ?></option>
        <?php } ?>
        
      </select>
    </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" rows="5" name="alamat" id="alamat" required placeholder="Alamat"></textarea>
      </div>
    </div>

  </div>
  
  <div class="form-group">
    <button class="btn mybutton btn-sm" type="submit"><i class="fa fa-save"></i> Save</button>
    <button class="btn mybutton btn-sm" onclick="location.href='{{ url('siswa') }}'" type="button"><i class="fa fa-caret-square-o-left"></i> Back</button>
  </div>

</form>

@endsection