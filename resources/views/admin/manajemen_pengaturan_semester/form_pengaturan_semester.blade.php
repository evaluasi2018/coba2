<div class="modal fade" id="modal-form-semester" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header bg-yellow">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="color: white;">&times;</span>
				</button>
				<h4 id="exampleModalLabel" style="margin-top: 15px; margin-bottom: 0px;" ><img src="{{ asset('assets/images/unib.png') }}" style="width: 30px; float: left; margin-top: -15px; " alt="">&nbsp;&nbsp;<p id="modal-title" style="float: left; font-weight: bold; margin-top: -10px;">&nbsp; Tambah Data Semester</p>
		        </h4>
			</div>&nbsp;
			<div class="modal-body">
				<form method="post" class="form-horizontal" data-toggle="validator">
				{{ csrf_field() }} {{ method_field('POST') }}
					<input type="hidden" id="id_semester" name="id_semester">
				<div class="form-group">
					<label for="nm_semester" class="col-md-3 control-label">Semester :</label>
					<div class="col-md-8">
						<select name="nm_semester" class="form-control" id="nm_semester">
							<option value="Ganjil">Ganjil</option>
							<option value="Genap">Genap</option>
						</select>
						<span class="help-block with-errors"></span>
					</div>
				</div>

				<div class="form-group">
					<label for="ket" class="col-md-3 control-label">Tahun Ajaran :</label>
					<div class="col-md-8">
						<div class="col-md-6">
							<input  pattern=".{4,}" required title="harus 4 karakter" oninput="" minlength="4" maxlength="4" name="tahun_pertama" id="tahun_pertama" class="form-control" placeholder="tahun pertama" required title="">
						</div>
						<div class="col-md-6">
							<input pattern=".{4,}" required="harus 4 karakter" minlength="4" maxlength="4" name="tahun_kedua" id="tahun_kedua" class="form-control" placeholder="tahun kedua" required="">
							
						</div>
						<span class="help-block with-errors"></span>
					</div>
				</div>

				<div class="form-group">
					<label for="ket" class="col-md-3 control-label">Status Tahun Ajaran :</label>
					<div class="col-md-8">
						<select name="status" id="status" class="form-control">
							<option value="1">Aktif</option>
							<option value="0">Deaktif</option>
						</select>
						<span class="help-block with-errors"></span>
					</div>
				</div>
			</div>

			<div class="modal-footer">
		        <div class="col-md-12" >
		          <button type="button" class="btn btn-danger bnt-flat" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Close</button>
		          <button type="submit" name="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i>&nbsp;Simpan Semester</button>  
		        </div>
		    </div>
			</form>
		</div>
	</div>
</div>