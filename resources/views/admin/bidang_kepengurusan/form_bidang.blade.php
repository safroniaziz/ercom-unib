<div class="modal fade" id="form-bidang" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static" >
	<div class="modal-dialog modal-sm" id="modal-dialog">
		<div class="modal-content" id="modal-content">
			<form method="post"  id="form" class="form-horizontal" data-toggle="validator">
				{{ csrf_field() }} {{ method_field('POST') }}
				<div class="modal-header" id="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="modal-title"></h4>
				</div>

				<div class="modal-body">
					<input type="hidden" id="id" name="id_bidang">
					<div class="form-group">
						<label for="bidang" class="col-md-3 control-label">Bidang Kepengurusan :</label>
						<div class="col-md-8">
							<input type="text" name="nm_bidang" id="nm_bidang" class="form-control" required="">
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