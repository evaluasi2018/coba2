 <!-- Script menampilkan data dari table jenis -->  
  <script type="text/javascript">
  $('#table-riwayat-evaluasi').DataTable({
    processing:true,
    serverSide:true,
    ajax: "{{ route('mahasiswa.api_riwayat_evaluasi') }}",
    columns: [
      {data: 'rownum', name: 'rownum'},
      {data: 'nm_dosen', name:'nm_dosen'},
      {data: 'nm_matkul', name:'nm_matkul'},
      {data: 'id_kelas', name:'id_kelas'},
      {data: 'indikator', name:'indikator'},
      {data: 'nilai', name:'nilai'},
    ]
  });
</script>