<div class="modal fade" id="form-pembina" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static" >
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

				<div class="modal-body"  style="max-height:445px;overflow-y: scroll;">
					<input type="hidden" id="id" name="id_anggota">
					<div class="form-group">
						<label for="nm_pembina" class="col-md-3 control-label">Nama Pembina :</label>
						<div class="col-md-8">
							<input type="text" name="nm_pembina" id="nm_pembina" class="form-control" required="">
						</div>
					</div>

					<div class="form-group">
						<label for="foto" class="col-md-3 control-label">Foto Pembina :</label>
						<div class="col-md-8">
							<input type="file" name="foto" id="foto" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label for="sambutan" class="col-md-3 control-label">Sambutan Pembina :</label>
						<div class="col-md-8">
							<textarea name="sambutan" id="sambutan" class="form-control" id="" cols="30" rows="10"></textarea>
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