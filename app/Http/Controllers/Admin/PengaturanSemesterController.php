<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Admin\PengaturanSemester;
use DB;

class PengaturanSemesterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        return view('admin/manajemen_pengaturan_semester.index');
    }
    
    public function store(Request $request)
    {
        $data = [
            'nm_semester'  =>  $request['nm_semester'],
            'tahun_ajaran'  =>  $request['tahun_pertama'].'/'.$request['tahun_kedua'],
            'status'  =>  $request['status'],
        ];

        PengaturanSemester::create($data);
        return view('admin/manajemen_pengaturan_semester.index');
    }

    public function edit($id_semester)
    {
        $semester = PengaturanSemester::find($id_semester);
        return $semester;
    }

    public function update(Request $request, $id_semester)
    {
        $indikator = PengaturanSemester::find($id_semester);
        $indikator->nm_semester = $request['nm_semester'];
        $indikator->tahun_ajaran = $request['tahun_ajaran'];
        $indikator->status = $request['status'];

        $indikator->update();
        return $indikator;
    }

    public function destroy($id_semester)
    {
        PengaturanSemester::destroy($id_semester);
    }

    public function apiSemester()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $data = DB::table('tb_semester')
                ->select('nm_semester','id_semester','tahun_ajaran','status',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
                ->whereNull('deleted_at')
                ->get();
        return Datatables::of($data)
            ->addColumn('action',function($data){
                return 
                    '<a onclick="editSemester('.$data->id_semester.')" class="btn btn-primary btn-xs btn-flat"><i class="glyphicon glyphicon-edit btn-xs"></i></a> '.
                    '<a onclick="hapusSemester('.$data->id_semester.')" class="btn btn-danger btn-xs btn-flat"><i class="glyphicon glyphicon-trash btn-xs"></i></a> ';
            })->make(true);
    }

    public function apiSampahSemester()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $data = DB::table('tb_semester')
                ->select('nm_semester','id_semester','tahun_ajaran','status',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
                ->whereNotNull('deleted_at')
                ->get();
        return Datatables::of($data)
            ->addColumn('action',function($data){
                return
                '<a onclick="restoreSampahSemester('.$data->id_semester.')" class="btn btn-primary btn-xs btn-flat"><i class="glyphicon glyphicon-arrow-left btn-xs"></i></a> '.
                '<a onclick="hapusSampahSemester('.$data->id_semester.')" class="btn btn-danger btn-xs btn-flat"><i class="glyphicon glyphicon-trash btn-xs"></i></a> ';
            })->make(true);
    }

    public function semesterRestore($id_semester)
    {
        PengaturanSemester::onlyTrashed()->where('id_semester',$id_semester)->restore();
        return redirect()->route('manajemen.semester');
    }
    public function semesterRestoreAll()
    {
        PengaturanSemester::onlyTrashed()->restore();
        return redirect()->route('manajemen.semester')->with('message','Semua semester Sudah Dikembalikan !');
    }

    public function semesterForceDelete($id_semester)
    {
        PengaturanSemester::onlyTrashed()->where('id_semester',$id_semester)->forceDelete();
        return redirect()->route('manajemen.semester');
    }

    public function semesterForceAll()
    {
        PengaturanSemester::onlyTrashed()->forceDelete();
        return redirect()->route('manajemen.semester')->with('message','Semua semester Sudah Dihapus Permanen !');
    }
}
