<script type="text/javascript">
  $('#table-jadwal').DataTable({
    processing:true,
    serverSide:true,
    ajax: "{{ route('api.jadwal_perkuliahan') }}",
    columns: [
      {data: 'rownum', name: 'rownum'},
      {data: 'nm_matkul', name:'nm_matkul'},
      {data: 'nm_prodi', name:'nm_prodi'},
      {data: 'nm_fakultas', name:'nm_fakultas'},
      {data: 'nm_dosen', name:'nm_dosen'},
      {data: 'nm_semester', name:'nm_semester'},
      {data: 'kelas', name:'kelas'},
    ]   
  });
</script>