@extends('layouts/template')
@section('main-title','Admin - Data Jadwal Perkuliahan')
@section('sidebar')
    @include('admin/sidebar')
@endsection
@section('manajemen-title','Data Jadwal Perkuliahan')
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading bg-blue">Data Jadwal Perkuliahan</div>
		<div class="panel-body table-responsive">
			<table id="table-jadwal" class="table table-bordered table-striped table-hover" style="width: 100%;">
				<thead>
					<tr class="bg-blue">
						<th>No</th>
						<th>MATA KULIAH</th>
						<th>PROGRAM STUDI</th>
						<th>FAKULTAS</th>
						<th>NAMA DOSEN</th>
						<th>SEMESTER</th>
						<th>KELAS</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
	@include('admin/manajemen_indikator/form_indikator_penilaian')
@endsection



