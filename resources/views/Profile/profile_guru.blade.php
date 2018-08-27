@extends('Layout/layout')


@section('title','Sistem Penilaian Raport')

@section('page-header','My Profile')

@section('content')

<form action="{{ url('profile/update/guru/'.Crypt::encrypt($data->username)) }}" method="POST">
{{ csrf_field() }}
{{ method_field('PUT') }}
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="username">Username</label>
        <input required type="text" id="username" name="username" class="form-control" placeholder="Username" value="<?= $data->username ?>" readonly>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="password">Password</label>
        <input required type="password" id="password" name="password" class="form-control" placeholder="Password" value="<?= $data->password ?>" autofocus>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="kode_guru">Kode Guru</label>
        <input type="text" placeholder="Kode Guru" name="kode_guru" id="kode_guru" required class="form-control" value="<?= $data->kode_guru ?>">
      </div>
    </div>

    <div class="col-md-6">
     <div class="form-group">
      <label for="nama">Nama Lengkap</label>
      <input type="text" name="nama" placeholder="Nama Lengkap" name="nama" id="nama" required class="form-control" value="<?= $data->nama_guru ?>">
    </div>
    </div>

    <div class="col-md-6">
     <div class="form-group">
      <label for="tempat_lahir">Tempat Lahir</label>
      <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" name="tempat_lahir" id="tempat_lahir" required class="form-control" value="<?= $data->tempat_lahir ?>">
    </div>
    </div>

    <div class="col-md-6">
     <div class="form-group">
      <label for="tgl_lahir">Tanggal Lahir</label>
      <input type="date" name="tgl_lahir" placeholder="Tanggal Lahir" name="tgl_lahir" id="tgl_lahir" required class="form-control" value="<?= $data->tanggal_lahir ?>">
    </div>
    </div>

    <div class="col-md-12">
     <div class="form-group">
      <label for="jenis_kelamin">Jenis Kelamin</label>
      <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
        <option value="">-- Pilih --</option>
        <option value="Laki-laki" <?= ($data->jenis_kelamin == 'Laki-laki'?'selected':'') ?>>Laki-laki</option>
        <option value="Perempuan" <?= ($data->jenis_kelamin == 'Perempuan'?'selected':'') ?>>Perempuan</option>
      </select>
    </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" rows="5" name="alamat" id="alamat" required placeholder="Alamat"><?= $data->alamat ?></textarea>
      </div>
    </div>

  </div>
  
  <div class="form-group">
    <button class="btn mybutton btn-sm" type="submit"><i class="fa fa-save"></i> Save Profile</button>
    {{-- <button class="btn mybutton btn-sm" onclick="location.href='{{ url('siswa') }}'" type="button"><i class="fa fa-caret-square-o-left"></i> Back</button> --}}
  </div>

</form>

@endsection