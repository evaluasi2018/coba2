<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=devide-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Si -Evaluasi | Laporan PDF</title>
	<style>
		th .td{
			padding: 8px;
			text-align: left;
		}
		.tr:nth-child(even){
			background-color: #f2f2f2;
		}
		th{
			background-color: #4CAF50;
			color: white;
		}
	</style>
</head>
<body>
	<table border="" align="center">
		<tr>
			<td width="80" rowspan="6" style="text-align: content"><img src="{{ asset('assets/images/unib.png') }}" width="100" style="margin-left: 4px; margin-top: 15px; margin-right: auto; display: block;"></td>
		</tr>
		<tr>
			<td align="center">KEMENTERIAN RISET, TEKNOLOGI, DAN PENDIDIKAN TINGGI</td>
		</tr>
		<tr>
			<td align="center"><b>UNIVERSITAS BENGKULU</b></td>
		</tr>
		<tr>
			<td align="center"><b style="font-size: 15px;">LEMBAGA PENJAMINAN MUTU DAN PENGEMBANGAN PEMBELAJARAN (LPMPP)</b></td>
		</tr>
		<tr>
			<td align="center" style="font-size: 15px;">Gedung Perpustakaan lantai 1 Jl. W.R. Supratman Kandang Limun Bengkulu 38371</td>
		</tr>
		<tr>
			<td align="center" style="font-size:15px;">Telp. (0736) 28815, Ext 188, Telp (0736) 708156, http://www.unib.ac.id</td>
		</tr>
	</table>
	<hr size="3">
	<table style="width: 100%; border-collapse: collapse;">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Dosen</th>
				<th>Nama Matkul</th>
				<th>Program Study</th>
				<th>Nama Fakultas</th>
				<th>Kelas</th>
				<th>ID Indikator</th>
				<th>Score</th>
			</tr>
		</thead>
		<tbody>
			@php
				$no=1;
			@endphp
			@foreach($laporans as $laporan)
				<tr id="tr">
					<td id="td" height="35">{{ $no }}</td>
					<td id="td" height="35">{{ $laporan->nm_dosen }}</td>
					<td id="td" height="35">{{ $laporan->nm_matkul }}</td>
					<td id="td" height="35">{{ $laporan->nm_prodi }}</td>
					<td id="td" height="35">{{ $laporan->nm_fakultas }}</td>
					<td id="td" height="35">{{ $laporan->kelas }}</td>
					<td id="td" height="35">{{ $laporan->id_indikator }}</td>
					<td id="td" height="35">{{ $laporan->totalnilai }}</td>
				</tr>
				@php
					$no++;
				@endphp
			@endforeach
		</tbody>
	</table>
</body>
</html>