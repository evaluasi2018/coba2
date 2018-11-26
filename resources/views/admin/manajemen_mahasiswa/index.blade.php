@extends('layouts/template')
@section('main-title','Admin - Data Mahasiswa')
@section('sidebar')
    @include('admin/sidebar')
@endsection
@section('manajemen-title','Data Mahasiswa')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading bg-blue">Data Mahasiswa</div>
		<div class="panel-body table-responsive">
			<table id="table-mahasiswa" class="table table-striped table-hover" style="width: 100%;">
				<thead>
					<tr class="bg-blue">
						<th>No</th>
						<th>NPM</th>
						<th>NAMA MAHASISWA</th>
						<th>PROGRAM STUDI</th>
						<th>FAKULTAS</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
	@include('admin/manajemen_pengaturan_admin/form_pengaturan_admin')
@endsection