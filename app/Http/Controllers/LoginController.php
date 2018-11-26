<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Session;
use Carbon\Carbon;
use DB;


class LoginController extends Controller
{

	public function show()
	{
		echo $this->var();
	}

	public function var(){
		return 'abc';
	}

    public function showLoginForm()
    {
    	return view('auth.login');
    }

    public function pandaToken()
   	{
    	$client = new Client();

        $url = 'https://panda.unib.ac.id/api/login';
	      try {
	        $response = $client->request(
	            'POST',  $url, ['form_params' => ['email' => 'evaluasi@unib.ac.id', 'password' => 'evaluasi2018']]
	        );
	        $obj = json_decode($response->getBody(),true);
	        Session::put('token', $obj['token']);
	        return $obj['token'];
	        // dd($obj);
	      } catch (GuzzleHttp\Exception\BadResponseException $e) {
	        echo "<h1 style='color:red'>[Ditolak !]</h1>";
	        exit();
	      }
    }
    public function pandaLogin(Request $request){
    	$username = $request->username;
    	$password = $request->password;
    	// dd($username, $password);
    	$query = '
			{portallogin(username:"'.$username.'", password:"'.$password.'") {
			  is_access
			  tusrThakrId
			}}
    	';
    	$data = $this->panda($query)['portallogin'];

    	$data_mahasiswa = '

			{mahasiswa(mhsNiu:"'.$username.'") {
			  mhsNiu
			  mhsNama
			  mhsProdiKode
              krs {
                krsId
                kelas {
                  klsId
                  klsSemId
                }
              }
			}}

    	';

    	$data_dosen = '

			{dosen(dsnPegNip: "'.$username.'") {
			  dsnPegNip
			  dsnNidn
			  pegawai{
			    pegNama
			    pegGelarBelakang
			  }
			}}

    	';
    	// dd($data_mahasiswa);

    	if($data[0]['is_access']==1){
    		if($data[0]['tusrThakrId']==1){
    			$mahasiswa = $this->panda($data_mahasiswa);
                // $tahun = Carbon::now()->format('Y').'1';
                $bulan = date('m',time());
                if($bulan>=1 && $bulan<=6)
                {
                    $tahun = Carbon::now()->format('Y').'2';
                }
                elseif ($bulan>=7 && $bulan<=12) {
                    $tahun = Carbon::now()->format('Y').'1';
                }
                // dd($tahun);
                $sem = substr($mahasiswa['mahasiswa'][0]['krs'][0]['kelas'][0]['klsSemId'],-1);
                // dd($sem);
                // dd($tahun);
    			Session::put('akses','Mahasiswa');
    			Session::put('nama',$mahasiswa['mahasiswa'][0]['mhsNama']);
                Session::put('nip',$mahasiswa['mahasiswa'][0]['mhsNiu']);
    			Session::put('klsSemId',$tahun);
    			Session::put('kode_prodi',$mahasiswa['mahasiswa'][0]['mhsProdiKode']);
                Session::put('login',TRUE);

    			return redirect()->route('mahasiswa.dashboard');
    		}else if($data[0]['tusrThakrId']==2){
    			$dosen = $this->panda($data_dosen);
    			Session::put('akses','Dosen');
    			Session::put('nip',$dosen['dosen'][0]['dsnPegNip']);
    			Session::put('nama',$dosen['dosen'][0]['pegawai']['pegNama']);
    			Session::put('gelar',$dosen['dosen'][0]['pegawai']['pegGelarBelakang']);
                Session::put('login',TRUE);
                
                // dd($dosen);
    			return redirect()->route('dosen.dashboard');
    		}else{
    			echo "<script>alert('akses tidak diizinkan');</script>";
    		}
    	}else{
    		echo "<script>alert('username dan password salah');window.location.href='/login123';</script>";
    	}
    	// print_r($data);
    }
    public function panda($query){
        $client = new Client();
        try {
            $response = $client->request(
                'POST','https://panda.unib.ac.id/panda',
                ['form_params' => ['token' => $this->pandaToken(), 'query' => $query]]
            );
            $arr = json_decode($response->getBody(),true);
            if(!empty($arr['errors'])){
                echo "<h1><i>Kesalahan Query...</i></h1>";
            }else{
                return $arr['data'];
            }
        } catch (GuzzleHttp\Exception\BadResponseException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            $res = json_decode($responseBodyAsString,true);
            if($res['message']=='Unauthorized'){
                echo "<h1><i>Meminta Akses ke Pangkalan Data...</i></h1>";
                $this->panda_token();
                header("Refresh:0");
            }else{
                print_r($res);
            }
        }
    }

