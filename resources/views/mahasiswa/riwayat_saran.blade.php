@extends('layouts/template')
@section('main-title','Dashboard Admin')
@section('sidebar')
  @include('mahasiswa/sidebar')
@endsection
@section('manajemen-title')
	<div class="box-header with-border">
        <h3 class="box-title">Riwayat Pemberian Saran</h3>
        <div class="box-tools pull-right">
            @yield('pull-right')
        </div>
    </div>
@endsection
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			  <div class="panel-heading bg-blue">Riwayat Saran</div>
			  <div class="panel-body table-responsive" >
			  	<table class="table table-bordered" id="table-riwayat-saran" width="100%" style="">
					<thead>
						<tr class="bg-blue">
							<th>No</th>
							<th>Dosen</th>
							<th>Mata Kuliah</th>
							<th>ID Kelas</th>
							<th>Saran</th>
						</tr>
					</thead>
				</table>
			  </div>
			</div>
		</div>
	</div>
@endsection