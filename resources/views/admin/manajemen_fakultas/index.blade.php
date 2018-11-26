@extends('layouts/template')
@section('main-title','Admin - Data Fakultas')
@section('sidebar')
    @include('admin/sidebar')
@endsection
@section('manajemen-title','Data Fakultas')
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading bg-blue">Data Fakultas</div>
		<div class="panel-body table-responsive">
			<table id="table-fakultas" class="table table-bordered table-striped table-hover" style="width: 100%;">
				<thead>
					<tr class="bg-blue"> 
						<th>No</th>
						<th>ID FAKULTAS</th>
						<th>NAMA FAKULTAS</th>
						<th>KETERANGAN</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
	@include('admin/manajemen_pengaturan_admin/form_pengaturan_admin')
@endsection