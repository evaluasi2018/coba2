<script>
	$(document).ready( function () {
	    $('#table-hasil-evaluasi-per-mata-kuliah').DataTable({
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
	    });
	} );
</script>