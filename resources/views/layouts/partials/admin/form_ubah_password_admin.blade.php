<div class="modal fade" id="modalUbahPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="" method="POST">
        <div class="modal-header bg-yellow"  ;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: white;">&times;</span>
          </button>
          <h4 id="exampleModalLabel" style="margin-top: 15px; margin-bottom: 0px;" ><img src="{{ asset('assets/images/unib.png') }}" style="width: 30px; float: left; margin-top: -15px; " alt="">&nbsp;&nbsp;<p id="modal-title" style="float: left; font-weight: bold; margin-top: -10px;">&nbsp;Form Ubah Password Admin</p>
              </h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="">Password Lama</label>
              <input type="password" class="form-control" name="password-lama" id="password-lama" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="">Password Baru</label>
              <input type="password" class="form-control" name="password-baru" id="password-baru" autocomplete="off">
              <div class="row">
                <div class="col-sm-6">
                  <span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> 8 Characters Long<br>
                  <span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Uppercase Letter
                </div>
                <div class="col-sm-6">
                  <span id="lcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Lowercase Letter<br>
                  <span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Number
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="">Ulangi Password Baru</label>
              <input type="password" class="form-control" name="ulangi-password-baru" id="ulangi-password-baru" placeholder="ulangi password baru" autocomplete="off">
              <div class="row">
                <div class="col-sm-12">
                  <span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Passwords Match
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
          <button type="button" class="btn bg-blue btn-flat"> <i class="fa fa-save"></i>&nbsp;Ubah Password</button>
        </div>
      </form>
    </div>
  </div>
</div>