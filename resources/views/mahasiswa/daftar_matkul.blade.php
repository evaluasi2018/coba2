@extends('layouts/template')
@section('main-title','Daftar Mata Kuliah')
@section('sidebar')
  @include('mahasiswa/sidebar')
@endsection
@section('manajemen-title')
	<div class="box-header with-border">
        <h3 class="box-title">Daftar Mata Kuliah <b>{{ Session::get('nama') }}</b></h3>
        <div class="box-tools pull-right">
            @yield('pull-right')
        </div>
    </div>
@endsection
@section('content')
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover table-bordered" id="table-matkul">
				    	<thead>
					    	<tr class="info">
					    		<th>No</th>
					    		<th>ID Kelas</th>
					    		<th>Semester</th>
					    		<th>Mata Kuliah</th>
					    		<th>Mata Kuliah</th>
					    		<th>Kelas</th>
					    		<th>Dosen Pengampu</th>
					    		<th>Status</th>
					    		<th>Aksi</th>
					    	</tr>
					    </thead>
					    <tbody>

					    	<?php
					    		//dd($data['data']['mahasiswa'][0]['krs'][0]['kelas'][0]['dosen']); 
					    		$no=1;
					    		foreach ($data['data']['mahasiswa'][0]['krs'][0]['kelas'] as $arr1) {
					    			$count = 0; $sudah = "";
				    				foreach ($arr1['dosen'] as $arr2) {
				    					$tahun = substr($arr1['klsSemId'],0,4);
				    					$semester = substr($arr1['klsSemId'], -1);
				    					$id_kelas = $arr1['klsId'];
				    					$nip = $arr2['dsnPegNip'];
										$sudah = DB::table('tb_evaluasi')->select('id_kelas')->where('npm',Session::get('nip'))->where('id_kelas',$arr1['klsId'])->where('nip',$nip)->get();
										$count = Count($sudah);
					    		?>


					    		<tr>
				    				<td>{{ $no }}</td>
				    				<td>{{ $arr1['klsId'] }}</td>
				    				<td>
				    					{{ $tahun }}
				    					<?php 
				    						if($semester == 1)
				    						{
				    							echo "Ganjil";
				    						}
				    						elseif ($semester == 2) {
				    							echo "Genap";
				    						}
				    						else
				    						{
				    							
				    						}
				    					?>

				    				</td>
				    				<td>{{ $arr1['matakuliah']['mkkurKode'] }}</td>
				    				<td>{{ $arr1['matakuliah']['mkkurNamaResmi'] }}</td>
				    				<td>{{ $arr1['klsNama'] }}</td>
				    				<td>{{ $arr2['pegawai']['pegGelarDepan'] }}{{ $arr2['pegawai']['pegNama'] }} {{ $arr2['pegawai']['pegGelarBelakang'] }}</td>
												
									<?php 
										if ($count>0){
											?>
												<td>
													<label for="" class="label label-success">Sudah Diisi</label>
												</td>
												<td>
													<a href="#" class="btn btn-primary btn-flat" disabled style="padding: 4px 6px;">Review</a>
												</td>
											<?php 		
									}
									else
									{
										?>
											<td>
													<label for="" class="label label-danger">Belum Diisi</label>
												</td>
												<td>
													<a href="{{ route('mahasiswa.berikan_evaluasi',[$id_kelas,$nip]) }}" class="btn btn-primary btn-flat" style="padding: 4px 6px;">Review</a>
												</td>
										<?php
									}
									?>

									
				    					
				    			</tr>

					    	<?php
					    					$no++;
					    				}
					    			
					    		}

					    	  ?>
					    </tbody>
				    </table>
		</div>
	</div>
@endsection