    public function getData($npm,$klsSemId){
        if (!Session::get('login')) {
          return redirect()->route('sievaluasi.loginform');
        }
        else
        {
            if(!empty(Session::get('akses','Mahasiswa')))
            {
                $sem = $klsSemId;
                $qr_mk = '
                    {mahasiswa(mhsNiu:"'.Session::get('nip').'") {
                      mhsNiu
                      mhsNama
                      mhsProdiKode
                      prodi {
                        prodiKode
                        prodiNamaResmi
                        prodiFakKode
                        fakultas {
                          fakKode
                          fakKodeUniv
                          fakNamaResmi
                        }
                      }
                      krs(semId:'.$klsSemId.') {
                        krsId
                        kelas   {
                          klsId
                          klsSemId
                          klsNama
                          klsMkkurId
                          dosen {
                            dsnPegNip
                            dsnNidn
                            pegawai {
                              pegNip
                              pegNama
                              pegGelarDepan
                              pegGelarBelakang
                            }
                          }
                          matakuliah {
                            mkkurId
                            mkkurKode
                            mkkurNamaResmi
                            mkkurProdiKode
                            mkkurJumlahSksKurikulum
                            mkkurJumlahSksTeori
                            mkkurJumlahSksPraktikum
                            mkkurJumlahSksPraktikumLapangan
                          }
                        }
                      }
                    }}
                ';
                $mk = $this->panda($qr_mk);
                // dd($mk);
                // dd($sudah);
                // foreach ($sudah as $sudah) {
                    // dd($sudah->kelas);
                // }
                $data = array(
                    'title'     => 'Data Mata Kuliah',
                    'data'      => $mk,
                    'klsSemId'  => $klsSemId,
                    'isi'       => 'mahasiswa/daftar_matkul'
                );

                
                // dd($sudah);
                // dd($matkul);
                // dd($data['klsSemId']);;
                // dd($mk['mahasiswa'][0]);
                // echo '<pre>',print_r($mk,1  ),'</pre>';
                // dd($data['data']);
                // dd($data);
                return view('mahasiswa/daftar_matkul')->with('data',$data);
            }
            else
            {
                return redirect()->route('sievaluasi.loginform');
            }
        }
        
        
    }

    // public function cariMatkul()
    // {
    //     if (!Session::get('login')) {
    //       return redirect()->route('sievaluasi.loginform');
    //     }
    //     else
    //     {
    //         if(!empty(Session::get('akses','Mahasiswa')))
    //         {
    //             $get_matkul = '

    //                 {mahasiswa(mhsNiu:"'.Session::get('nip').'") {
    //                   mhsNiu
    //                   mhsNama
    //                   mhsProdiKode
    //                   prodi {
    //                     prodiKode
    //                     prodiNamaResmi
    //                     prodiFakKode
    //                     fakultas {
    //                       fakKode
    //                       fakKodeUniv
    //                       fakNamaResmi
    //                     }
    //                   }
    //                   krs{
    //                     krsId
    //                     kelas   {
    //                       klsId
    //                       klsSemId
    //                       klsNama
    //                       klsMkkurId
    //                       dosen {
    //                         dsnPegNip
    //                         dsnNidn
    //                         pegawai {
    //                           pegNip
    //                           pegNama
    //                           pegGelarDepan
    //                           pegGelarBelakang
    //                         }
    //                       }
    //                       matakuliah {
    //                         mkkurId
    //                         mkkurKode
    //                         mkkurNamaResmi
    //                         mkkurProdiKode
    //                         mkkurJumlahSksKurikulum
    //                         mkkurJumlahSksTeori
    //                         mkkurJumlahSksPraktikum
    //                         mkkurJumlahSksPraktikumLapangan
    //                       }
    //                     }
    //                   }
    //                 }}

    //             ';
    //             $matkul = $this->panda($get_matkul);
    //             // dd($matkul);
    //             $data = array(
    //                 'title'     => 'Data Mata Kuliah',
    //                 'data'      => $matkul,
    //                 'isi'       => 'mahasiswa/daftar_matkul'
    //             );
    //             dd($data);
    //             $a=1;
    //             // return view('mahasiswa/berikan_evaluasi')->with('data',$a);
    //         }
    //         else
    //         {
    //             return redirect()->route('sievaluasi.loginform');
    //         }
    //     }
    // }

    public function logoutMahasiswa()
    {
        Session::flush();
        return redirect()->route('sievaluasi.loginform');
    }

    public function logoutDosen()
    {
        Session::flush();
        return redirect()->route('sievaluasi.loginform');
    }
}
