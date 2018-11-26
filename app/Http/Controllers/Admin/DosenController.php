<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use DB;
use App\Admin\JenisIndikator;

class DosenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
    	return view('admin/manajemen_dosen.index');
    }

    public function apiDosen()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $dosen = DB::table('tb_dosen')
        			->join('tb_prodi','tb_prodi.id_prodi','=','tb_dosen.id_prodi')
        			->join('tb_fakultas','tb_fakultas.id_fakultas','=','tb_prodi.id_fakultas')
        			->select('tb_dosen.nip','tb_dosen.nm_dosen','tb_prodi.nm_prodi','tb_fakultas.nm_fakultas',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        			->get();
        return Datatables::of($dosen)
            ->addColumn('action',function($dosen){
               
            })->make(true);
    }
}
