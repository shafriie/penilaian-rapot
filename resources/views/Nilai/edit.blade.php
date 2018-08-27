@extends('Layout/layout')


@section('title','Sistem Penilaian Raport')

@section('page-header','Edit Nilai')

@section('content')

<form action="{{ url('nilai/update/'.Crypt::encrypt($data->id_nilai) ) }}" method="POST">
{{ csrf_field() }}
{{ method_field('PUT') }}
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="NIS">NIS</label>
        <select name="NIS" id="NIS" required class="form-control" readonly>
            <option value="">-- Pilih --</option>
            <?php foreach ($siswa as $key => $value) { ?>  
            <?php if($data->NIS == $value->NIS){ $p='selected'; } else{ $p=''; } ?>
            <option value="<?= $value->NIS ?>" <?= $p ?> ><?= $value->nama . " (" . $value->NIS . ")" ?></option>
            <?php } ?>
        </select>
      </div>
    </div>

    <div class="col-md-6">
     <div class="form-group">
      <label for="kelas">Kelas</label>
      <select name="kelas" id="kelas" required class="form-control">
        <option value="">-- Pilih --</option>
        <?php foreach($kelas as $key => $value){ ?>
        <?php if($data->kelas == $value->nama_kelas){ $p='selected'; } else{ $p=''; } ?>
        <option value="<?= $value->nama_kelas ?>" <?= $p; ?> ><?= $value->nama_kelas ?></option>
        <?php } ?>
      </select>
    </div>
    </div>

    <div class="col-md-6">
     <div class="form-group">
      <label for="semester">Semester</label>
      <select name="semester" id="semester" required class="form-control">
        <option value="">-- Pilih --</option>
        <?php $dataSemester = ['Ganjil','Genap']; ?>
        <?php for ($i=0; $i < count($dataSemester) ; $i++) { ?>
        <?php if($data->semester == $dataSemester[$i]){ $p='selected'; } else{ $p=''; } ?>
        <option value="<?= $dataSemester[$i] ?>" <?= $p ?> ><?= $dataSemester[$i] ?></option>
        <?php } ?>
      </select>
    </div>
    </div>

    <div class="col-md-6">
     
    </div>

    <div class="col-md-12">
      <h4>Input Nilai</h4>
      <hr>
    </div>

    <div class="col-md-4">
     <div class="form-group">
      <label for="agama">Agama Islam</label>
      <input type="number" name="agama" id="agama" class="form-control" placeholder="Agama Islam" required value="{{ $data->agama_islam }}">
    </div>
    </div>

    <div class="col-md-4">
     <div class="form-group">
      <label for="pkn">PKN</label>
      <input type="number" name="pkn" id="pkn" class="form-control" placeholder="PKN" required value="{{ $data->pkn }}">
    </div>
    </div>

    <div class="col-md-4">
     <div class="form-group">
      <label for="b_indo">Bahasa Indonesia</label>
      <input type="number" name="b_indo" id="b_indo" class="form-control" placeholder="Bahasa Indonesia" required value="{{ $data->b_indo }}">
    </div>
    </div>

    <div class="col-md-4">
     <div class="form-group">
      <label for="b_inggris">Bahasa Inggris</label>
      <input type="number" name="b_inggris" id="b_inggris" class="form-control" placeholder="Bahasa Inggris"  required value="{{ $data->b_inggris }}">
    </div>
    </div>

    <div class="col-md-4">
     <div class="form-group">
      <label for="mtk">Matematika</label>
      <input type="number" name="mtk" id="mtk" class="form-control" placeholder="Matematika" required value="{{ $data->mtk }}">
    </div>
    </div>

    <div class="col-md-4">
     <div class="form-group">
      <label for="ipa">Ilmu Pengetahuan Alam</label>
      <input type="number" name="ipa" id="ipa" class="form-control" placeholder="Ilmu Pengetahuan Alam" required value="{{ $data->ipa }}">
    </div>
    </div>

    <div class="col-md-4">
     <div class="form-group">
      <label for="ips">Ilmu Pengetahuan Sosial</label>
      <input type="number" name="ips" id="ips" class="form-control" placeholder="Ilmu Pengetahuan Sosial"  required value="{{ $data->ips }}">
    </div>
    </div>

    <div class="col-md-4">
     <div class="form-group">
      <label for="seni_budaya">Seni Budaya</label>
      <input type="number" name="seni_budaya" id="seni_budaya" class="form-control" placeholder="Seni Budaya" required value="{{ $data->seni_budaya }}">
    </div>
    </div>

    <div class="col-md-4">
     <div class="form-group">
      <label for="penjaskes">Penjaskes</label>
      <input type="number" name="penjaskes" id="penjaskes" class="form-control" placeholder="Penjaskes" required value="{{ $data->penjaskes }}">
    </div>
    </div>

    <div class="col-md-4">
     <div class="form-group">
      <label for="tik">TIK</label>
      <input type="number" name="tik" id="tik" class="form-control" placeholder="TIK" required value="{{ $data->tik }}">
    </div>
    </div>

    <div class="col-md-4">
     <div class="form-group">
      <label for="plkj">PLKJ</label>
      <input type="number" name="plkj" id="plkj" class="form-control" placeholder="PLKJ" required value="{{ $data->plkj }}">
    </div>
    </div>

    <div class="col-md-4">
     <div class="form-group">
      <label for="tata_busana">Tata Busana</label>
      <input type="number" name="tata_busana" id="tata_busana" class="form-control" placeholder="Tata Busana" required value="{{ $data->tata_busana }}">
    </div>
    </div>

    <div class="col-md-12">
     <div class="form-group">
      <label for="nilai_akhir">Nilai Akhir</label>
      <input type="number" name="nilai_akhir" id="nilai_akhir" class="form-control" placeholder="Nilai Akhir" required value="{{ $data->NA }}">
    </div>
    </div>

  </div>
  
  <div class="form-group">
    <button class="btn mybutton btn-sm" type="submit"><i class="fa fa-save"></i> Save</button>
    <button class="btn mybutton btn-sm" onclick="location.href='{{ url('nilai') }}'" type="button"><i class="fa fa-caret-square-o-left"></i> Back</button>
  </div>

</form>

@endsection