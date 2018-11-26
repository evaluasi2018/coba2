<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Evaluasi;
use Yajra\DataTables\DataTables;
use PDF;
use Auth;

class LaporanEvaluasiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function laporanDetail()
   	{
   		return view('admin/laporan_evaluasi.detail');
   	}
   	
   	public function apiLaporanDetail()
    {
       DB::statement(DB::raw('set @rownum=0'));
        $laporan = DB::table('tb_evaluasi')
              ->join('tb_indikator_penilaian','tb_indikator_penilaian.id_indikator','tb_evaluasi.id_indikator')
              ->select('nm_dosen','nm_matkul','id_kelas','indikator',DB::raw('sum(nilai)as totalnilai'),DB::raw('@rownum  := @rownum  + 1 AS rownum'))
              ->groupBy('tb_evaluasi.id_indikator','nip')
              ->orderBy('id_evaluasi')
              ->get();
        return Datatables::of($laporan)
            ->addColumn('action',function($laporan){
            })->make(true);
            
    }

    public function detailExportPDF()
    {
      $laporans = DB::table('tb_evaluasi')
              ->join('tb_jadwal_perkuliahan','tb_jadwal_perkuliahan.id_jadwal_perkuliahan','=','tb_evaluasi.id_jadwal_perkuliahan')
              ->join('tb_mahasiswa','tb_mahasiswa.npm','=','tb_evaluasi.npm')
              ->join('tb_indikator_penilaian','tb_indikator_penilaian.id_indikator','=','tb_evaluasi.id_indikator')
              ->join('tb_matkul','tb_matkul.id_matkul','=','tb_jadwal_perkuliahan.id_matkul')
              ->join('tb_dosen','tb_dosen.nip','=','tb_jadwal_perkuliahan.nip')
              ->join('tb_semester','tb_semester.id_semester','=','tb_jadwal_perkuliahan.id_semester')
              ->join('tb_prodi','tb_prodi.id_prodi','=','tb_matkul.id_prodi')
              ->join('tb_fakultas','tb_fakultas.id_fakultas','=','tb_prodi.id_fakultas')
              ->select('tb_evaluasi.id_evaluasi','tb_dosen.nm_dosen','tb_matkul.nm_matkul','tb_prodi.nm_prodi','tb_fakultas.nm_fakultas','tb_jadwal_perkuliahan.kelas','tb_evaluasi.id_indikator',DB::raw('sum(nilai)as totalnilai'))
              ->groupBy('tb_evaluasi.id_indikator','tb_evaluasi.id_jadwal_perkuliahan')
              ->get();
      $pdf = PDF::loadView('admin/laporan_evaluasi.detailpdf', compact('laporans'));
      $pdf->setPaper('a4','portrait');
      return $pdf->stream();
    }

    public function laporanPerJenis()
    {
      return view('admin/laporan_evaluasi.laporan_per_jenis');
    }

    public function apilaporanPerJenis()
    {
      DB::statement(DB::raw('set @rownum=0'));
      $data = DB::table('tb_evaluasi')
              ->join('tb_indikator_penilaian','tb_indikator_penilaian.id_indikator','=','tb_evaluasi.id_indikator')
              ->join('tb_jenis_indikator','tb_jenis_indikator.id_jenis_indikator','=','tb_indikator_penilaian.id_jenis_indikator')
              ->select('id_evaluasi','nm_matkul','nm_dosen','id_kelas','nm_jenis_indikator','tb_jenis_indikator.id_jenis_indikator',DB::raw('sum(nilai) as totalnilai'),DB::raw('@rownum  := @rownum  + 1 AS rownum'))
              ->groupBy('tb_indikator_penilaian.id_jenis_indikator','nip')
              ->orderBy('id_evaluasi')
              ->get();
      return Datatables::of($data)
            ->addColumn('action',function($data){
            })->make(true);
    }

    public function laporanPerJenisExportPDF()
    {
      $export_per_jenis = DB::table('tb_evaluasi')
              ->join('tb_jadwal_perkuliahan','tb_jadwal_perkuliahan.id_jadwal_perkuliahan','=','tb_evaluasi.id_jadwal_perkuliahan')
              ->join('tb_mahasiswa','tb_mahasiswa.npm','=','tb_evaluasi.npm')
              ->join('tb_indikator_penilaian','tb_indikator_penilaian.id_indikator','=','tb_evaluasi.id_indikator')
              ->join('tb_jenis_indikator','tb_jenis_indikator.id_jenis_indikator','=','tb_indikator_penilaian.id_jenis_indikator')
              ->join('tb_matkul','tb_matkul.id_matkul','=','tb_jadwal_perkuliahan.id_matkul')
              ->join('tb_dosen','tb_dosen.nip','=','tb_jadwal_perkuliahan.nip')
              ->join('tb_semester','tb_semester.id_semester','=','tb_jadwal_perkuliahan.id_semester')
              ->join('tb_prodi','tb_prodi.id_prodi','=','tb_matkul.id_prodi')
              ->join('tb_fakultas','tb_fakultas.id_fakultas','=','tb_prodi.id_fakultas')
              ->select('tb_evaluasi.id_evaluasi',DB::raw('sum(nilai) as totalnilai'),'tb_mahasiswa.nm_mahasiswa','tb_dosen.nm_dosen','tb_matkul.nm_matkul','tb_prodi.nm_prodi','tb_fakultas.nm_fakultas','tb_jadwal_perkuliahan.kelas','tb_evaluasi.nilai','tb_indikator_penilaian.id_jenis_indikator')
              ->groupBy('tb_indikator_penilaian.id_jenis_indikator','tb_evaluasi.id_jadwal_perkuliahan')
              ->orderBy('tb_evaluasi.id_evaluasi','ASC')
              ->get();
      $pdf = PDF::loadView('admin/laporan_evaluasi.laporan_per_jenis_pdf', compact('export_per_jenis'));
      $pdf->setPaper('a4','portrait');
      return $pdf->stream();
    }

    public function laporanPerDosen()
    {
      return view('admin/laporan_evaluasi.laporan_per_dosen');
    }

    public function cariProdi(Request $request)
    {
      $data = DB::table('tb_prodi')->select('tb_prodi.id_prodi','tb_prodi.nm_prodi')
              ->where('id_fakultas',$request->id)
              ->get();
      return response()->json($data);
    }

    public function cariDosen(Request $request)
    {
      $data_dosen = DB::table('tb_dosen')
                    ->join('tb_jadwal_perkuliahan','tb_jadwal_perkuliahan.nip','tb_dosen.nip')
                    ->join('tb_matkul','tb_matkul.id_matkul','tb_jadwal_perkuliahan.id_matkul')
                    ->join('tb_prodi','tb_prodi.id_prodi','tb_matkul.id_prodi')
                    ->select('tb_dosen.nip','tb_dosen.nm_dosen','tb_prodi.id_prodi')
                    ->groupBy('tb_dosen.nm_dosen')
                    ->where('tb_prodi.id_prodi',$request->id)
                    ->get();
      return response()->json($data_dosen);
    }

    public function apiLaporanEvaluasiPerDosen(Request $request)
    {
      $get_data = DB::table('tb_evaluasi')
              ->join('tb_jadwal_perkuliahan','tb_jadwal_perkuliahan.id_jadwal_perkuliahan','=','tb_evaluasi.id_jadwal_perkuliahan')
              ->join('tb_matkul','tb_matkul.id_matkul','=','tb_jadwal_perkuliahan.id_matkul')
              ->join('tb_dosen','tb_dosen.nip','=','tb_jadwal_perkuliahan.nip')
              ->join('tb_semester','tb_semester.id_semester','=','tb_jadwal_perkuliahan.id_semester')
              ->join('tb_prodi','tb_prodi.id_prodi','=','tb_matkul.id_prodi')
              ->join('tb_fakultas','tb_fakultas.id_fakultas','=','tb_prodi.id_fakultas')
              ->select('tb_dosen.nm_dosen','tb_matkul.nm_matkul','tb_prodi.nm_prodi','tb_fakultas.nm_fakultas','tb_jadwal_perkuliahan.kelas','tb_semester.nm_semester','tb_semester.tahun_ajaran',DB::raw('sum(nilai) as totalnilai'))
              ->groupBy('tb_matkul.id_matkul')
              ->where('tb_fakultas.id_fakultas','=',$request->nm_fakultas)
              ->where('tb_prodi.id_prodi','=', $request->nm_prodi)
              ->where('tb_dosen.nip','=',$request->nm_dosen)
              ->get();
      // $pdf = PDF::loadView('admin/laporan_evaluasi.laporan_per_dosen_pdf', compact('get_data'));
      // $pdf->setPaper('a4','portrait');
      // return $pdf->stream();
      return view('admin/laporan_evaluasi.laporan_per_dosen',compact('get_data'));
    }
}
