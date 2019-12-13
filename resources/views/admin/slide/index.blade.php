@extends('layouts.admin_template')
@section('main-title','Manajemen Slide')
@section('manajemen-title','Manajemen Slide')
@section('manajemen-title-right')
	<a onclick="tambahSlide()" class="btn btn-primary pull-right btn-flat"  style="margin-top: -8px; margin-left: 10px;"><i class="fa fa-plus"></i>&nbsp;Tambah Slide</a>
	<button type="button" class="btn btn-warning pull-right btn-flat" style="margin-top: -8px; margin-left: 10px;" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false"><i class="fa fa-trash"></i>&nbsp;File Sampah
@endsection
@section('content')

	<div class="row">
		<div class="col-md-12 table-responsive">
			<table class="table table-bordered table-hover table-striped" id="table-slide" style="width: 100%;">
				<thead>
					<tr>
						<th>No</th>
						<th>Gambar Slide</th>
						<th>Keterangan</th>
						<th>Aksi</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>

	@include('admin/slide.form-slide')
@endsection