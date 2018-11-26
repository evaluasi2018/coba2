@extends('layouts/template')
@section('main-title','Admin - Manajemen Semester')
@section('sidebar')
    @include('admin/sidebar')
@endsection
@section('manajemen-title','Manajemen Semester')
@section('pull-right')
	<a onclick="tambahSemester()" class="btn btn-primary btn-flat pull-right" style="margin-left: 10px;"><i class="fa fa-plus"></i>&nbsp;Tambah Semester</a>
	<button type="button" class="btn btn-warning btn-flat pull-right" style="margin-left: 10px;" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">
	  <i class="fa fa-trash"></i>&nbsp;File Sampah
	</button>
@endsection	
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading bg-blue">Data Semester</div>
		<div class="panel-body table-responsive">
			<table id="table-semester" class="table table-striped table-hover table-bordered" style="width: 100%;">
				<thead>
					<tr class="bg-blue">
						<th>NO</th>
						<th>NAMA SEMESTER</th>
						<th>TAHUN AJARAN</th>
						<th>STATUS</th>
						<th>AKSI</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
	@include('admin/manajemen_pengaturan_semester/form_pengaturan_semester')
	@include('admin/manajemen_pengaturan_semester/sampah')
@endsection