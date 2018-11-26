 <!-- Script menampilkan data dari table jenis -->  
  <script type="text/javascript">
  $('#table-jenis').DataTable({
    processing:true,
    serverSide:true,
    ajax: "{{ route('api.jenis_indikator') }}",
    columns: [
      {data: 'rownum', name: 'rownum'},
      {data: 'nm_jenis_indikator', name:'nm_jenis_indikator'},
      {data: 'ket', name:'ket'},
      {data: 'action', name:'action', orderable:false, searchable:false}
    ]
  });

  // Script Tambah Jenis Indikator
  function tambahJenis(){
    save_method = "add";
    $('input[name=_method]').val('POST');
    $('#modal-form').modal('show');
    $('#modal-form form')[0].reset();
    $('#modal-title').text('TAMBAH JENIS INDIKATOR');
  }

 // script editjenis
  function editJenis(id_jenis_indikator){
    save_method = 'edit';
    $('input[name=_method]').val('PATCH');
    $('#modal-form form')[0].reset();
    $.ajax({
      url: "{{ url('admin/manajemen_jenis_indikator') }}"+'/'+ id_jenis_indikator + "/edit",
      type: "GET",
      dataType: "JSON",
      success: function(data){
        $('#modal-form').modal('show');
        $('#modal-title').text('EDIT JENIS INDIKATOR');
        $('#id').val(data.id_jenis_indikator);
        $('#nm_jenis_indikator').val(data.nm_jenis_indikator);
        $('#ket').val(data.ket);
      },
      error:function(){
        alert("Nothing Data");
      }
    });
  }

  // script hapus jenis
  function hapusJenis(id_jenis_indikator){
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    swal({
        title: 'Data akan dimasukan ke file sampah!',
        text: "Anda bisa mengembalikan data ini pada file sampah!",
        type: 'warning',
        showCancelButton: false,
        cancelButtonColor: '#d33',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Oke!',
    }).then(function () {
        $.ajax({
            url : "{{ url('admin/manajemen_jenis_indikator') }}" + '/' + id_jenis_indikator,
            type : "POST",
            data : {'_method' : 'DELETE', '_token' : csrf_token},
            success : function(data) {
              $('#table-jenis').dataTable().api().ajax.reload();
              $('#table-sampah-jenis').dataTable().api().ajax.reload();
                swal({
                    title: 'Berhasil!',
                    text: 'Data sudah menjadi sampah!',
                    type: 'success',
                    timer: '1500'
                })
            },
            error : function () {
                swal({
                    title: 'Oops...',
                    text: ' Terjadi Kesalahan!',
                    type: 'error',
                    timer: '1500'
                })
            }
        });
    });
  }

  // script fungsi untuk create data
  $(function(){
    $('#modal-form form').validator().on('submit', function(e){
      if (!e.isDefaultPrevented()) {
        var id = $('#id').val();
        if (save_method == 'add') url = "{{ url('admin/manajemen_jenis_indikator') }}";
        else url = "{{ url('admin/manajemen_jenis_indikator').'/' }}"+id;

        $.ajax({
          url : url,
          type : "POST",
          data : $('#modal-form form').serialize(),
          success : function($data){
            $('#modal-form').modal('hide');
            $('#table-jenis').dataTable().api().ajax.reload();
            swal({
              title:'Berhasil!',
              text:'Data Sudah Diperbarui',
              type:'success',
              timer:'1500'
            })
          },
          error:function(){
            swal({
              title:'Oops...',
              text:'Terjadi KEsalahan!',
              type:'error',
              timer:'1500'
            })
          }
        });
        return false;
      }
    });
  });


  $('#table-sampah-jenis').DataTable({
    processing:true,
    serverSide:true,
    ajax: "{{ route('sampah.jenis_indikator') }}",
    columns: [
      {data: 'rownum', name: 'rownum'},
      {data: 'nm_jenis_indikator', name:'nm_jenis_indikator'},
      {data: 'ket', name:'ket'},
      {data: 'action', name:'action', orderable:false, searchable:false}
    ]
  });


  function hapusSampahJenis(id_jenis_indikator){
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    swal({
        title: 'Data akan dihapus permanen',
        text: "Anda tidak dapat mengembalikan data ini!",
        type: 'warning',
        showCancelButton: false,
        cancelButtonColor: '#d33',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Oke!',
    }).then(function () {
        $.ajax({
            url : "{{ url('admin/manajemen_jenis_indikator/sampah/forcedelete') }}" + '/' + id_jenis_indikator,
            type : "POST",
            data : {'_method' : 'DELETE', '_token' : csrf_token},
            success : function(data) {
              $('#table-sampah-jenis').dataTable().api().ajax.reload();
              $('#jenis-table').dataTable().api().ajax.reload();
                swal({
                    title: 'Berhasil!',
                    text: 'Data dihapus !',
                    type: 'success',
                    timer: '1500'
                })
            },
            error : function () {
                swal({
                    title: 'Oops...',
                    text: ' Terjadi Kesalahan!',
                    type: 'error',
                    timer: '1500'
                })
            }
        });
    });
  }

  function restoreSampahJenis(id_jenis_indikator){
    
        $.ajax({
            url : "{{ url('admin/manajemen_jenis_indikator/sampah/restore') }}" + '/' + id_jenis_indikator,
            success : function(data) {
              $('#table-sampah-jenis').dataTable().api().ajax.reload();
              $('#table-jenis').dataTable().api().ajax.reload();
                swal({
                    title: 'Berhasil!',
                    text: 'Data sudah di kembalikan!',
                    type: 'success',
                    timer: '1500'
                })
            },
            error : function () {
                swal({
                    title: 'Oops...',
                    text: ' Terjadi Kesalahan!',
                    type: 'error',
                    timer: '1500'
                })
            }
        });
    };

</script>