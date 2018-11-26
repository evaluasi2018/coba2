<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use DB;
use App\Admin\JenisIndikator;

class JadwalPerkuliahanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
    	return view('admin/manajemen_jadwal_perkuliahan.index');
    }

    public function apiJadwalPerkuliahan()
    {
        DB::statement(DB::raw('set @rownum=0'));
    	$jadwal = DB::table('tb_jadwal_perkuliahan')
    			->join('tb_matkul','tb_matkul.id_matkul','=','tb_jadwal_perkuliahan.id_matkul')
    			->join('tb_dosen','tb_dosen.nip','=','tb_jadwal_perkuliahan.nip')
    			->join('tb_semester','tb_semester.id_semester','=','tb_jadwal_perkuliahan.id_semester')
    			->join('tb_prodi','tb_prodi.id_prodi','=','tb_matkul.id_prodi')
    			->join('tb_fakultas','tb_fakultas.id_fakultas','=','tb_prodi.id_fakultas')
    			->select('tb_jadwal_perkuliahan.id_jadwal_perkuliahan','tb_matkul.nm_matkul','tb_prodi.nm_prodi','tb_fakultas.nm_fakultas','tb_dosen.nm_dosen','tb_semester.nm_semester','tb_jadwal_perkuliahan.kelas',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
    			->get();
    	return Datatables::of($jadwal)->make(true);
    }
}
