<script type="text/javascript">
$('#table-laporan-detail').DataTable({
  processing:true,
  serverSide:true,
  columnDefs: [
    { orderable: false, targets: [ -1 ] }
  ],
  "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
  dom: 'Bfrtip',
    buttons: [
        { extend:'excel', text:'<i class="fa fa-file-excel-o"></i>&nbsp;Cetak Excel', className:'btn bg-blue  btn-flat dt-buttons' },
        { extend:'pdf', text:'<i class="fa fa-file-pdf-o"></i>&nbsp;Cetak PDF', className:'btn btn-success  btn-flat dt-buttons' },
        {
            extend: 'print',
            exportOptions:{ modifier:{ page:'all', search:'none' }},
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
  ajax: "{{ route('api.laporan_detail') }}",
  columns: [
    {data: 'rownum', name: 'rownum'},
    {data: 'nm_dosen', name:'nm_dosen'},
    {data: 'nm_matkul', name:'nm_matkul'},
    {data: 'id_kelas', name:'id_kelas'},
    {data: 'indikator', name:'indikator'},
    {data: 'totalnilai',render:function(data, type, row){
          return '<label class="label label-primary" style="font-size:15px;">'+data+'</label>';
      }
    }
  ]
});
</script>