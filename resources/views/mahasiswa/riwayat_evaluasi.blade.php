@extends('layouts/template')
@section('main-title','Dashboard Admin')
@section('sidebar')
  @include('mahasiswa/sidebar')
@endsection
@section('manajemen-title')
	<div class="box-header with-border">
        <h3 class="box-title">Riwayat Evaluasi Keseluruhan</h3>
        <div class="box-tools pull-right">
            @yield('pull-right')
        </div>
    </div>
@endsection
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			  <div class="panel-heading bg-blue">Riwayat Evaluasi Keseluruhan</div>
			  <div class="panel-body table-responsive" style="max-height:500px;overflow: scroll;display: inline-block;">
			  	<table class="table table-bordered" id="table-riwayat-evaluasi" width="100%" style="">
					<thead>
						<tr class="bg-blue">
							<th>No</th>
							<th>Dosen</th>
							<th>Mata Kuliah</th>
							<th>ID Kelas</th>
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