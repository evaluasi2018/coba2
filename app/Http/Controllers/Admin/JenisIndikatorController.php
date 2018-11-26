<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use DB;
use App\Admin\JenisIndikator;

class JenisIndikatorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index() 
    {
        return view('admin.manajemen_jenis_indikator.index');
    }

    public function store(Request $request)
    {
        $data = [
            'nm_jenis_indikator'  =>  $request['nm_jenis_indikator'],
            'ket'  =>  $request['ket'],
        ];

        JenisIndikator::create($data);
        return view('admin/manajemen_jenis_indikator.index');
    }

    public function edit($id_jenis_indikator)
    {
        $jenis_indikator = JenisIndikator::find($id_jenis_indikator);
        return $jenis_indikator;
    }

    public function update(Request $request, $id_jenis_indikator)
    {
        $jenis_indikator = JenisIndikator::find($id_jenis_indikator);
        $jenis_indikator->nm_jenis_indikator = $request['nm_jenis_indikator'];
        $jenis_indikator->ket = $request['ket'];
        $jenis_indikator->update();
        return $jenis_indikator;
    }

    public function destroy($id_jenis_indikator)
    {
        JenisIndikator::destroy($id_jenis_indikator);
    }

    public function apiJenis()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $jenis = DB::table('tb_jenis_indikator')->select('id_jenis_indikator','nm_jenis_indikator','ket',DB::raw('@rownum  := @rownum  + 1 AS rownum'))->whereNull('deleted_at')->get();
        return Datatables::of($jenis)
            ->addColumn('action',function($jenis){
                return
                '<a onclick="editJenis('.$jenis->id_jenis_indikator.')"  class="btn btn-primary btn-xs btn-flat"><i class="glyphicon glyphicon-edit btn-xs"></i></a> '.
                '<a onclick="hapusJenis('.$jenis->id_jenis_indikator.')" class="btn btn-danger btn-xs btn-flat"><i class="glyphicon glyphicon-trash btn-xs"></i></a> ';
            })->make(true);
    }

    public function apiSampah()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $sampah = DB::table('tb_jenis_indikator')->select('id_jenis_indikator','nm_jenis_indikator','ket',DB::raw('@rownum  := @rownum  + 1 AS rownum'))->whereNotNull('deleted_at')->get();
        return Datatables::of($sampah)
            ->addColumn('action',function($sampah){
                return
                '<a onclick="restoreSampahJenis('.$sampah->id_jenis_indikator.')" class="btn btn-primary btn-xs btn-flat"><i class="glyphicon glyphicon-arrow-left btn-xs"></i></a> '.
                '<a onclick="hapusSampahJenis('.$sampah->id_jenis_indikator.')" class="btn btn-danger btn-xs btn-flat"><i class="glyphicon glyphicon-trash btn-xs"></i></a> ';
            })->make(true);
    }

    public function jenisRestore($id_jenis_indikator)
    {
        JenisIndikator::onlyTrashed()->where('id_jenis_indikator',$id_jenis_indikator)->restore();
        return redirect()->route('manajemen.jenis_indikator');
    }
    public function jenisRestoreAll()
    {
        JenisIndikator::onlyTrashed()->restore();
        return redirect()->route('manajemen.jenis_indikator')->with('message','Semua Jenis Indikator Sudah Dikembalikan !');
    }

    public function jenisForceDelete($id_jenis_indikator)
    {
        JenisIndikator::onlyTrashed()->where('id_jenis_indikator',$id_jenis_indikator)->forceDelete();
        return redirect()->route('manajemen.jenis_indikator');
    }

    public function jenisForceAll()
    {
        JenisIndikator::onlyTrashed()->forceDelete();
        return redirect()->route('manajemen.jenis_indikator')->with('message','Semua Jenis Indikator Sudah Dihapus Permanen !');
    }
}
