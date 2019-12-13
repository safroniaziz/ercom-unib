@extends('layouts.admin_template')
@section('main-title','Manajemen Program Studi')
@section('manajemen-title','Manajemen Program Studi')
@section('manajemen-title-right')
	<a onclick="tambahJabatan()" class="btn btn-primary pull-right btn-flat"  style="margin-top: -8px; margin-left: 10px;"><i class="fa fa-plus"></i>&nbsp;Tambah Jabatan Pengurus Inti</a>
	<button type="button" class="btn btn-warning pull-right btn-flat" style="margin-top: -8px; margin-left: 10px;" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false"><i class="fa fa-trash"></i>&nbsp;File Sampah
@endsection
@section('content')

	<div class="row">
			<div class="col-md-12">
			<table class="table table-bordered table-hover table-striped" id="table-jabatan" style="width: 100%;">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Jabatan Pengurus Inti</th>
						<th>Aksi</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
	@include('admin/jabatan_pengurus.form_jabatan')
@endsection