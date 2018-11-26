<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use DB;
use App\Admin\JenisIndikator;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
     public function index(){
    	return view('admin/manajemen_mahasiswa.index');
    }

    public function apiMahasiswa()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $mahasiswa = DB::table('tb_mahasiswa')
        			->join('tb_prodi','tb_prodi.id_prodi','=','tb_mahasiswa.id_prodi')
        			->join('tb_fakultas','tb_fakultas.id_fakultas','=','tb_prodi.id_fakultas')
        			->select('tb_mahasiswa.npm','tb_mahasiswa.nm_mahasiswa','tb_prodi.nm_prodi','tb_fakultas.nm_fakultas',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        			->get();
        return Datatables::of($mahasiswa)
            ->addColumn('action',function($mahasiswa){
               
            })->make(true);
    }
}
