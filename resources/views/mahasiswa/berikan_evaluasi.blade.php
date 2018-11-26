@extends('layouts/template')
@section('main-title','Dashboard Admin')
@section('sidebar')
  @include('mahasiswa/sidebar')
@endsection
@section('pull-right')
@endsection
@section('manajemen-title-kedua')
  <p style="font-size: 14px;">Selamat Datang Admin, Silahkan Gunakan Menu Yang Telah Disediakan Untuk Manajemen Halaman Admin</p>
@endsection
@section('content')

  <!-- FORM PENGISIAN KUISIONER -->
  <div class="row">
    <form action="{{ route('insert_kuisioner') }}" method="POST" id="kuisioner" style="display: ; ">
      {{ csrf_field() }}

      <input type="hidden" name="jumlah" value="<?php  $hitung = DB::table('tb_indikator_penilaian')->count(); echo $hitung ?>">
      <input type="hidden" name="npm" value="<?php echo Session::get('nip') ?>"> 
      <input type="hidden" name="id_kelas" value="{{ $data['data']['kelas'][0]['klsId'] }}"> 

      <div class="col-md-6">

        <div class="form-group">
          <label for="fakultas">MATA KULIAH:</label>
            <input type="text" disabled="disabled" name="nm_matkul" class="form-control" value="{{ $data['data']['kelas'][0]['matakuliah']['mkkurNamaResmi'] }}">
            <input type="hidden" name="nm_matkul2" class="form-control" value="{{ $data['data']['kelas'][0]['matakuliah']['mkkurNamaResmi'] }}">
            <input type="hidden" name="id_matkul" class="form-control" value="{{ $data['data']['kelas'][0]['matakuliah']['mkkurKode'] }}">
            <input type="hidden" name="semester" class="form-control" value="{{ $data['data']['kelas'][0]['klsSemId'] }}">

        </div>
      </div>
      <div class="col-md-6" style="display: ;" id="select_dosen">

        <div class="form-group ">
          <label for="pwd">DOSEN PENGAMPU:</label>
            <input type="text" disabled="disabled" name="nm_dosen" class="form-control" value="{{ $data['nama'] }}">
            <input type="hidden" name="nm_dosen2" class="form-control" value="{{ $data['nama'] }}">
            <input type="hidden" name="gelardepan" class="form-control" value="{{ $data['data']['kelas'][0]['dosen'][0]['pegawai']['pegGelarBelakang'] }}">
            <input type="hidden" name="gelarbelakang" class="form-control" value="{{ $data['data']['kelas'][0]['dosen'][0]['pegawai']['pegGelarDepan'] }}">
            <input type="hidden" name="nip" class="form-control" value="{{ $data['nip'] }}">

        </div>
      </div>
      <div class="col-md-12" id="form_evaluasi" style="max-height: 350px; overflow-y:auto; display: ;">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th class="bg-blue">No</th>
                    <th class="bg-blue">Indikator Penilaian</th>
                </tr>
            </thead>
                <?php 
                  $no = 1;
                  $data = DB::table('tb_indikator_penilaian')->get();
                  $nomor=0;
                  foreach ($data as $data) {
                    $nomor++;
                 ?>
                    <tbody>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data->indikator; ?>
                            <br>
                            <label for="" class="radio-inline">
                                <input type="radio" name="nilai{{ $nomor }}" value="5" required>Sangat Setuju <br>
                            </label>
                            <br>
                            <label for="" class="radio-inline">
                                <input type="radio" name="nilai{{ $nomor }}" value="4">Setuju <br>
                            </label>
                            <br>
                            <label for="" class="radio-inline">
                                <input type="radio" name="nilai{{ $nomor }}" value="3">Ragu-ragu <br>
                            </label>
                            <br>
                            <label for="" class="radio-inline">
                                <input type="radio" name="nilai{{ $nomor }}" value="2">Tidak Setuju <br>
                            </label>
                            <br>
                            <label for="" class="radio-inline">
                                <input type="radio" name="nilai{{ $nomor }}" value="1" >Sangat Tidak Setuju <br>   
                            </label>
                        </td>
                      </tr>
                  <?php 
                  
                  $no++;
                  }
                  ?>

                      <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title text-center" style="font-weight: bold; font-size: 20px;" >PESAN KONFIRMASI !!</h4>
                            </div>
                            <div class="modal-body text-center">
                              <p style="text-transform: uppercase; font-size: 20px;">Evaluasi yang anda berikan, tidak dapat diubah kembali</p>
                              <p>Apakah anda yakin ingin menyimpan ??</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger pull-left btn-flat btn-sm" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Close</button>
                              <button type="submit" name="submit" id="simpan" class="btn btn-primary btn-sm btn-flat" style="display: ;"><i class="fa fa-save"></i>&nbsp;Simpan</button>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->

                      <tr>
                        <td colspan="2">
                            <label for="pesan-teks">Masukan Pesan Untuk Dosen Yang Bersangkutan <a style="color: red;">*Required</a></label>

                             <textarea name="saran" id="saran" cols="30" rows="3" class="form-control" placeholder="Masukan Pesan Anda Disini" required=""></textarea></td>
                      </tr>
                    </tbody>
        </table>
      </div>
  </div>
  <!-- AKHIR FORM PENGISIAN KUISIONER -->



  <!-- FOOTER -->
  <div class="box-footer" id="box-footer" style="display: true">
    <div class="" style="margin-top: 5px;">
        <a href="" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-default"><i class="fa fa-save"></i>&nbsp; Simpan Kuisioner</a>
        <button type="reset" class="btn btn-danger btn-sm btn-flat" style="display: ;"><i class="fa fa-refresh"></i>&nbsp;Reset</button>
        <a href="{{ route('mahasiswa.dashboard') }}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-angle-down"></i>&nbsp; Lihat Petunjuk</a>

     </div>
    </form>
  </div>
  <!-- AKHIR FOOTER -->
@endsection