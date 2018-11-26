<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use DB;
use App\Admin\Indikator;

class IndikatorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        return view('admin/manajemen_indikator.index');
    }

    public function store(Request $request)
    {
        $data = [
            'indikator'  =>  $request['indikator'],
            'id_jenis_indikator'  =>  $request['id_jenis_indikator'],
        ];

        Indikator::create($data);
        return view('admin/manajemen_indikator.index');
    }

    public function edit($id_indikator)
    {
        $indikator = Indikator::find($id_indikator);
        return $indikator;
    }

    public function update(Request $request, $id_indikator)
    {
        $indikator = Indikator::find($id_indikator);
        $indikator->indikator = $request['indikator'];
        $indikator->id_jenis_indikator = $request['id_jenis_indikator'];

        $indikator->update();
        return $indikator;
    }

    public function destroy($id_indikator)
    {
        Indikator::destroy($id_indikator);
    }

    public function apiIndikator()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $indikator = DB::table('tb_indikator_penilaian')
                ->join('tb_jenis_indikator','tb_jenis_indikator.id_jenis_indikator','=','tb_indikator_penilaian.id_jenis_indikator')
                ->select('tb_indikator_penilaian.indikator','tb_indikator_penilaian.id_indikator','tb_jenis_indikator.nm_jenis_indikator',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
                ->whereNull('tb_indikator_penilaian.deleted_at')
                ->get();
        return Datatables::of($indikator)
            ->addColumn('action',function($indikator){
                return
                '<a onclick="editIndikator('.$indikator->id_indikator.')" class="btn btn-primary btn-xs btn-flat"><i class="fa fa-edit btn-xs"></i></a> '.
                '<a onclick="hapusIndikator('.$indikator->id_indikator.')" class="btn btn-danger btn-xs btn-flat"><i class="fa fa-trash btn-xs"></i></a> ';
            })->make(true);
    }

    public function apiSampah()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $data = DB::table('tb_indikator_penilaian')
                          ->join('tb_jenis_indikator','tb_jenis_indikator.id_jenis_indikator','=','tb_indikator_penilaian.id_jenis_indikator')
                          ->select('tb_indikator_penilaian.id_indikator','tb_indikator_penilaian.indikator','tb_jenis_indikator.nm_jenis_indikator',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
                          ->whereNotNull('tb_indikator_penilaian.deleted_at')
                          ->get();
        return Datatables::of($data)
            ->addColumn('action',function($data){
                return
                '<a onclick="restoreSampahIndikator('.$data->id_indikator.')" class="btn btn-primary btn-xs btn-flat"><i class="fa fa-arrow-left" ></i></a> '.
                '<a onclick="hapusSampahIndikator('.$data->id_indikator.')" class="btn btn-danger btn-xs btn-flat"><i class="fa fa-trash" ></i></a> ';
            })->make(true);
    }

    public function indikatorRestore($id_indikator)
    {
        Indikator::onlyTrashed()->where('id_indikator',$id_indikator)->restore();
        return redirect()->route('manajemen.indikator');
    }
    public function indikatorRestoreAll()
    {
        Indikator::onlyTrashed()->restore();
        return redirect()->route('manajemen.indikator')->with('message','Semua Indikator Sudah Dikembalikan !');
    }

    public function indikatorForceDelete($id_indikator)
    {
        Indikator::onlyTrashed()->where('id_indikator',$id_indikator)->forceDelete();
        return redirect()->route('manajemen.indikator');
    }

    public function indikatorForceAll()
    {
        Indikator::onlyTrashed()->forceDelete();
        return redirect()->route('manajemen.indikator')->with('message','Semua Jenis Indikator Sudah Dihapus Permanen !');
    }
}
