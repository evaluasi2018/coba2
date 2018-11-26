<?php

namespace App\Http\Controllers\dosen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use DB;
use Session;
use Auth;

class HasilEvaluasiController extends Controller
{
    public function hasilEvaluasi()
    {
    	return view('dosen/hasil_evaluasi');
    }

    public function apiHasilEvaluasi()
    {
    	DB::statement(DB::raw('set @rownum=0'));
        $matkul_dosen = DB::table('tb_evaluasi')
                    ->join('tb_indikator_penilaian','tb_indikator_penilaian.id_indikator','tb_evaluasi.id_indikator')
                    ->select('nm_matkul','id_kelas','indikator','tb_evaluasi.nilai',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
                    ->where('nip',Session::get('nip'))
                    ->get();
        return Datatables::of($matkul_dosen)
            ->addColumn('action',function($matkul_dosen){
            })->make(true);
    }

    public function hasilEvaluasiPerJenis()
    {
        return view('dosen/hasil_evaluasi_per_jenis');
    }

    public function apiHasilEvaluasiPerJenis()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $matkul_dosen = DB::table('tb_evaluasi')
                    ->join('tb_indikator_penilaian','tb_indikator_penilaian.id_indikator','tb_evaluasi.id_indikator')
                    ->join('tb_jenis_indikator','tb_jenis_indikator.id_jenis_indikator','tb_indikator_penilaian.id_jenis_indikator')
                    ->select('nm_matkul','id_kelas','nm_jenis_indikator',DB::raw('@rownum  := @rownum  + 1 AS rownum'),DB::raw('sum(nilai) as totalnilai'))
                    ->groupBy('tb_jenis_indikator.id_jenis_indikator')
                    ->where('nip',Session::get('nip'))
                    ->get();
        return Datatables::of($matkul_dosen)
            ->addColumn('action',function($matkul_dosen){
            })->make(true);
    }

    public function hasilEvaluasiPerMataKuliah()
    {
        return view('dosen/hasil_evaluasi_per_mata_kuliah');
    }

    public function apiHasilEvaluasiPerMataKuliah(Request $request)
    {
        $hasil = DB::table('tb_evaluasi')
                        ->join('tb_indikator_penilaian','tb_indikator_penilaian.id_indikator','tb_evaluasi.id_indikator')
                        ->select('nm_matkul','indikator','id_kelas','semester','nip',DB::raw('sum(nilai)as totalnilai'))
                        ->groupBy('tb_indikator_penilaian.indikator')
                        ->where('nip',Session::get('nip'))
                        ->where('id_matkul',$request->id_matkul)
                        ->get();
                        dd($hasil);
        return view('dosen/hasil_evaluasi_per_mata_kuliah',compact('hasil'));
    }

    public function saranMahasiswa()
    {
        return view('dosen/saran_mahasiswa');
    }

    public function apiSaranMahasiswa()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $saran = DB::table('tb_saran')
                ->select('saran','id_kelas','nm_matkul','semester',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
                ->get();
        return Datatables::of($saran)
            ->addColumn('action',function($saran){
            })->make(true);
    }
}