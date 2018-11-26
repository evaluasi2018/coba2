<?php

namespace App\Http\Controllers\Dosen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Session;

class DashboardController extends Controller
{
    public function index()
    {
    	$chart_jenis = DB::table('tb_evaluasi')
                  	->join('tb_indikator_penilaian','tb_indikator_penilaian.id_indikator','=','tb_evaluasi.id_indikator')
                  	->leftJoin('tb_jenis_indikator','tb_jenis_indikator.id_jenis_indikator','=','tb_indikator_penilaian.id_jenis_indikator')
                  	->select('tb_jenis_indikator.nm_jenis_indikator',DB::raw('sum(nilai) as totalnilai'))
                    ->groupBy('tb_jenis_indikator.id_jenis_indikator')
                  	->where('tb_evaluasi.nip',Session::get('nip'))
                  	->get();
                    // dd($chart_jenis);

      $chart_indikator = DB::table('tb_evaluasi')
                    ->join('tb_indikator_penilaian','tb_indikator_penilaian.id_indikator','=','tb_evaluasi.id_indikator')
                    ->join('tb_jenis_indikator','tb_jenis_indikator.id_jenis_indikator','=','tb_indikator_penilaian.id_jenis_indikator')
                    ->select('tb_indikator_penilaian.indikator',DB::raw('sum(nilai) as totalnilai'))
                    ->where('tb_evaluasi.nip',Session::get('nip'))
                    ->groupBy('tb_indikator_penilaian.id_indikator')
                    ->get();
                    // dd($chart_indikator);

        $saran = DB::table('tb_saran')
                ->select('nip','nm_matkul','id_kelas','saran')
                ->orderBy('tb_saran.created_at','DESC')->take(5)->get();

        $jumlah_saran = Count($saran);

        if (!Session::get('login')) {
          return redirect()->route('sievaluasi.loginform');
        }
        else
        {
          return view('dosen/dashboard')->with('chart',$chart_jenis)->with('saran',$saran)->with('jumlah_saran',$jumlah_saran)->with('chart2',$chart_indikator);
        }

    	
    }
}