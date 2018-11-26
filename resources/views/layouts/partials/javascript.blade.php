<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('bower_components/admin-lte/dist/js/adminlte.min.js')}}"></script>

{{-- dataTables --}}
    <script src="{{ asset('assets/dataTables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/datatables_buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/datatables_buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/datatables_buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/datatables_buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/datatables_buttons/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/datatables_buttons/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/datatables_buttons/vfs_fonts.js') }}"></script>

{{-- Validator --}}
<script src="{{ asset('assets/validator/validator.min.js') }}"></script>
<!-- sweet alert -->
<script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- toastr js -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- Admin -->
@include('layouts/partials/ajax/admin/manajemen_jenis_indikator_js')
@include('layouts/partials/ajax/admin/manajemen_indikator_js')
@include('layouts/partials/ajax/admin/pengaturan_semester_js')
@include('layouts/partials/ajax/admin/manajemen_admin_js')
@include('layouts/partials/ajax/admin/manajemen_mahasiswa_js')
@include('layouts/partials/ajax/admin/manajemen_dosen_js')
@include('layouts/partials/ajax/admin/manajemen_prodi_js')
@include('layouts/partials/ajax/admin/manajemen_fakultas_js')
@include('layouts/partials/ajax/admin/manajemen_jadwal_perkuliahan_js')
@include('layouts/partials/ajax/admin/laporan/laporan_detail_js')
@include('layouts/partials/ajax/admin/laporan/laporan_per_jenis_js')
@include('layouts/partials/ajax/admin/laporan/laporan_per_dosen_js')
{{-- @include('layouts/partials/ajax/admin/laporan/laporan_per_dosen_js') --}}


<!--End of Admin -->

<!-- Mahasiswa -->
@include('layouts/partials/ajax/mahasiswa/riwayat_evaluasi_js')
@include('layouts/partials/ajax/mahasiswa/riwayat_saran_js')
<!--End of Mahasiswa -->

<!-- Dosen -->
@include('layouts/partials/ajax/dosen/hasil_evaluasi_js')
@include('layouts/partials/ajax/dosen/hasil_evaluasi_per_jenis_js')
@include('layouts/partials/ajax/dosen/saran_mahasiswa_js')
@include('layouts/partials/ajax/dosen/hasil_evaluasi_per_mata_kuliah_js')
@include('layouts/partials/dosen/lihat_laporan_per_matkul_js')
<!--End of Dosen -->

<!-- Javascript Laporan Per Dosen -->
@include('layouts/partials/admin/laporan_per_dosen_js')
<!-- End of javascript laporan per dosen -->

<!-- Javascript Mahasiswa Pilih Dosen -->
@include('layouts/partials/mahasiswa/pilih_dosen_js')
<!-- End of javascript laporan per dosen -->

  <script>
    $(function(){
      
        $(".wrapper").fadeIn(1000);
        $(".loader").fadeOut(1000);
      
    });
  </script>

  <script type="text/javascript">
  $('#tampilkan').click(function(){
    $('#tampilkan').hide(1000)
    $('#kuisioner').show(1000);
    $('#box-footer').show(1000);
    $('#box-header').hide(1000);
    $('#petunjuk').hide(1000);
    $('#petunjuk-data').hide(1000);
    $('#daftar').hide(1000);
    $('#btn-daftar').hide(1000);
    $('#hide').show(1000);
    $('#simpan').show(1000);
    $('#reset').show(1000);
    
  });

  $('#hide').click(function(){
    $('#hide').hide(1000)    
    $('#kuisioner').hide(1000);
    $('#box-footer').show(1000);
    $('#box-header').show(1000);
    $('#petunjuk').show(1000);
    $('#petunjuk-data').show(1000);
    $('#daftar').hide(500);
    $('#btn-daftar').show(1000);
    $('#tampilkan').show(1000);
    $('#reset').hide(1000);
    $('#simpan').hide(1000);
  });

  $('#btn-daftar').click(function(){
    $('#hide').show(1000)    
    $('#simpan').hide(1000)    
    $('#reset').hide(1000)    
    // $('#kuisioner').hide(1000);
    $('#box-footer').show(1000);
    $('#box-header').show(1000);
    $('#petunjuk').show(1000);
    $('#petunjuk-data').hide(1000);
    $('#daftar').show(1000);
    $('#btn-daftar').hide(1000);
    $('#tampilkan').show(1000);
  });
