 <!-- Script menampilkan data dari table jenis -->  
  <script type="text/javascript">
  $('#table-admin').DataTable({
    processing:true,
    serverSide:true,
    ajax: "{{ route('api.pengaturan_admin') }}",
    columns: [
      {data: 'rownum', name: 'rownum'},
      {data: 'nm_admin', 
              render:function(data, type, row){
                  return '<label class="label label-success" style="font-size:12px;">'+data+'</label>';
              }
      },
      {data: 'username', 
              render:function(data, type, row){
                  return '<label class="label label-primary" style="font-size:12px;">'+data+'</label>';
              }
      },
      {data: 'action', name:'action', orderable:false, searchable:false}
    ]
  });

  function tambahAdmin(){
    save_method = "add";
    $('input[name=_method]').val('POST');
    $('#pengaturan_admin_modal').modal('show');
    $('#ulangi_password').css('display','none');
    $('#pengaturan_admin_modal form')[0].reset();
    $('#modal-title').text('TAMBAH ADMIN BARU');
  }

  function hapusAdmin(id_admin){
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
            url : "{{ url('admin/manajemen_admin') }}" + '/' + id_admin,
            type : "POST",
            data : {'_method' : 'DELETE', '_token' : csrf_token},
            success : function($data) {
              //pengaturan_admin_modal-table').dataTable().api().ajax.reload();
              $('#table-admin').dataTable().api().ajax.reload();
              $('#table-sampah-admin').dataTable().api().ajax.reload();
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

  function editAdmin(id_admin){
    save_method = 'edit';
    $('input[name=_method]').val('patch');
    $('#pengaturan_admin_modal form')[0].reset();
    $.ajax({
      url: "{{ url('admin/manajemen_admin') }}"+'/'+ id_admin + "/edit",
      type: "GET",
      dataType: "JSON",
      success: function(data){
        $('#pengaturan_admin_modal').modal('show');
        $('.modal-dialog').css('width','760px');
        $('#form-password').css('display','none');
        $('.modal-title').text('Edit Operator');
        $('#id').val(data.id_admin);
        $('#nm_admin').val(data.nm_admin);
        $('#username').val(data.username);
      },
      error:function(){
        alert("Nothing Data");
      }
    });
  }

  $(function(){
    $('#pengaturan_admin_modal form').validator().on('submit', function(e){
      if (!e.isDefaultPrevented()) {
        var id_admin = $('#id_admin').val();
        if (save_method == 'add') url = "{{ url('admin/manajemen_admin') }}";
        else url = "{{ url('admin/manajemen_admin').'/' }}"+id_admin;

        $.ajax({
          url : url,
          type : "POST",
          data : $('#pengaturan_admin_modal form').serialize(),
          success : function($data){
            $('#pengaturan_admin_modal').modal('hide');
            $('#table-admin').dataTable().api().ajax.reload();
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
</script>