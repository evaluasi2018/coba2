<?php

namespace App\Http\Controllers\Mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Mahasiswa\Evaluasi;
use App\Mahasiswa\Saran;
use Auth;
use Session;

class InsertKuisionerController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:mahasiswa');
    // }
    
    public function insertKuisioner(Request $request){
    	$jumlah = $request->jumlah;
    	$kuisioner = array();
    	for($i=1; $i<=$jumlah;$i++)
    	{
    		$kuisioner [] =  array(
    			'npm'	=> $request->npm,
    			'nip'    => $request->nip,
                'nm_dosen'  => $request->nm_dosen2.$request->gelardepan.$request->gelarbelakang,
                'id_matkul' =>  $request->id_matkul,
                'nm_matkul' =>  $request->nm_matkul2,
                'id_kelas' => $request->id_kelas,
                'semester' => $request->semester,
    			'id_indikator'	=>$request->nilai.$i,
    			'nilai'	=> $_POST['nilai'.$i],
    		);
    	}
    	// dd($kuisioner);
    	Evaluasi::insert($kuisioner);

        $saran = array(

            'npm'   => $request->npm,
            'nip'    => $request->nip,
            'nm_dosen'  => $request->nm_dosen2.$request->gelardepan.$request->gelarbelakang,
            'id_matkul' =>  $request->id_matkul,
            'nm_matkul' =>  $request->nm_matkul2,
            'id_kelas' => $request->id_kelas,
            'semester' => $request->semester,
            'saran' =>$request->saran
        );

        // dd($saran,$kuisioner);
        $evaluasi = Saran::insert($saran);
    	if($evaluasi == true)
        {
            $notification = array(
                'message'   =>  'Evaluasi Berhasil diisi !!',
                'alert-type' => 'success'
            );
        }
        else
        {
            $notification = array(
                'message'   =>  'Error! Evaluasi Gagal diisi !!',
                'alert-type' => 'error'
            );  
        }
        return redirect()->route('mahasiswa.daftar_matkul',[Session::get('nip'),Session::get('klsSemId')])->with($notification);
    }
}

