<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use DB;
use App\Admin\JenisIndikator;

class FakultasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
    	return view('admin/manajemen_fakultas.index');
    }

    public function apiFakultas()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $fakultas = DB::table('tb_fakultas')
                    ->select('id_fakultas','nm_fakultas','ket',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
        			->get();
        return Datatables::of($fakultas)->make(true);
    }
}
