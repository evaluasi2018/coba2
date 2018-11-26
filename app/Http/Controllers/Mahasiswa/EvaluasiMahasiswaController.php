<?php

namespace App\Http\Controllers\Mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use DB;
use Session;
use Auth;
use App\Http\Controllers\LoginController;

class EvaluasiMahasiswaController extends Controller
{

    public function berikanEvaluasi($klsId,$pegNip)
    {
        $panda = new LoginController();
        if (!Session::get('login')) {
          return redirect()->route('sievaluasi.loginform');
        }
        else
        {
            if(!empty(Session::get('akses','Mahasiswa')))
            {
                // $kelas = $klsId;
                // dd($kelas);
                $datas = '

                    {kelas(klsId:'.$klsId.') {
                      klsId
                      klsSemId
                      dosen {
                        dsnPegNip
                        dsnNidn
                        pegawai {
                          pegNip
                          pegNama
                          pegGelarDepan
                          pegGelarBelakang
                          pegIsAktif
                          pegTanggalLahir
                          pegGolrKodePns
                        }
                      }
                      matakuliah {
                        mkkurKode
                        mkkurNamaResmi
                      }
                    }}

                ';
                $matkul = $panda->panda($datas);
                foreach($matkul['kelas'][0]['dosen'] as $arr){
                    if($arr['pegawai']['pegNip']!=$pegNip){
                        continue;
                    }
                    $nama = $arr['pegawai']['pegNama'];
                    $nip = $arr['pegawai']['pegNip'];
                }
                // dd($matkul);
                $data = array(
                    'title'     => 'Data Mata Kuliah',
                    'data'      => $matkul,
                    'nama'      => $nama,
                    'nip'      => $nip,
                    'isi'       => 'mahasiswa/daftar_matkul'
                );
                // dd($data);
                
                // dd($data);
                // dd($data['data']['kelas'][0]['dosen'][0]['pegawai']['pegNama']);
                // $a=1;
                return view('mahasiswa/berikan_evaluasi')->with('data',$data);
            }
            else
            {
                return redirect()->route('sievaluasi.loginform');
            }
        }
    }


    public function cariDosen(Request $request)
    {
       $npm = Session::get('nip');
        $sudah = DB::table('tb_evaluasi')
                ->join('tb_jadwal_perkuliahan','tb_jadwal_perkuliahan.id_jadwal_perkuliahan','tb_evaluasi.id_jadwal_perkuliahan')
                ->where('tb_evaluasi.npm',$npm)
                ->pluck('tb_evaluasi.id_jadwal_perkuliahan')->all();
        $cari_dosen = DB::table('tb_krs')
                ->join('tb_jadwal_perkuliahan',function($join){
                    $join->on('tb_jadwal_perkuliahan.id_matkul','tb_krs.id_matkul')
                        ->on('tb_jadwal_perkuliahan.kelas','tb_krs.kelas');
                })
                ->join('tb_matkul','tb_matkul.id_matkul','tb_jadwal_perkuliahan.id_matkul')
                ->join('tb_dosen','tb_dosen.nip','tb_jadwal_perkuliahan.nip')
                ->where('tb_krs.npm',Session::get('nip'))
                ->whereNotIn('tb_jadwal_perkuliahan.id_jadwal_perkuliahan',$sudah)
                ->select('tb_dosen.nm_dosen','tb_jadwal_perkuliahan.id_jadwal_perkuliahan','tb_dosen.nip')
                ->where('tb_matkul.id_matkul',$request->id)
                ->get();
                return response()->json($cari_dosen);
    }
        

    public function riwayatEvaluasi()
    {
        return view('mahasiswa/riwayat_evaluasi');
    }

