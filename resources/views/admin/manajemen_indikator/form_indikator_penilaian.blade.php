<div class="modal fade" id="form-modal-indikator" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static" >
	<div class="modal-dialog modal-md" id="modal-dialog">
		<div class="modal-content" id="modal-content">
			<form method="post"  id="form" class="form-horizontal" data-toggle="validator">
				{{ csrf_field() }} {{ method_field('POST') }}
				<div class="modal-header bg-yellow" id="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" style="color: white;">&times;</span>
					</button>
					<h4 id="exampleModalLabel" style="margin-top: 15px; margin-bottom: 0px;" ><img src="{{ asset('assets/images/unib.png') }}" style="width: 30px; float: left; margin-top: -15px; " alt="">&nbsp;&nbsp;<p id="modal-title" style="float: left; font-weight: bold; margin-top: -10px;"></p>
		        </h4>
				</div>

				<div class="modal-body">
					<input type="hidden" id="id_indikator" name="id_indikator">
					<div class="form-group">
						<label for="indikator" class="col-md-3 control-label">INDIKATOR PENILAIAN</label>
						<div class="col-md-8">
							<textarea name="indikator" id="indikator" class="form-control" autofocus required oninvalid="this.setCustomValidity('Indikator Penilaian Harus Diisi')" oninput="setCustomValidity('')" cols="30" rows="5"></textarea>
							<span class="help-block with-errors"></span>
						</div>
					</div>

					<div class="form-group">
						<label for="ket" class="col-md-3 control-label">JENIS INDIKATOR</label>
						<div class="col-md-8">
							<select name="id_jenis_indikator" id="id_jenis_indikator" class="form-control">
								<?php 
									$jenis_indikator = DB::table('tb_jenis_indikator')->whereNull('deleted_at')->get();
									foreach ($jenis_indikator as $jenis) {
									?>
										<option value="{{ $jenis->id_jenis_indikator }}">{{ $jenis->nm_jenis_indikator }}</option>
									<?php 

								}
								 ?>
							</select>
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