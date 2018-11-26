@extends('layouts/template')
@section('main-title','Admin - Laporan Evaluasi Detail')
@section('sidebar')
    @include('admin/sidebar')
@endsection
@section('manajemen-title','Laporan Evaluasi Detail')
@section('pull-right')
	{{-- <a onclick="tambahUser()" style="margin-left: 5px;" class="btn btn-success pull-right btn-flat"><i class="fa fa-file-excel-o"></i>&nbsp;Cetak Excel</a>
	<a href="{{ route('admin.api_laporan_per_dosen') }}" target="_blank" class="btn btn-primary pull-right btn-flat"><i class="fa fa-file-pdf-o"></i>&nbsp;Cetak PDF</a> --}}
@endsection	
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading bg-blue">Hasil Laporan Keseluruhan</div>
		<div class="panel-body">
			<form action="{{ route('admin.api_laporan_per_dosen') }}" method="POST">
				{{ csrf_field() }}
				<div class="col-md-4">
					<label for="fakultas">Pilih Fakultas:</label>
		            <select name="nm_fakultas" class="form-control namafakultas"  onchange="tampilkan_select_prodi()" required="">
		                <option value="0" disabled="true" selected="true">-- pilih fakultas --</option>
		                <?php 
		                	 $fakultas = DB::table('tb_fakultas')
	                         ->get();
		                
	                         foreach ($fakultas as $fakultas) {
	                         
		               	?>
							<option value="{{ $fakultas->id_fakultas }}">{{ $fakultas->nm_fakultas }}</option>
		               	<?php 
		               		}
		               	?>
		            </select>
				</div>
				<div class="col-md-4" id="select_prodi" style="display: none;">
						<label for="prodi">Pilih Program Study:</label>
						<select name="nm_prodi" class="form-control namaprodi" onchange="tampilkan_select_dosen()">
							<option value="0" disabled="true" selected="true">-- pilih prodi --</option>
						</select>
				</div>
				<div class="col-md-4" id="select_dosen" style="display: none;">
						<label for="dosen">Pilih Dosen:</label>
						<select name="nm_dosen" class="form-control namadosen" onchange="tampilkan_button_lihat()">
							<option value="0" disabled="true" selected="true">-- pilih dosen --</option>
						</select>
				</div>
				<div class="col-md-12">
					<button type="submit" name="submit" id="button-lihat" class="btn bg-blue btn-flat" style="margin-top: 5px; margin-bottom: 5px; display: none;">
						<i class="fa fa-check"></i>&nbsp;Lihat Hasil
					</button>
				</div>	
			</form>
			<br>
			<hr>

			<div class="col-md-12" style="display: ;" id="table-hasil">
				<div>
				<table id="table-laporan-per-dosen" class="table table-bordered table-hover">
					<thead>
						<tr class="bg-blue">
							<th>No Evaluasi</th>
							<th>Nama Dosen</th>
							<th>Nama Matkul</th>
							<th>Program Study</th>
							<th>Fakultas</th>
							<th>Kelas</th>
							<th>Semester</th>
							<th>Nilai</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							if(isset($_POST['submit']))
							{
								$no=1;
								foreach ($get_data as $data) {
								?>
									<tr>
										<td>{{ $no }}</td>
										<td>{{ $data->nm_dosen }}</td>
										<td>{{ $data->nm_matkul }}</td>
										<td>{{ $data->nm_prodi }}</td>
										<td>{{ $data->nm_fakultas }}</td>
										<td>{{ $data->kelas }}</td>
										<td>{{ $data->nm_semester }}</td>
										<td>{{ $data->totalnilai }}</td>
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
	</div>	
@endsection