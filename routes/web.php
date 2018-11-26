<?php

Route::get('/', function () {
    return redirect()->route('sievaluasi.loginform');
});

Route::get('/login123','LoginController@showLoginForm')->name('sievaluasi.loginform');
// Route::post('/login123','LoginController@login')->name('sievaluasi.loginsubmit');
Route::post('/panda_token','LoginController@pandaToken')->name('login.panda_token');
Route::post('/panda','LoginController@panda')->name('login.panda');
Route::post('/getuser','LoginController@getUser')->name('login.getuser');
Route::get('/show','LoginController@show');
Route::post('/pandalogin','LoginController@pandaLogin')->name('panda.login');
Route::get('/getuser','LoginController@getUser')->name('panda.getuser');
Route::get('/mahasiswa/daftar_matkul/{npm}/{klsSemId}','LoginController@getData')->name('mahasiswa.daftar_matkul');
Route::get('/mahasiswa/cari_matkul','LoginController@cariMatkul')->name('mahasiswa.cari_matkul');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route Admin
Route::group(['prefix'	=>	'admin'],function(){
	Route::get('/','Admin\DashboardController@index')->name('admin.dashboard');
	// Route::get('/piechart','Admin\DashboardController@pieChart')->name('admin.dashbord_pie_chart');
	Route::get('/login','Admin\AuthAdmin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login','Admin\AuthAdmin\LoginController@login')->name('admin.login.submit');
	Route::get('/logout','Admin\AuthAdmin\LoginController@logoutAdmin')->name('admin.logout');
});

// Route Mahasiswa
Route::group(['prefix'	=>	'mahasiswa'],function(){
	Route::get('/','Mahasiswa\DashboardController@index')->name('mahasiswa.dashboard');
	Route::get('/','Mahasiswa\DashboardController@index')->name('mahasiswa.home');
	Route::get('/login','Mahasiswa\AuthMahasiswa\LoginController@showLoginForm')->name('mahasiswa.login');
	Route::post('/login','Mahasiswa\AuthMahasiswa\LoginController@login')->name('mahasiswa.login.submit');
	Route::get('/logout','LoginController@logoutMahasiswa')->name('mahasiswa.logout');
});

// Route Mahasiswa
Route::group(['prefix'	=>	'dosen'],function(){
	Route::get('/','Dosen\DashboardController@index')->name('dosen.dashboard');
	Route::get('/login','Dosen\AuthDosen\LoginController@showLoginForm')->name('dosen.login');
	Route::post('/login','Dosen\AuthDosen\LoginController@login')->name('dosen.login.submit');
	Route::get('/logout','LoginController@logoutDosen')->name('dosen.logout');
});

Route::group(['prefix'	=>	'admin/manajemen_jenis_indikator'],function(){
	Route::get('/','Admin\JenisIndikatorController@index')->name('manajemen.jenis_indikator');
	Route::post('/','Admin\JenisIndikatorController@store');
	Route::patch('/{id_jenis_indikator}','Admin\JenisIndikatorController@update');
	Route::delete('/{id_jenis_indikator}','Admin\JenisIndikatorController@destroy');
	Route::get('/{id_jenis_indikator}/edit','Admin\JenisIndikatorController@edit');
	Route::get('/sampah','Admin\JenisIndikatorController@apiSampah')->name('sampah.jenis_indikator');
	Route::get('/sampah/restore/{id_jenis_indikator}','Admin\JenisIndikatorController@jenisRestore')->name('sampah.restore');
	Route::get('/sampah/restoreall','Admin\JenisIndikatorController@jenisRestoreAll')->name('sampah.restore_all');
	Route::delete('/sampah/forcedelete/{id_jenis_indikator}','Admin\JenisIndikatorController@jenisForceDelete')->name('sampah.force_delete');
	Route::get('/sampah/forcedeleteall','Admin\JenisIndikatorController@jenisForceAll')->name('sampah.force_all');
});

Route::group(['prefix'	=>	'admin/manajemen_indikator'],function(){
	Route::get('/','Admin\IndikatorController@index')->name('manajemen.indikator');
	Route::post('/','Admin\IndikatorController@store');
	Route::patch('/{id_indikator}','Admin\IndikatorController@update');
	Route::delete('/{id_indikator}','Admin\IndikatorController@destroy');
	Route::get('/{id_indikator}/edit','Admin\IndikatorController@edit');
	Route::get('/sampah','Admin\IndikatorController@apiSampah')->name('sampah.indikator');
	Route::get('/sampah/restore/{id_indikator}','Admin\IndikatorController@indikatorRestore')->name('sampah.indikator_restore');
	Route::get('/sampah/restoreall','Admin\IndikatorController@indikatorRestoreAll')->name('sampah.indikator_restore_all');
	Route::delete('/sampah/forcedelete/{id_indikator}','Admin\IndikatorController@indikatorForceDelete')->name('sampah.indikator_force_delete');
	Route::get('/sampah/forcedeleteall','Admin\IndikatorController@indikatorForceAll')->name('sampah.indikator_force_all');
});

