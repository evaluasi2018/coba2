@extends('layouts/template')
@section('main-title','Admin - Laporan Evaluasi Per Jenis')
@section('sidebar')
    @include('admin/sidebar')
@endsection
@section('manajemen-title')
	<div class="box-header with-border">
        <h3 class="box-title" style="text-transform: uppercase;">laporan evaluasi per jenis indikator penilaian</h3>
        <div class="box-tools pull-right">
            @yield('pull-right')
        </div>
    </div>
@endsection
@section('pull-right')
	{{-- <a onclick="tambahUser()" style="margin-left: 5px;" class="btn btn-success pull-right btn-flat"><i class="fa fa-file-excel-o"></i>&nbsp;Cetak Excel</a>
	<a href="{{ route('admin.laporanperjenisexportpdf') }}" target="_blank" class="btn btn-primary pull-right btn-flat"><i class="fa fa-file-pdf-o"></i>&nbsp;Cetak PDF</a> --}}
@endsection	
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading bg-blue">Laporan Evaluasi Per Jenis Indikator</div>
		<div class="panel-body table-responsive">
			<table id="table-laporan-per-jenis" class="table table-bordered table-striped table-responsive table-hover">
				<thead>
					<tr class="bg-blue">
						<th>NO</th>
						<th>NAMA DOSEN</th>
						<th>MATA KULIAH</th>
						<th>ID KELAS</th>
						<th>JENIS INDIKATOR</th>
						<th>NILAI</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
@endsection