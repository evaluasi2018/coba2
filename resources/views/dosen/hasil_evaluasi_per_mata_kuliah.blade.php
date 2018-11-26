@extends('layouts/template')
@section('main-title','Dashboard Hasil Evaluasi Per Mata Kuliah')
@section('sidebar')
	@include('dosen/sidebar')
@endsection
@section('manajemen-title')
	<div class="box-header with-border">
        <h3 class="box-title" style="text-transform: uppercase;">Hasil Evaluasi Per Mata Kuliah</h3>
        <div class="box-tools pull-right">
            @yield('pull-right')
        </div>
    </div>
@endsection
@section('manajemen-title-kedua')
	<p style="font-size: 14px;">Selamat Datang Dosen, Silahkan Gunakan Menu Yang Telah Disediakan Untuk Manajemen Halaman Dosen</p>
@endsection
@section('content')
	<div class="panel panel-default" id="hasil">
	  <div class="panel-heading bg-blue">Hasil Evaluasi Per Mata Kuliah</div>
		  <div class="panel-body" style="max-height:500px;overflow: scroll;display: inline-block;width: 100%;">
			<form action="{{ route('dosen.api_hasil_evaluasi_per_mata_kuliah') }}" method="POST">
				{{ csrf_field() }}
				<div class="col-md-12">
					<label for="nm_matkul">Pilih Mata Kuliah</label>
					<select name="id_jadwal_perkuliahan" id="id_jadwal_perkuliahan" class="form-control" onchange="dosen_tampilkan_button_lihat()">
						<option value="0" selected="true" disabled="true">-- pilih mata kuliah --</option>
						<?php 
							
						?>
					</select>
				</div>
				<div class="col-md-12" style="margin-top: 5px;">
					<button type="submit" name="submit" class="btn bg-blue btn-flat" id="dosen-button-lihat" style="display:none; "><i class="fa fa-check"></i>&nbsp;Lihat Hasil</button></div>
			</form>
		  <div class="col-md-12" style="margin-top: 5px;">
		  	<table class="table table-bordered" id="table-hasil-evaluasi-per-mata-kuliah">
				<thead>
					<tr class="bg-blue">
						<th>No</th>
						<th>Mata Kuliah</th>
						<th>Prodi</th>
						<th>Fakultas</th>
						<th>Semester</th>
						<th>Tahun Ajaran</th>
						<th>Kelas</th>
						<th>Indikator Penilaian</th>
						<th>Nilai</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						if(isset($_POST['submit']))
						{
							$no=1;
							foreach ($hasil as $hasil) {
							?>
								<tr>
									<td>{{ $no }}</td>
									<td>{{ $hasil->nm_matkul }}</td>
									<td>{{ $hasil->nm_prodi }}</td>
									<td>{{ $hasil->nm_fakultas }}</td>
									<td>{{ $hasil->nm_semester }}</td>
									<td>{{ $hasil->tahun_ajaran }}</td>
									<td>{{ $hasil->kelas }}</td>
									<td>{{ $hasil->indikator }}</td>
									<td>{{ $hasil->totalnilai }}</td>
								</tr>
							<?php
								$no++;
							}						
						}
					?>
				</tbody>
			</table>
		  </div>
	  </div>
	</div>
@endsection