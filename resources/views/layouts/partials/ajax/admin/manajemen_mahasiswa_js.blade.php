<script type="text/javascript">
  $('#table-mahasiswa').DataTable({
    processing:true,
    serverSide:true,
    ajax: "{{ route('api.mahasiswa') }}",
    columns: [
      {data: 'rownum', name: 'rownum'},
      {data: 'npm', name:'npm'},
      {data: 'nm_mahasiswa', name:'nm_mahasiswa'},
      {data: 'nm_prodi', name:'nm_prodi'},
      {data: 'nm_fakultas', name:'nm_fakultas'},
    ]   
  });
</script>