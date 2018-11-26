<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data ['jenis_indikator'] = DB::table('tb_jenis_indikator')->count();
        $data['indikator'] = DB::table('tb_indikator_penilaian')->count();

        $chart_jenis = DB::table('tb_evaluasi')
                      ->join('tb_indikator_penilaian','tb_indikator_penilaian.id_indikator','=','tb_evaluasi.id_indikator')
                      ->join('tb_jenis_indikator','tb_jenis_indikator.id_jenis_indikator','=','tb_indikator_penilaian.id_jenis_indikator')
                      ->select('tb_jenis_indikator.nm_jenis_indikator',DB::raw('sum(nilai) as totalnilai'))
                      ->groupBy('tb_jenis_indikator.id_jenis_indikator')
                      ->get();

        $chart_indikator = DB::table('tb_evaluasi')
                      ->join('tb_indikator_penilaian','tb_indikator_penilaian.id_indikator','=','tb_evaluasi.id_indikator')
                      ->select('tb_indikator_penilaian.indikator',DB::raw('sum(nilai) as totalnilai'))
                      ->groupBy('tb_indikator_penilaian.id_indikator')
                      ->get();
                      // dd($chart_indikator);

        return view('admin/dashboard')->with($data)->with('chart',$chart_indikator)->with('chart2',$chart_jenis);
    }

    // public function pieChart()
    // {
        
    // }
}
