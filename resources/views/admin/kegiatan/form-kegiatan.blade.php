<div class="modal fade" id="form-kegiatan" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static" >
	<div class="modal-dialog modal-sm" id="modal-dialog">
		<div class="modal-content" id="modal-content">
			<form method="post"  id="form" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
				{{ csrf_field() }} {{ method_field('POST') }}
				<div class="modal-header" id="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="modal-title">dsad</h4>
				</div>

				<div class="modal-body">
					<input type="hidden" id="id" name="id_kegiatan">
					<div class="form-group">
						<label for="judul_kegiatan" class="col-md-3 control-label">Judul Kegiatan :</label>
						<div class="col-md-8">
							<input type="text" name="judul_kegiatan" id="judul_kegiatan" placeholder="nama anggota" class="form-control" required="">
						</div>
					</div>

					<div class="form-group">
						<label for="bidang" class="col-md-3 control-label">Bidang Kegiatan :</label>
						<div class="col-md-8">
							<select name="id_bidang" class="form-control" id="id_bidang">
								<option value="0" selected="true" disabled="true">-- pilih bidang kegiatan --</option>
								<?php 
									$bidangs = DB::table('tb_bidang_kepengurusan')
												->select('id_bidang','nm_bidang')
												->get();
									foreach ($bidangs as $bidang) {
								?>
									<option value="{{ $bidang->id_bidang }}">{{ $bidang->nm_bidang }}</option>
								<?php 
									}
								?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="gambar_kegiatan" class="col-md-3 control-label">Gambar Kegiatan :</label>
						<div class="col-md-8">
							<input type="file" name="gambar_kegiatan" id="gambar_kegiatan" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label for="isi" class="col-md-3 control-label">Keterangan :</label>
						<div class="col-md-8">
							<textarea name="isi" id="isi" class="form-control" id="" cols="30" rows="5"></textarea>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="submit" id="submit" class="btn btn-primary btn-save btn-flat"><i class="fa fa-save"></i>&nbsp;Simpan</button>
					<button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
				</div>
			</form>
		</div>
	</div>
</div>