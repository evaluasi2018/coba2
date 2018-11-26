<script type="text/javascript">
  $('#table-fakultas').DataTable({
    processing:true,
    serverSide:true,
    ajax: "{{ route('api.fakultas') }}",
    columns: [
      {data: 'rownum', name: 'rownum'},
      {data: 'id_fakultas', name:'id_fakultas'},
      {data: 'nm_fakultas', name:'nm_fakultas'},
      {data: 'ket', name:'ket'},
    ]   
  });
</script>