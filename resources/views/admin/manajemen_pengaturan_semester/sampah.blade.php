<div class="modal fade" style="" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-yellow">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash text-danger" style="color: white;"></i>&nbsp;File Sampah Indikator Penilaian</h4>
      </div>
      <div class="modal-body" style="max-height: calc(100vh - 200px);
    overflow-y: auto;">
      <div class="button" style="margin-bottom: 5px;">
        <a href="{{ route('sampah.semester_restore_all') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i>&nbsp;Kembalikan Semuanya</a>
        &nbsp;
        <a href="{{ route('sampah.semester_force_all') }}" class="btn btn-danger btn-flat"><i class="fa fa-remove"></i>&nbsp;Hapus Semuanya</a>
      </div>

        <table class="table table-bordered" id="table-sampah-semester" style="width: 100%;">
          <thead>
            <tr>
              <th>NO</th>
              <th>NAMA SEMESTER</th>
              <th>TAHUN AJARAN</th>
              <th>STATUS</th>
              <th>AKSI</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Close</button>
      </div>
    </div>
  </div>
</div>