Route::group(['prefix'	=>	'admin/manajemen_semester'],function(){
	Route::get('/','Admin\PengaturanSemesterController@index')->name('manajemen.semester');
	Route::post('/','Admin\PengaturanSemesterController@store');
	Route::patch('/{id_semester}','Admin\PengaturanSemesterController@update');
	Route::delete('/{id_semester}','Admin\PengaturanSemesterController@destroy');
	Route::get('/{id_semester}/edit','Admin\PengaturanSemesterController@edit');
	Route::get('/sampah','Admin\PengaturanSemesterController@apiSampahSemester')->name('sampah.semester');
	Route::get('/sampah/restore/{id_semester}','Admin\PengaturanSemesterController@semesterRestore')->name('sampah.semester_restore');
	Route::get('/sampah/restoreall','Admin\PengaturanSemesterController@semesterRestoreAll')->name('sampah.semester_restore_all');
	Route::delete('/sampah/forcedelete/{id_semester}','Admin\PengaturanSemesterController@semesterForceDelete')->name('sampah.semester_force_delete');
	Route::get('/sampah/forcedeleteall','Admin\PengaturanSemesterController@semesterForceAll')->name('sampah.semester_force_all');
});

Route::group(['prefix'	=>	'admin/manajemen_admin'],function(){
	Route::get('/','Admin\PengaturanAdminController@index')->name('manajemen.admin');
	Route::post('/','Admin\PengaturanAdminController@store')->name('manajemen-admin.store');
	Route::patch('/{id_admin}','Admin\PengaturanAdminController@update');
	Route::delete('/{id_admin}','Admin\PengaturanAdminController@destroy');
	Route::get('/{id_admin}/edit','Admin\PengaturanAdminController@edit');
	Route::get('/sampah','Admin\PengaturanAdminController@apiSampahAdmin')->name('sampah.admin');
	Route::get('/sampah/restore/{id_admin}','Admin\PengaturanAdminController@adminRestore')->name('sampah.admin_restore');
	Route::get('/sampah/restoreall','Admin\PengaturanAdminController@adminRestoreAll')->name('sampah.admin_restore_all');
	Route::delete('/sampah/forcedelete/{id_admin}','Admin\PengaturanAdminController@adminForceDelete')->name('sampah.admin_force_delete');
	Route::get('/sampah/forcedeleteall','Admin\PengaturanAdminController@adminForceAll')->name('sampah.admin_force_all');
});

Route::group(['prefix'	=>	'admin/manajemen_mahasiswa'],function(){
	Route::get('/','Admin\MahasiswaController@index')->name('manajemen.mahasiswa');
});

Route::group(['prefix'	=>	'admin/manajemen_dosen'],function(){
	Route::get('/','Admin\DosenController@index')->name('manajemen.dosen');
});

Route::group(['prefix'	=>	'admin/manajemen_prodi'],function(){
	Route::get('/','Admin\ProdiController@index')->name('manajemen.prodi');
});

Route::group(['prefix'	=>	'admin/manajemen_fakultas'],function(){
	Route::get('/','Admin\FakultasController@index')->name('manajemen.fakultas');
});

Route::group(['prefix'	=>	'admin/manajemen_jadwal_perkuliahan'],function(){
	Route::get('/','Admin\JadwalPerkuliahanController@index')->name('manajemen.jadwal_perkuliahan');
});


Route::group(['prefix'	=>	'admin/'],function(){
	Route::get('api/jenis_indikator','Admin\JenisIndikatorController@apiJenis')->name('api.jenis_indikator');
	Route::get('api/indikator_penilaian','Admin\IndikatorController@apiIndikator')->name('api.indikator');
	Route::get('api/pengaturan_semester','Admin\PengaturanSemesterController@apiSemester')->name('api.semester');
	Route::get('api/pengaturan_admin','Admin\PengaturanAdminController@apiPengaturanAdmin')->name('api.pengaturan_admin');
	Route::get('api/mahasiswa','Admin\MahasiswaController@apiMahasiswa')->name('api.mahasiswa');
	Route::get('api/dosen','Admin\DosenController@apiDosen')->name('api.dosen');
	Route::get('api/prodi','Admin\ProdiController@apiProdi')->name('api.prodi');
	Route::get('api/fakultas','Admin\FakultasController@apiFakultas')->name('api.fakultas');
	Route::get('api/jadwal_perkuliahan','Admin\JadwalPerkuliahanController@apiJadwalPerkuliahan')->name('api.jadwal_perkuliahan');
});


