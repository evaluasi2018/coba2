<div class="modal fade" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static" >
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<form method="post" class="form-horizontal" data-toggle="validator">
				{{ csrf_field() }} {{ method_field('POST') }}
				<div class="modal-header bg-yellow"  ;">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" style="color: white;">&times;</span>
					</button>
					<h4 id="exampleModalLabel" style="margin-top: 15px; margin-bottom: 0px;" ><img src="{{ asset('assets/images/unib.png') }}" style="width: 30px; float: left; margin-top: -15px; " alt="">&nbsp;&nbsp;<p id="modal-title" style="float: left; font-weight: bold; margin-top: -10px;"></p>
			        </h4>
				</div>

				<div class="modal-body">
					<input type="hidden" id="id" name="id_jenis_indikator">
					<div class="form-group">
						<label for="nm_jenis_indikator" class="col-md-3 control-label">JENIS INDIKATOR</label>
						<div class="col-md-8">
							<input type="text" id="nm_jenis_indikator" name="nm_jenis_indikator" class="form-control" autofocus required oninvalid="this.setCustomValidity('Jenis Indikator Harus Diisi')" oninput="setCustomValidity('')">
							<span class="help-block with-errors"></span>
						</div>
					</div>

					<div class="form-group">
						<label for="ket" class="col-md-3 control-label">KETERANGAN</label>
						<div class="col-md-8">
							<textarea name="ket" id="ket" class="form-control" cols="30" rows="5" required oninvalid="this.setCustomValidity('Keterangan Harus Diisi')" oninput="setCustomValidity('')"></textarea>
							<span class="help-block with-errors"></span>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="submit" id="submit" class="btn btn-primary btn-save btn-flat"><i class="fa fa-save"></i>&nbsp;Simpan Jenis</button>
					<button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
				</div>
			</form>
		</div>
	</div>
</div>