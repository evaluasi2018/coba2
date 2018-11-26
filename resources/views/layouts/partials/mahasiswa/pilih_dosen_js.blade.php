<script>
	$(document).on('change','.namamatkul',function(){
		// console.log('berhasil');
		var id_matkul=$(this).val();
		var div=$(this).parent().parent().parent();
		// console.log(id_matkul);
		var op=" ";
		$.ajax({
			type:'get',
			url : '{!! URL::to('mahasiswa/evaluasi_mahasiswa/cari_dosen') !!}',
			data:{'id':id_matkul},
			success:function(data){
				console.log('success');
				console.log(data);
				console.log(data.length);
				op+='<option value="0" selected disabled>-- pilih dosen --</option>';
	            for(var i=0; i<data.length;i++){
	              op+='<option value="'+data[i].id_jadwal_perkuliahan+'">'+data[i].nm_dosen+'</option>';
	            }
	            div.find('.namadosen').html("");
	            div.find('.namadosen').append(op);
			},
			error:function(){

			}
		});
	});
</script>

<script type="text/javascript">
	function mahasiswa_tampilkan_button_lihat()
	{
	    $('#mahasiswa-button-lihat').show(100);
	}
</script>