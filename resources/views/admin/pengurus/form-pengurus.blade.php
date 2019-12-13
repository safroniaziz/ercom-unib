<div class="modal fade" id="form-pengurus" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static" >
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
						<label for="nm_pengurus" class="col-md-3 control-label">Nama Pengurus :</label>
						<div class="col-md-8">
							<input type="text" name="nm_pengurus" id="nm_pengurus" placeholder="nama pengurus" class="form-control" required="">
						</div>
					</div>

					<div class="form-group">
						<label for="npm" class="col-md-3 control-label">Nomor Pokok Mahasiswa :</label>
						<div class="col-md-8">
							<input type="text" name="npm" id="npm" placeholder="npm" max="9" class="form-control" required="">
						</div>
					</div>

					<div class="form-group">
						<label for="foto" class="col-md-3 control-label">Foto Pengurus :</label>
						<div class="col-md-8">
							<input type="file" name="foto" id="foto" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label for="jabatan" class="col-md-3 control-label">Jabatan Kepengurusan :</label>
						<div class="col-md-8">
							<select name="id_jabatan" id="id_jabatan" class="form-control">
								<option value="0" selected="true" disabled="true">-- pilih jabatan --</option>
								<?php 
									$jabatans = DB::table('tb_jabatan')
												->select('id_jabatan','nm_jabatan')
												->get();
									foreach($jabatans as $jabatan)
									{
								?>
									<option value="{{ $jabatan->id_jabatan }}">{{ $jabatan->nm_jabatan }}</option>
								<?php 
									}
								?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="bidang" class="col-md-3 control-label">Bidang Kepengurusan :</label>
						<div class="col-md-8">
							<select name="id_bidang" id="id_bidang" class="form-control">
								<option value="0" selected="true" disabled="true">-- pilih bidang kepengurusan --</option>
								<?php 
									$bidangs = DB::table('tb_bidang_kepengurusan')
												->select('id_bidang','nm_bidang')
												->get();
									foreach($bidangs as $bidang)
									{
								?>
									<option value="{{ $bidang->id_bidang }}">{{ $bidang->nm_bidang }}</option>
								<?php 
									}
								?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="prodi" class="col-md-3 control-label">Program Studi :</label>
						<div class="col-md-8">
							<select name="id_prodi" id="id_prodi" class="form-control">
								<option value="0" selected="true" disabled="true">-- pilih program studi --</option>
								<?php 
									$prodis = DB::table('tb_prodi')
											->select('id_prodi','nm_prodi')
											->get();
									foreach ($prodis as $prodi) {
								?>
									<option value="{{ $prodi->id_prodi }}">{{ $prodi->nm_prodi }}</option>	
								<?php 
									}
								?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="tahun_kepengurusan" class="col-md-3 control-label">Tahun Kepengurusan :</label>
						<div class="col-md-8">
							<select name="id_tahun_kepengurusan" id="id_tahun_kepengurusan" class="form-control">
								<option value="0" selected="true" disabled="true">-- pilih  tahun kepengurusan --</option>
								<?php 
									$tahuns = DB::table('tb_tahun_kepengurusan')
												->select('id_tahun_kepengurusan','nm_tahun_kepengurusan')
												->get();
									foreach($tahuns as $bidang)
									{
								?>
									<option value="{{ $bidang->id_tahun_kepengurusan }}">{{ $bidang->nm_tahun_kepengurusan }}</option>
								<?php 
									}
								?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="telephone" class="col-md-3 control-label">Telephone :</label>
						<div class="col-md-8">
							<input type="number" name="telp" id="telp" class="form-control" placeholder="08xxxxxxxxxx">
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="col-md-3 control-label">Email :</label>
						<div class="col-md-8">
							<input type="text" name="email" id="email" class="form-control" placeholder="example@gmail.com">
						</div>
					</div>

					<div class="form-group">
						<label for="fb" class="col-md-3 control-label">Facebook :</label>
						<div class="col-md-8">
							<input type="text" name="fb" id="fb" class="form-control" placeholder="facebook.com/example">
						</div>
					</div>

					<div class="form-group">
						<label for="instagram" class="col-md-3 control-label">Instagram :</label>
						<div class="col-md-8">
							<input type="text" name="instagram" id="instagram" class="form-control" placeholder="instagram.com/example">
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