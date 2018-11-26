@extends('layouts/template')
@section('main-title','Dashboard Hasil Evaluasi')
@section('sidebar')
	@include('dosen/sidebar')
@endsection
@section('manajemen-title')
	<div class="box-header with-border">
        <h3 class="box-title" style="text-transform: uppercase;">Hasil Evaluasi Per Indikator Penilaian</h3>
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
			  <div class="panel-heading bg-blue">Hasil Evaluasi Keseluruhan</div>
			  <div class="panel-body table-responsive" style="max-height:400px;overflow: scroll;display: inline-block;">
			  	<table class="table table-bordered" id="table-hasil-evaluasi" width="100%" style="">
					<thead>
						<tr class="bg-blue">
							<th>No</th>
							<th>Mata Kuliah</th>
							<th>Kelas</th>
							<th>Indikator</th>
							<th>Nilai</th>
						</tr>
					</thead>
				</table>
			  </div>
			</div>
		</div>
	</div>
@endsection