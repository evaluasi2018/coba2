@extends('layouts/template')
@section('main-title','Admin - Data Program Studi')
@section('sidebar')
    @include('admin/sidebar')
@endsection
@section('manajemen-title','Data Program Studi')
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading bg-blue">Data Program Studi</div>
		<div class="panel-body table-responsive">
			<table id="table-prodi" class="table table-bordered table-striped table-hover" style="width: 100%;">
				<thead>
					<tr class="bg-blue">
						<th>NO</th>
						<th>NAMA PRODI</th>
						<th>NAMA FAKULTAS</th>
						<th>KETERANGAN</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
	@include('admin/manajemen_pengaturan_semester/form_pengaturan_semester')
@endsection