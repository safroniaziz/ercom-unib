<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@index')->name('home');

Route::get('admin', 'DashboardController@index')->name('admin.dashboard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'	=>	'admin/manajemen_tahun_kepengurusan'],function(){
	Route::get('/','TahunKepengurusanController@index')->name('manajemen.tahun.kepengurusan');
	Route::post('/','TahunKepengurusanController@store');
	Route::patch('/{id_tahun_kepengurusan}','TahunKepengurusanController@update');
	Route::delete('/{id_tahun_kepengurusan}','TahunKepengurusanController@destroy');
	Route::get('/{id_tahun_kepengurusan}/edit','TahunKepengurusanController@edit');
});

Route::group(['prefix'	=>	'admin/manajemen_prodi'],function(){
	Route::get('/','ProdiController@index')->name('manajemen.prodi');
	Route::post('/','ProdiController@store');
	Route::patch('/{id_prodi}','ProdiController@update');
	Route::delete('/{id_prodi}','ProdiController@destroy');
	Route::get('/{id_prodi}/edit','ProdiController@edit');
});

Route::group(['prefix'	=>	'admin/manajemen_bidang'],function(){
	Route::get('/','BidangController@index')->name('manajemen.bidang');
	Route::post('/','BidangController@store');
	Route::patch('/{id_bidang}','BidangController@update');
	Route::delete('/{id_bidang}','BidangController@destroy');
	Route::get('/{id_bidang}/edit','BidangController@edit');
});

Route::group(['prefix'	=>	'admin/manajemen_jabatan'],function(){
	Route::get('/','JabatanController@index')->name('manajemen.jabatan');
	Route::post('/','JabatanController@store');
	Route::patch('/{id_jabatan}','JabatanController@update');
	Route::delete('/{id_jabatan}','JabatanController@destroy');
	Route::get('/{id_jabatan}/edit','JabatanController@edit');
});

Route::group(['prefix'	=>	'admin/manajemen_anggota'],function(){
	Route::get('/','AnggotaController@index')->name('manajemen.anggota');
	Route::post('/','AnggotaController@store');
	Route::patch('/{id_anggota}','AnggotaController@update');
	Route::delete('/{id_anggota}','AnggotaController@destroy');
	Route::get('/{id_anggota}/edit','AnggotaController@edit');
});

Route::group(['prefix'	=>	'admin/manajemen_pengurus'],function(){
	Route::get('/','PengurusController@index')->name('manajemen.pengurus');
	Route::post('/','PengurusController@store');
	Route::patch('/{id_pengurus}','PengurusController@update');
	Route::delete('/{id_pengurus}','PengurusController@destroy');
	Route::get('/{id_pengurus}/edit','PengurusController@edit');
});

Route::group(['prefix'	=>	'admin/manajemen_pembina'],function(){
	Route::get('/','PembinaController@index')->name('manajemen.pembina');
	Route::post('/','PembinaController@store');
	Route::patch('/{id_pembina}','PembinaController@update');
	Route::delete('/{id_pembina}','PembinaController@destroy');
	Route::get('/{id_pembina}/edit','PembinaController@edit');
});

Route::group(['prefix'	=>	'admin/manajemen_slide'],function(){
	Route::get('/','SlideController@index')->name('manajemen.slide');
	Route::post('/','SlideController@store');
	Route::patch('/{id_slide}','SlideController@update');
	Route::delete('/{id_slide}','SlideController@destroy');
	Route::get('/{id_slide}/edit','SlideController@edit');
});

Route::group(['prefix'	=>	'admin/manajemen_kegiatan'],function(){
	Route::get('/','KegiatanController@index')->name('manajemen.agenda');
	Route::post('/','KegiatanController@store');
	Route::patch('/{id_agenda}','KegiatanController@update');
	Route::delete('/{id_agenda}','KegiatanController@destroy');
	Route::get('/{id_agenda}/edit','KegiatanController@edit');
});

Route::group(['prefix'	=>	'admin/manajemen_jenis_berita'],function(){
	Route::get('/','JenisBeritaController@index')->name('manajemen.jenis_berita');
	Route::post('/','JenisBeritaController@store');
	Route::patch('/{id_jenis_berita}','JenisBeritaController@update');
	Route::delete('/{id_jenis_berita}','JenisBeritaController@destroy');
	Route::get('/{id_jenis_berita}/edit','JenisBeritaController@edit');
});

Route::group(['prefix'	=>	'admin/manajemen_berita'],function(){
	Route::get('/','BeritaController@index')->name('manajemen.berita');
	Route::post('/','BeritaController@store');
	Route::patch('/{id_berita}','BeritaController@update');
	Route::delete('/{id_berita}','BeritaController@destroy');
	Route::get('/{id_berita}/edit','BeritaController@edit');
});

Route::group(['prefix'	=>	'admin/manajemen_galeri'],function(){
	Route::get('/','GaleriController@index')->name('manajemen.galeri');
	Route::post('/','GaleriController@store');
	Route::patch('/{id_galeri}','GaleriController@update');
	Route::delete('/{id_galeri}','GaleriController@destroy');
	Route::get('/{id_galeri}/edit','GaleriController@edit');
});

Route::group(['prefix'	=>	'admin/manajemen_mapres'],function(){
	Route::get('/','MapresController@index')->name('manajemen.mapres');
	Route::post('/','MapresController@store');
	Route::patch('/{id_mapres}','MapresController@update');
	Route::delete('/{id_mapres}','MapresController@destroy');
	Route::get('/{id_mapres}/edit','MapresController@edit');
});

Route::get('/','SlideController@slideShow')->name('home.slideshot');

Route::group(['prefix'	=>	'admin'],function(){
	Route::get('/api_tahun_kepengurusan','TahunKepengurusanController@apiTahunKepengurusan')->name('api.tahun.kepengurusan');
	Route::get('/api_prodi','ProdiController@apiProdi')->name('api.prodi');
	Route::get('/api_bidang','BidangController@apiBidang')->name('api.bidang');
	Route::get('/api_jabatan','JabatanController@apiJabatan')->name('api.jabatan');
	Route::get('/api_anggota','AnggotaController@apiAnggota')->name('api.anggota');
	Route::get('/api_pengurus','PengurusController@apiPengurus')->name('api.pengurus');
	Route::get('/api_pembina','PembinaController@apiPembina')->name('api.pembina');
	Route::get('/api_slide','SlideController@apiSlide')->name('api.slide');
	Route::get('/api_kegiatan','KegiatanController@apiKegiatan')->name('api.kegiatan');
	Route::get('/api_jenis_berita','JenisBeritaController@apiJenisBerita')->name('api.jenis_berita');
	Route::get('/api_berita','BeritaController@apiBerita')->name('api.berita');
	Route::get('/api_galeri','GaleriController@apiGaleri')->name('api.galeri');
	Route::get('/api_mapres','MapresController@apiMapres')->name('api.mapres');
});