<?php

namespace App\Http\Controllers\Mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DaftarMatkulController extends Controller
{
    public function daftarMatkul()
    {
    	return view('mahasiswa/daftar_matkul');
    }
}