Route::group(['prefix'	=>	'admin/laporan'],function(){
	Route::get('/','Admin\LaporanEvaluasiController@laporanDetail')->name('laporan.detail');
	Route::get('/detailexportpdf','Admin\LaporanEvaluasiController@detailExportPdf')->name('admin.detailexportpdf');
	Route::get('/per_dosen','Admin\LaporanEvaluasiController@laporanPerDosen')->name('laporan.per_dosen');
	Route::get('/per_jenis_indikator','Admin\LaporanEvaluasiController@laporanPerJenis')->name('laporan.per_jenis');
	Route::get('/laporanperjenisexportpdf','Admin\LaporanEvaluasiController@laporanPerJenisExportPdf')->name('admin.laporanperjenisexportpdf');
	Route::get('/laporan_evaluasi_per_dosen/cariprodi','Admin\LaporanEvaluasiController@cariProdi')->name('admin.laporan_per_dosen_cari_prodi');
	Route::get('/laporan_evaluasi_per_dosen/caridosen','Admin\LaporanEvaluasiController@cariDosen');
	Route::post('/per_dosen/api_laporan_per_dosen','Admin\LaporanEvaluasiController@apiLaporanEvaluasiPerDosen')->name('admin.api_laporan_per_dosen');
	// Route::get('/laporanperdosenexportpdf','Admin\LaporanEvaluasiController@laporanPerDosenExportPdf')->name('admin.laporanperdosenexportpdf');

});

Route::group(['prefix'	=>	'admin/laporan/api'],function(){
	Route::get('/api_detail','Admin\LaporanEvaluasiController@apiLaporanDetail')->name('api.laporan_detail');
	Route::get('/api_per_jenis','Admin\LaporanEvaluasiController@apiLaporanPerJenis')->name('api.laporan_per_jenis');
});

// End Of Route Admin

//Route Mahasiswa
Route::group(['prefix'	=>	'mahasiswa'],function(){
	Route::get('/','Mahasiswa\DashboardController@index')->name('mahasiswa.dashboard');
	Route::get('/evaluasi_mahasiswa/{klsId}/{pegNip}','Mahasiswa\EvaluasiMahasiswaController@berikanEvaluasi')->name('mahasiswa.berikan_evaluasi');
	Route::post('kuisioner','Mahasiswa\InsertKuisionerController@insertKuisioner')->name('insert_kuisioner');
	Route::get('/evaluasi_mahasiswa/cari_matkul','LoginController@cariMatkul')->name('mahasiswa.cari_matkul');
	Route::get('/evaluasi_mahasiswa/cari_dosen','Mahasiswa\EvaluasiMahasiswaController@cariDosen')->name('mahasiswa.cari_dosen');
	Route::get('/riwayat_evaluasi','Mahasiswa\EvaluasiMahasiswaController@riwayatEvaluasi')->name('mahasiswa.riwayat_evaluasi');
	Route::get('/riwayat_evaluasi_per_matkul/{npm}/{klsSemId}','Mahasiswa\EvaluasiMahasiswaController@riwayatEvaluasiPerMatkul')->name('mahasiswa.riwayat_evaluasi_per_matkul');
	Route::get('/riwayat_saran','Mahasiswa\EvaluasiMahasiswaController@riwayatSaran')->name('mahasiswa.riwayat_saran');

	Route::get('/daftar_matkul_mahasiswa/','Mahasiswa\EvaluasiMahasiswaController@daftarMatkulMahasiswa')->name('daftar_matkul_mahasiswa');
});

Route::group(['prefix'	=>	'mahasiswa/api'],function(){
	Route::get('/api_riwayat_evaluasi','mahasiswa\EvaluasiMahasiswaController@apiRiwayatEvaluasi')->name('mahasiswa.api_riwayat_evaluasi');
	Route::get('/api_riwayat_saran','mahasiswa\EvaluasiMahasiswaController@apiRiwayatSaran')->name('mahasiswa.api_riwayat_saran');
	Route::get('/daftar_sudah_diisi','mahasiswa\EvaluasiMahasiswaController@daftarSudahDiIsi')->name('mahasiswa.daftar_sudah_diisi');
});
//End of route Mahasiswa

//Route Dosen
Route::group(['prefix'	=>	'dosen'],function(){
	Route::get('/hasil_evaluasi','dosen\HasilEvaluasiController@hasilEvaluasi')->name('dosen.hasil_evaluasi');
	Route::get('/hasil_evaluasi_per_jenis','dosen\HasilEvaluasiController@hasilEvaluasiPerJenis')->name('dosen.hasil_evaluasi_per_jenis');
	Route::get('/hasil_evaluasi_per_mata_kuliah','dosen\HasilEvaluasiController@hasilEvaluasiPerMataKuliah')->name('dosen.hasil_evaluasi_per_mata_kuliah');
	Route::post('/api_hasil_evaluasi_per_mata_kuliah','dosen\HasilEvaluasiController@apiHasilEvaluasiPerMataKuliah')->name('dosen.api_hasil_evaluasi_per_mata_kuliah');
	Route::get('/saran_mahasiswa','dosen\HasilEvaluasiController@saranMahasiswa')->name('dosen.saran_mahasiswa');
});

Route::group(['prefix'	=>	'dosen/hasil'],function(){
	Route::get('/api_hasil_evaluasi','dosen\HasilEvaluasiController@apiHasilEvaluasi')->name('dosen.api_hasil_evaluasi');
	Route::get('/api_hasil_evaluasi_per_jenis','dosen\HasilEvaluasiController@apiHasilEvaluasiPerJenis')->name('dosen.api_hasil_evaluasi_per_jenis');
	Route::get('/api_saran_mahasiswa','dosen\HasilEvaluasiController@apisaranMahasiswa')->name('dosen.api_saran_mahasiswa');
});
//End of route Dosen