<div class="modal fade" id="form-galeri" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static" >
	<div class="modal-dialog modal-sm" id="modal-dialog">
		<div class="modal-content" id="modal-content">
			<form method="post"  id="form" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
				{{ csrf_field() }} {{ method_field('POST') }}
				<div class="modal-header" id="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="modal-title"></h4>
				</div>

				<div class="modal-body">
					<input type="hidden" id="id" name="id_galeri">
					<div class="form-group">
						<label for="id_kegiatan" class="col-md-3 control-label">Nama Kegiatan :</label>
						<div class="col-md-8">
							<select name="id_kegiatan" id="id_kegiatan" class="form-control">
								<option value="0" selected="true" disabled="true">-- nama kegiatan --</option>
								<?php 
									$kegiatan = DB::table('tb_kegiatan')->select('id_kegiatan','judul_kegiatan')->get();
									foreach ($kegiatan as $kegiatan) {
								?>
									<option value="{{ $kegiatan->id_kegiatan }}">{{ $kegiatan->judul_kegiatan }}</option>
								<?php 
									}
								?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="foto" class="col-md-3 control-label">Foto Berita :</label>
						<div class="col-md-8">
							<input type="file" name="foto" id="foto" class="form-control">
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