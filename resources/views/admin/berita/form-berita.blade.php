<div class="modal fade" id="form-berita" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static" >
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
					<input type="hidden" id="id" name="id_berita">
					<div class="form-group">
						<label for="nm_anggota" class="col-md-3 control-label">Jenis Berita :</label>
						<div class="col-md-8">
							<select name="id_jenis_berita" id="id_jenis_berita" class="form-control">
								<option value="0" selected="true" disabled="true">-- jenis berita --</option>
								<?php 
									$jenis = DB::table('tb_jenis_berita')->select('id_jenis_berita','nm_jenis_berita')->get();
									foreach ($jenis as $jenis) {
								?>
									<option value="{{ $jenis->id_jenis_berita }}">{{ $jenis->nm_jenis_berita }}</option>
								<?php 
									}
								?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="telephone" class="col-md-3 control-label">Judul Berita :</label>
						<div class="col-md-8">
							<input type="text" name="judul_berita" id="judul_berita" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label for="telephone" class="col-md-3 control-label">Isi Berita :</label>
						<div class="col-md-8">
							<textarea name="isi_berita" id="isi_berita" class="form-control" cols="30" rows="10"></textarea>
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