@extends('layouts/template')
@section('main-title','Admin - Manajemen Admin')
@section('sidebar')
    @include('admin/sidebar')
@endsection
@section('manajemen-title')
	<div class="box-header with-border">
        <h3 class="box-title" style="text-transform: uppercase;">manajemen admin</h3>
        <div class="box-tools pull-right">
            @yield('pull-right')
        </div>
    </div>
@endsection
@section('pull-right')
	<a onclick="tambahAdmin()" class="btn btn-primary btn-flat pull-right" style="margin-left: 10px;"><i class="fa fa-plus"></i>&nbsp;Tambah Admin</a>
	</button>
@endsection	
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading bg-blue">Data Admin</div>
		<div class="panel-body table-responsive">
			<table id="table-admin" class="table table-striped table-hover table-bordered" style="width: 100%;">
				<thead>
					<tr class="bg-blue">
						<th>NO</th>
						<th>NAMA ADMIN</th>
						<th>USERNAME</th>
						<th>AKSI</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
	@include('admin/manajemen_pengaturan_admin/form_pengaturan_admin')
@endsection