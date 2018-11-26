<script type="text/javascript">
  $('#table-prodi').DataTable({
    processing:true,
    serverSide:true,
    ajax: "{{ route('api.prodi') }}",
    columns: [
      {data: 'rownum', name: 'rownum'},
      {data: 'nm_prodi', name:'nm_prodi'},
      {data: 'nm_fakultas', name:'nm_fakultas'},
      {data: 'ket', name:'ket'},
    ]   
  });
</script>