</script>

<script type="text/javascript">
  function tampilkan_select_dosen()
  {
    $('#select_dosen').show(100);
  }
  function tampilkan_form_evaluasi()
  {
    $('#form_evaluasi').show(1000);
  }
  $('#reset').click(function(){
    $('#select_dosen').hide(100);
    $('#form_evaluasi').hide(1000);
  });
</script>

<script>
  $("input[type=password]").keyup(function(){
    var uppercase = new RegExp("[A-Z]+");
  var lowercase = new RegExp("[a-z]+");
  var number = new RegExp("[0-9]+");
  
  if($("#password-admin").val().length >= 8){
    $("#8character").removeClass("glyphicon-remove");
    $("#8character").addClass("glyphicon-ok");
    $("#8character").css("color","#00A41E");
  }else{
    $("#8character").removeClass("glyphicon-ok");
    $("#8character").addClass("glyphicon-remove");
    $("#8character").css("color","#FF0004");
  }
  
  if(uppercase.test($("#password-admin").val())){
    $("#uppercase").removeClass("glyphicon-remove");
    $("#uppercase").addClass("glyphicon-ok");
    $("#uppercase").css("color","#00A41E");
  }else{
    $("#uppercase").removeClass("glyphicon-ok");
    $("#uppercase").addClass("glyphicon-remove");
    $("#uppercase").css("color","#FF0004");
  }
  
  if(lowercase.test($("#password-admin").val())){
    $("#lowercase").removeClass("glyphicon-remove");
    $("#lowercase").addClass("glyphicon-ok");
    $("#lowercase").css("color","#00A41E");
  }else{
    $("#lowercase").removeClass("glyphicon-ok");
    $("#lowercase").addClass("glyphicon-remove");
    $("#lowercase").css("color","#FF0004");
  }
  
  if(number.test($("#password-admin").val())){
    $("#number").removeClass("glyphicon-remove");
    $("#number").addClass("glyphicon-ok");
    $("#number").css("color","#00A41E");
  }else{
    $("#number").removeClass("glyphicon-ok");
    $("#number").addClass("glyphicon-remove");
    $("#number").css("color","#FF0004");
  }
  
  if($("#password-admin").val() == $("#ulangi-password-admin").val()){
    $("#passwordmatch").removeClass("glyphicon-remove");
    $("#passwordmatch").addClass("glyphicon-ok");
    $("#passwordmatch").css("color","#00A41E");
  }else{
    $("#passwordmatch").removeClass("glyphicon-ok");
    $("#passwordmatch").addClass("glyphicon-remove");
    $("#passwordmatch").css("color","#FF0004");
  }
});
</script>

<script>
  
  if($("#password-admin").val() == $("#ulangi-password-admin").val()){
    $("#passwordmatch").removeClass("glyphicon-remove");
    $("#passwordmatch").addClass("glyphicon-ok");
    $("#passwordmatch").css("color","#00A41E");
  }else{
    $("#passwordmatch").removeClass("glyphicon-ok");
    $("#passwordmatch").addClass("glyphicon-remove");
    $("#passwordmatch").css("color","#FF0004");
  }
</script>

<!-- toastr script -->
<script>
  @if(Session::has('message'))
    var type="{{Session::get('alert-type','info')}}"

    switch(type){
          case 'success':
              toastr.options.showDuration="300";
              toastr.options.hideDuration="1000";
              toastr.options.showEasing="swing";
              toastr.options.hideEasing="linear";
              toastr.options.positionClass = 'toast-bottom-right';
              toastr.success("{{ Session::get('message') }}");
              break;
          case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
</script>
