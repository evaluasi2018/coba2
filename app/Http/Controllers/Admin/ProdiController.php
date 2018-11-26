<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use DB;
use App\Admin\JenisIndikator;

class ProdiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
    	return view('admin/manajemen_prodi.index');
    }

    public function apiProdi()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $prodi = DB::table('tb_prodi')
        		->join('tb_fakultas','tb_fakultas.id_fakultas','=','tb_prodi.id_fakultas')
        		->select('tb_prodi.id_prodi','tb_prodi.nm_prodi','tb_fakultas.nm_fakultas','tb_prodi.ket',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        		->get();
        return Datatables::of($prodi)->make(true);
    }
}