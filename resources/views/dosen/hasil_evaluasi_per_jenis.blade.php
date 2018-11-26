@extends('layouts/template')
@section('main-title','Dashboard Hasil Evaluasi')
@section('sidebar')
	@include('dosen/sidebar')
@endsection
@section('manajemen-title')
	<div class="box-header with-border">
        <h3 class="box-title" style="text-transform: uppercase;">Riwayat Evaluasi Per Jenis Indikator Penilaian</h3>
        <div class="box-tools pull-right">
            @yield('pull-right')
        </div>
    </div>
@endsection
@section('manajemen-title-kedua')
	<p style="font-size: 14px;">Selamat Datang Dosen, Silahkan Gunakan Menu Yang Telah Disediakan Untuk Manajemen Halaman Dosen</p>
@endsection
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			  <div class="panel-heading bg-blue">Hasil Evaluasi Per Jenis Indikator</div>
			  <div class="panel-body" style="max-height:500px;">
			  	<table class="table table-bordered table-hover" id="table-hasil-evaluasi-per-jenis" width="100%">
					<thead>
						<tr class="bg-blue">
							<th>No</th>
							<th>Mata Kuliah</th>
							<th>ID Kelas</th>
							<th>Jenis Indikator</th>
							<th>Total Nilai</th>
						</tr>
					</thead>
				</table>
			  </div>
			</div>
		</div>
	</div>
@endsection