    public function apiRiwayatEvaluasi()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $riwayat_detail = DB::table('tb_evaluasi')
                            // ->join('tb_indikator_penilaian','tb_indikator_penilaian.id_indikator','tb_evaluasi.id_indikator')
                            // ->join('tb_jadwal_perkuliahan','tb_jadwal_perkuliahan.id_jadwal_perkuliahan','tb_evaluasi.id_jadwal_perkuliahan')
                            // ->join('tb_matkul','tb_matkul.id_matkul','tb_jadwal_perkuliahan.id_matkul')
                            // ->join('tb_semester','tb_semester.id_semester','tb_jadwal_perkuliahan.id_semester')
                            // ->join('tb_dosen','tb_dosen.nip','tb_jadwal_perkuliahan.nip')
                            // ->select('tb_dosen.nm_dosen','tb_matkul.nm_matkul','tb_evaluasi.nilai','tb_indikator_penilaian.indikator','tb_semester.nm_semester','tb_semester.tahun_ajaran',DB::raw('@rownum  := @rownum  + 1 AS rownum'))

                            // ->where('tb_evaluasi.npm',Session::get('nip'))
                            ->join('tb_indikator_penilaian','tb_indikator_penilaian.id_indikator','tb_evaluasi.id_indikator')
                            ->select('id_evaluasi','nm_dosen','nm_matkul','id_kelas','nilai','indikator',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
                            ->where('tb_evaluasi.npm',Session::get('nip'))
                            ->orderBy('id_evaluasi')
                            ->get();
                        return Datatables::of($riwayat_detail)
                            ->addColumn('action',function($riwayat_detail){
                            })->make(true);     
    }

    
    public function riwayatEvaluasiPerMatkul($npm, $klsSemId)
    {
        $panda = new LoginController();
        if (!Session::get('login')) {
          return redirect()->route('sievaluasi.loginform');
        }
        else
        {
            if(!empty(Session::get('akses','Mahasiswa')))
            {
                $matakuliah = '
                            {mahasiswa(mhsNiu:"'.Session::get('nip').'") {
                              mhsNiu
                              mhsNama
                              mhsProdiKode
                              
                              krs(semId:'.$klsSemId.') {
                                krsId
                                kelas   {
                                  klsId
                                  matakuliah {
                                    mkkurId
                                    mkkurKode
                                    mkkurNamaResmi
                                    
                                  }
                                }
                              }
                            }}
                        ';
                $matkul = $panda->panda($matakuliah);
                        // dd($mk);
                        // dd($sudah);
                        // foreach ($sudah as $sudah) {
                            // dd($sudah->kelas);
                        // }
                        $data = array(
                            'title'     => 'Data Mata Kuliah',
                            'data'      => $matkul,
                            'klsSemId'  => $klsSemId,
                            'isi'       => 'mahasiswa/riwayat_evaluasi_per_matkul'
                        );

                        if(isset($_GET['submit']))
                        {
                            $data_dosen = DB::table('tb_evaluasi')
                            ->join('tb_indikator_penilaian','tb_indikator_penilaian.id_indikator','tb_evaluasi.id_indikator')
                            // ->groupBy('tb_matkul.id_matkul')
                            ->select('nm_matkul','nm_dosen','semester','id_kelas','tb_indikator_penilaian.indikator','tb_evaluasi.nilai')
                            ->where('tb_evaluasi.npm',Session::get('nip'))
                            ->where('id_matkul',$_GET['nm_matkul'])
                            ->get();
                            // dd($data_dosen);
                            return view('mahasiswa/riwayat_evaluasi_per_matkul')->with('data2',$data_dosen)->with('data',$data);
                        }

                        
                        // dd($sudah);
                        // dd($matkul);
                        // dd($data['klsSemId']);;
                        // dd($mk['mahasiswa'][0]);
                        // echo '<pre>',print_r($matkul,1  ),'</pre>';
                        // dd($data['data']);
                        // dd($data);
                        return view('mahasiswa/riwayat_evaluasi_per_matkul')->with('data',$data);
                    }
                    else
                    {
                        return redirect()->route('sievaluasi.loginform');
                    }
            }
    }


    public function riwayatSaran()
    {
        return view('mahasiswa/riwayat_saran');
    }

    public function apiRiwayatSaran()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $riwayat_saran = DB::table('tb_saran')
                            ->select('saran','nm_matkul','id_kelas','nm_dosen',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
                            ->where('tb_saran.npm',Session::get('nip'))
                            ->get();
                        return Datatables::of($riwayat_saran)
                            ->addColumn('action',function($riwayat_saran){
                            })->make(true);     
    }
}
