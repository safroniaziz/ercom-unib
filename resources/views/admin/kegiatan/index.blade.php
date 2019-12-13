@extends('layouts.admin_template')
@section('main-title','Manajemen Agenda')
@section('manajemen-title','Manajemen Agenda')
@section('manajemen-title-right')
	<a onclick="tambahKegiatan()" class="btn btn-primary pull-right btn-flat"  style="margin-top: -8px; margin-left: 10px;"><i class="fa fa-plus"></i>&nbsp;Tambah Agenda</a>
	<button type="button" class="btn btn-warning pull-right btn-flat" style="margin-top: -8px; margin-left: 10px;" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false"><i class="fa fa-trash"></i>&nbsp;File Sampah
@endsection
@section('content')

	<div class="row">
			<div class="col-md-12 table-responsive">
			<table class="table table-bordered table-hover table-striped" id="table-kegiatan" style="width: 100%;">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul Kegiatan</th>
						<th>Proker Bidang Kegiatan</th>
						<th>Foto Kegiatan</th>
						<th>Isi</th>
						<th>Tanggal Upload</th>
						<th>Aksis</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>

	@include('admin/kegiatan.form-kegiatan')
@endsection