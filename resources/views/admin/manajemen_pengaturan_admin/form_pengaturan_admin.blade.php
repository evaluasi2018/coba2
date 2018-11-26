<div class="modal fade" id="pengaturan_admin_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header bg-yellow">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: white;">&times;</span>
          </button>
          <h4 id="exampleModalLabel" style="margin-top: 15px; margin-bottom: 0px;" ><img src="{{ asset('assets/images/unib.png') }}" style="width: 30px; float: left; margin-top: -15px; " alt="">&nbsp;&nbsp;<p id="modal-title" style="float: left; font-weight: bold; margin-top: -10px;"></p>
            </h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="{{ route('manajemen-admin.store') }}" data-toggle="validator">
          {{ csrf_field() }} {{ method_field('POST') }}
          <input type="hidden" id="id_admin" name="id_admin">
          <div class="form-group">
            <label for="nm_semester" class="col-md-3 control-label">Nama Admin</label>
            <div class="col-md-8">
              <input type="text" id="nm_admin" name="nm_admin" class="form-control" placeholder="nama admin" autofocus required oninvalid="this.setCustomValidity('Nama Admin Harus Diisi')" oninput="setCustomValidity('')">
              <span class="help-block with-errors"></span>
            </div>
          </div>

          <div class="form-group">
            <label for="username" class="col-md-3 control-label">Username</label>
            <div class="col-md-8">
              <input type="text" id="username" name="username" class="form-control" placeholder="username" autofocus required oninvalid="this.setCustomValidity('Username Harus Diisi')" oninput="setCustomValidity('')">
              <span class="help-block with-errors"></span>
            </div>
          </div>

          <div class="form-group">
            <label for="password" class="col-md-3 control-label">Password</label>
            <div class="col-md-8">
              <input type="password" name="password-admin" id="password-admin" class="form-control" placeholder="password" autofocus required oninvalid="this.setCustomValidity('Password Harus Diisi')" oninput="setCustomValidity('')">
              <div class="row">
                <div class="col-sm-6">
                  <span id="8character" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> 8 Characters Long<br>
                  <span id="uppercase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Uppercase Letter
                </div>
                <div class="col-sm-6">
                  <span id="lowercase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Lowercase Letter<br>
                  <span id="number" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Number
                </div>
              </div>
              <span class="help-block with-errors"></span>
            </div>
          </div>

          <div class="form-group">
            <label for="password" class="col-md-3 control-label">Ulangi Password</label>
            <div class="col-md-8">
              <input type="password" name="ulangi-password-admin" id="ulangi-password-admin" class="form-control" placeholder="ulangi password" autofocus required oninvalid="this.setCustomValidity('Password Harus Diisi')" oninput="setCustomValidity('')">
              <span class="help-block with-errors"></span>
              <div class="row">
                <div class="col-sm-12">
                  <span id="passwordmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Passwords Match
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <div class="col-md-12 float-right" >
          <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Close</button>
          <button type="submit" name="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i>&nbsp;Simpan Perubahan</button>  
        </div>
      </div>
    </form>
    </div>
  </div>
</div>