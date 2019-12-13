@extends('layouts.admin_template')
@section('main-title','Manajemen Jenis Berita')
@section('manajemen-title','Manajemen Jenis Berita')
@section('manajemen-title-right')
	<a onclick="tambahJenisBerita()" class="btn btn-primary pull-right btn-flat"  style="margin-top: -8px; margin-left: 10px;"><i class="fa fa-plus"></i>&nbsp;Tambah Jenis Berita</a>
	<button type="button" class="btn btn-warning pull-right btn-flat" style="margin-top: -8px; margin-left: 10px;" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false"><i class="fa fa-trash"></i>&nbsp;File Sampah
@endsection
@section('content')

	<div class="row">
			<div class="col-md-12">
			<table class="table table-bordered table-hover table-striped" id="table-jenis-berita" style="width: 100%;">
				<thead>
					<tr>
						<th>No</th>
						<th>Jenis Berita</th>
						<th>Aksi</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
	@include('admin/jenis_berita.form_jenis_berita')
@endsection