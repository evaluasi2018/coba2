 <!-- Script menampilkan data dari table jenis -->  
  <script type="text/javascript">
  $('#table-hasil-evaluasi').DataTable({
    processing:true,
    serverSide:true,
    dom: 'Bfrtip',
        buttons: [
            { extend:'excel', text:'<i class="fa fa-file-excel-o"></i>&nbsp;Cetak Excel', className:'btn bg-blue  btn-flat dt-buttons' },
            { extend:'pdf', text:'<i class="fa fa-file-pdf-o"></i>&nbsp;Cetak PDF', className:'btn btn-success  btn-flat dt-buttons' },
            {
                extend: 'print',
                text:'<i class="fa fa-print"></i>&nbsp;Cetak Data',
                className:'btn btn-warning btn-flat dt-buttons',
                customize: function (win) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            // '<img src="{{ asset('assets/images/unib.png') }}" style="position:absolute; top:0; left:0;z-index:-1;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
            }
        ],
    ajax: "{{ route('dosen.api_hasil_evaluasi') }}",
    columns: [
      {data: 'rownum', name: 'rownum'},
      {data: 'nm_matkul', name:'nm_matkul'},
      {data: 'id_kelas', name:'id_kelas'},
      {data: 'indikator', name:'indikator'},
      {data: 'nilai', 
            render:function(data, type, row){
              if(data >= 4){
                return '<label class="label label-primary" style="font-size:15px;">'+data+'</label>';
              }
              else if(data ==3 )
              {
                return '<label class="label label-warning" style="font-size:15px;">'+data+'</label>';
              }
              else
              {
                return '<label class="label label-danger" style="font-size:15px;">'+data+'</label>';
              }
            }
      },
    ]
  });
</script>

 