 <!-- Script menampilkan data dari table jenis -->  
  <script type="text/javascript">
  $('#table-semester').DataTable({
    processing:true,
    serverSide:true,
    ajax: "{{ route('api.semester') }}",
    columns: [
      {data: 'rownum', name: 'rownum'},
      {data: 'nm_semester', name:'nm_semester'},
      {data: 'tahun_ajaran', name:'tahun_ajaran'},
      {data: 'status', 
              render:function(data, type, row){
                if(data == 1){
                  return '<label class="label label-primary">actived</label>';
                }
                else
                {
                  return '<label class="label label-danger">inactived</label>';
                }
              }
      },
        {data: 'action', name:'action', orderable:false, searchable:false}
      ]
  });

  // Script Tambah Jenis Indikator
  function tambahSemester(){
    save_method = "add";
    $('input[name=_method]').val('POST');
    $('#modal-form-semester').modal('show');
    $('#modal-form-semester form')[0].reset();
    $('#modal-title').text('TAMBAH SEMESTER BARU');
  }

  function editSemester(id_semester){
    save_method = 'edit';
    $('input[name=_method]').val('PATCH');
    $('#modal-form-semester form')[0].reset();
    $.ajax({
      url: "{{ url('admin/manajemen_semester') }}"+'/'+ id_semester + "/edit",
      type: "GET",
      dataType: "JSON",
      success: function(data){
        $('#modal-form-semester').modal('show');
        $('#modal-title').text('EDIT DATA SEMESTER');
        $('#id_semester').val(data.id_semester);
        $('#nm_semester').val(data.nm_semester);
        $('#tahun_ajaran').val(data.tahun_ajaran);
        $('#status').val(data.status);
      },
      error:function(){
        alert("Nothing Data");
      }
    });
  }

  function hapusSemester(id_semester){
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    swal({
        title: 'Apakah Anda Yakin?',
        text: "Anda tidak akan bisa mengembalikan data ini!",
        type: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus Data!',
    }).then(function() {
        $.ajax({
            url : "{{ url('admin/manajemen_semester') }}" + '/' + id_semester,
            type : "POST",
            data : {'_method' : 'DELETE', '_token' : csrf_token},
            success : function($data) {
              $('#table-semester').dataTable().api().ajax.reload();
              $('#table-sampah-semester').dataTable().api().ajax.reload();
                swal({
                    title: 'Success!',
                    text: 'Data Berhasil Dihapus!',
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
    $('#modal-form-semester form').validator().on('submit', function(e){
      if (!e.isDefaultPrevented()) {
        var id_semester = $('#id_semester').val();
        if (save_method == 'add') url = "{{ url('admin/manajemen_semester') }}";
        else url = "{{ url('admin/manajemen_semester').'/' }}"+id_semester;

        $.ajax({
          url : url,
          type : "POST",
          data : $('#modal-form-semester form').serialize(),
          success : function($data){
            $('#modal-form-semester').modal('hide');
            $('#table-semester').dataTable().api().ajax.reload();
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

  $('#table-sampah-semester').DataTable({
    processing:true,
    serverSide:true,
    ajax: "{{ route('sampah.semester') }}",
    columns: [
      {data: 'rownum', name: 'rownum'},
      {data: 'nm_semester', name:'nm_semester'},
      {data: 'tahun_ajaran', name:'tahun_ajaran'},
      {data: 'status', name:'status'},
      {data: 'action', name:'action', orderable:false, searchable:false}
    ]
  });

  function hapusSampahSemester(id_semester){
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
            url : "{{ url('admin/manajemen_semester/sampah/forcedelete') }}" + '/' + id_semester,
            type : "POST",
            data : {'_method' : 'DELETE', '_token' : csrf_token},
            success : function(data) {
              $('#table-sampah-semester').dataTable().api().ajax.reload();
              $('#table-semester').dataTable().api().ajax.reload();
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

  function restoreSampahSemester(id_semester){  
      $.ajax({
          url : "{{ url('admin/manajemen_semester/sampah/restore') }}" + '/' + id_semester,
          success : function(data) {
            $('#table-sampah-semester').dataTable().api().ajax.reload();
            $('#table-semester').dataTable().api().ajax.reload();
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