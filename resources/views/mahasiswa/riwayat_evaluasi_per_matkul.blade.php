@extends('layouts/template')
@section('main-title','Dashboard Admin')
@section('sidebar')
  @include('mahasiswa/sidebar')
@endsection
@section('manajemen-title','Riwayat Evaluasi Per Mata Kuliah')
@section('content')
	<div class="panel panel-default" id="hasil">
	  <div class="panel-heading bg-blue">Hasil Evaluasi Per Mata Kuliah</div>
		  <div class="panel-body" style="max-height:500px;overflow: scroll;display: inline-block;width: 100%;">
			<form action="{{ route('mahasiswa.riwayat_evaluasi_per_matkul',[Session::get('nip'),Session::get('klsSemId')]) }}" method="GET">
				<div class="col-md-12">
					<label for="nm_matkul">Pilih Mata Kuliah</label>
					<select name="nm_matkul" id="nm_matkul" class="form-control" onchange="mahasiswa_tampilkan_button_lihat()">
						<option value="0" selected="true" disabled="true">-- pilih mata kuliah --</option>
						<?php 
							foreach($data['data']['mahasiswa'][0]['krs'] as $arr1) {
								foreach ($arr1['kelas'] as $arr2) {
									?>
										<option value="{{ $arr2['matakuliah']['mkkurKode'] }}">{{ $arr2['matakuliah']['mkkurNamaResmi'] }}</option>
									<?php 
								}
							}
						?>
					</select>
				</div>
				<div class="col-md-12" style="margin-top: 5px;">
					<button type="submit" name="submit" class="btn bg-blue btn-flat" id="mahasiswa-button-lihat" style="display: none"><i class="fa fa-check"></i>&nbsp;Lihat Hasil</button></div>
			</form>
		  <div class="col-md-12" style="margin-top: 5px;">
		  	<table class="table table-bordered" id="table-hasil-evaluasi-per-mata-kuliah">
				<thead>
					<tr class="bg-blue">
						<th>No</th>
						<th>Mata Kuliah</th>
						<th>Nama Dosen</th>
						<th>Semester</th>
						<th>ID Kelas</th>
						<th>Indikator Penilaian</th>
						<th>Nilai</th>
					</tr>
				</thead>
				<tbody>
					<?php 
							if(isset($_GET['submit']))
							{
								$no=1;
								foreach ($data2 as $data) {
								?>
									<tr>
										<td>{{ $no }}</td>
										<td>{{ $data->nm_matkul }}</td>
										<td>{{ $data->nm_dosen }}</td>
										<td>{{ $data->semester }}</td>
										<td>{{ $data->id_kelas }}</td>
										<td>{{ $data->indikator }}</td>
										<td>{{ $data->nilai }}</td>
									</tr>
								<?php 
									$no++;
								}
							}
							else
							{

							}
						?>
				</tbody>
			</table>
		  </div>
	  </div>
	</div>
@endsection