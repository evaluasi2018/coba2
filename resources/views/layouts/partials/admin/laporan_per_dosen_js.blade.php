<script type="text/javascript">
  function tampilkan_select_prodi()
  {
    $('#select_prodi').show(100);
  }

  function mahasiswa_select_dosen()
  {
    $('#select_dosen').show(100);
  }

  function tampilkan_button_lihat()
  {
    $('#button-lihat').show(100);
  }

  function tampilkan_button_cetak()
  {
    $('#button-cetak').show(100);
  }


  $('#button-lihat').click(function(){
    $('#select_prodi').show(100);
    $('#select_dosen').show(100);
    $('#button-lihat').show(100);
    $('#table-hasil').show(100);
  });
</script>

<script>
	$(document).ready( function () {
	    $('#a').DataTable();
	} );
</script>

<script type="text/javascript">
	$(document).on('change','.namafakultas',function(){
		// console.log('berhasil');
		var id_fak=$(this).val();
		var div=$(this).parent().parent();
		// console.log(id_fak);
		var op=" ";
		$.ajax({
			type:'get',
			url : '{!! URL::to('admin/laporan/laporan_evaluasi_per_dosen/cariprodi') !!}',
			data:{'id':id_fak},
			success:function(data){
				// console.log('success');
				// console.log(data);
				// console.log(data.length);
				op+='<option value="0" selected disabled>-- pilih prodi --</option>';
	            for(var i=0; i<data.length;i++){
	              op+='<option value="'+data[i].id_prodi+'">'+data[i].nm_prodi+'</option>';
	            }
	            div.find('.namaprodi').html("");
	            div.find('.namaprodi').append(op);
			},
			error:function(){

			}
		});
	})

	$(document).on('change','.namafakultas',function(){
		// console.log('berhasil');
		var id_fak=$(this).val();
		var div=$(this).parent().parent();
		// console.log(id_fak);
		var op=" ";
		$.ajax({
			type:'get',
			url : '{!! URL::to('admin/laporan/laporan_evaluasi_per_dosen/cariprodi') !!}',
			data:{'id':id_fak},
			success:function(data){
				// console.log('success');
				// console.log(data);
				// console.log(data.length);
				op+='<option value="0" selected disabled>-- pilih prodi --</option>';
	            for(var i=0; i<data.length;i++){
	              op+='<option value="'+data[i].id_prodi+'">'+data[i].nm_prodi+'</option>';
	            }
	            div.find('.namaprodi').html("");
	            div.find('.namaprodi').append(op);
			},
			error:function(){

			}
		});
	});

	$(document).on('change','.namaprodi',function(){
		// console.log('berhasil');
		var id_prodi=$(this).val();
		var div=$(this).parent().parent();
		// console.log(id_prodi);
		var op=" ";
		$.ajax({
			type:'get',
			url : '{!! URL::to('admin/laporan/laporan_evaluasi_per_dosen/caridosen') !!}',
			data:{'id':id_prodi},
			success:function(data){
				// console.log('success');
				// console.log(data);
				// console.log(data.length);
				op+='<option value="0" selected disabled>-- pilih dosen --</option>';
	            for(var i=0; i<data.length;i++){
	              op+='<option value="'+data[i].nip+'">'+data[i].nm_dosen+'</option>';
	            }
	            div.find('.namadosen').html("");
	            div.find('.namadosen').append(op);
			},
			error:function(){

			}
		});
	});
</script>