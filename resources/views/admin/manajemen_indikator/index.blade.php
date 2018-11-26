@extends('layouts/template')
@section('main-title','Admin - Manajemen Indikator')
@section('sidebar')
    @include('admin/sidebar')
@endsection
@section('manajemen-title')
	<div class="box-header with-border">
        <h3 class="box-title" style="text-transform: uppercase;">MANAJEMEN INDIKATOR PENILAIAN</h3>
        <div class="box-tools pull-right">
            @yield('pull-right')
        </div>
    </div>
@endsection
@section('pull-right')
	<a onclick="tambahIndikator()" class="btn btn-primary btn-flat pull-right" style="margin-left: 10px;"><i class="fa fa-plus"></i>&nbsp;Tambah Indikator</a>
	<button type="button" class="btn btn-warning btn-flat pull-right" style="margin-left: 10px;" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">
	  <i class="fa fa-trash"></i>&nbsp;File Sampah
	</button>
@endsection	
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading bg-blue">Data Indikator Penilaian</div>
		<div class="panel-body table-responsive">
			<table id="table-indikator" class="table table-striped table-hover table-bordered" style="width: 100%;">
				<thead>
					<tr class="bg-blue">
						<th>NO</th>
						<th>INDIKATOR PENILAIAN</th>
						<th>JENIS INDIKATOR PENILAIAN</th>
						<th>AKSI</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
	@include('admin/manajemen_indikator/form_indikator_penilaian')
	@include('admin/manajemen_indikator/sampah')
@endsection



