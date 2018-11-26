@extends('layouts/template')
@section('main-title','Admin - Data Dosen')
@section('sidebar')
    @include('admin/sidebar')
@endsection
@section('manajemen-title','Data Dosen')
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading bg-blue">Data Dosen</div>
		<div class="panel-body table-responsive">
			<table id="table-dosen" class="table table-striped table-hover table-bordered" style="width: 100%;">
				<thead>
					<tr class="bg-blue">
						<th>NO</th>
						<th>NIP</th>
						<th>NAMA DOSEN</th>
						<th>PROGRAM STUDI</th>
						<th>FAKULTAS</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
	@include('admin/manajemen_pengaturan_admin/form_pengaturan_admin')
@endsection