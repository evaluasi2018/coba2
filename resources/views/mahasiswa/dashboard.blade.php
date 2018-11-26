@extends('layouts/template')
@section('main-title','Dashboard Admin')
@section('sidebar')
	@include('mahasiswa/sidebar')
@endsection
@section('manajemen-title')
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-dashboard"></i>&nbsp;DASHBOARD MAHASISWA</h3>
        <div class="box-tools pull-right">
            @yield('pull-right')
        </div>
    </div>
@endsection
@section('second-box-header')
    <div class="box-header with-border">
        Selamat Datang <b>{{ Session::get('nama') }}</b> di Sistem Informasi Evaluasi Universitas Bengkulu, Sebelum Mengisi, Silahkan Baca Petunjuk Terlebih Dahulu Sebelum Melakukan Evaluasi !! 
    </div>
@endsection
@section('content')
	<div class="row" id="petunjuk">
    <div class="col-md-12" id="petunjuk-data">
        <div class="alert alert-success">
            <p style="text-transform: uppercase;"><img src="{{ asset('assets/images/light.png') }}" style="width: 30px;" alt="">&nbsp;<b>petunjuk pemberian evaluasi </b></p>
            <p style="margin-bottom:5px; text-align: justify;text-indent: 50px;margin-bottom: 10px;">
                "Sesuai dengan yang saudara ketahui, berilah penilaian secara  jujur, obyektif dan penuh tanggung jawab terhadap Dosen yang mengajar Saudara. Tidak perlu menuliskan nama dan NPM saudara. Informasi yang saudara berikan hanya akan dipergunakan dalam proses monitoring dan evaluasi guna peningkatan kompetensi dosen dalam proses pembalajaran kepada mahasiswa.  Penilaian yang saudara berikan tidak akan berpengaruh terhadap status saudara sebagai mahasiswa. Gunakan skala penilaian (skor) berikut ini untuk menjawab setiap pernyataan, dengan menuliskan nilai skor pada kolom yang sesuai. 5=Sangat Setuju 5, 4=Setuju, 3= Ragu-ragu, 2=Tidak Setuju, dan 1= Sangat Tidak Setuju, penilaian yang sudah diinputkan tidak bisa saudara ubah kembali"
                <br>
                <br>
                <a style="text-decoration: none; font-family: sans-serif;">
                    Langkah Pengisian: <br>
                    1. Pilih mata kuliah yang anda ambil <br>
                    2. Pilih dosen yang mengampu mata kuliah yang anda pilih <br>
                    3. Klik Tombol Review
                    4. Form kuisioner akan muncul
                </a>
                <br>
                <br>
                <a style="text-decoration: none; font-style: italic;">*Catatan : Semua Indikator Wajib Diisi Tanpda Terkecuali !</a> 
            </p>
          </div>
        <div class="line" style="background-color: #eee; height: 2px; width: 100%; margin-bottom: 5px; margin-top: 5px;  "></div> 
    </div>
  </div>
  <!-- AKHIR PETUNJUK PENGISIAN KUISIONER -->
@endsection