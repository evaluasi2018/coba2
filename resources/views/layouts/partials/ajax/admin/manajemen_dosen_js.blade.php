<script type="text/javascript">
  $('#table-dosen').DataTable({
    processing:true,
    serverSide:true,
    ajax: "{{ route('api.dosen') }}",
    columns: [
      {data: 'rownum', name: 'rownum'},
      {data: 'nip', name:'nip'},
      {data: 'nm_dosen', name:'nm_dosen'},
      {data: 'nm_prodi', name:'nm_prodi'},
      {data: 'nm_fakultas', name:'nm_fakultas'},
    ]   
  });
</script>