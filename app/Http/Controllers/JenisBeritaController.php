<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use App\JenisBerita;

class JenisBeritaController extends Controller
{
    public function index()
    {
    	return view('admin/jenis_berita.index');
    }

    public function apiJenisBerita()
    {
        DB::statement(DB::raw('set @rownum=0'));
    	$datas = DB::table('tb_jenis_berita')
                ->select('id_jenis_berita','nm_jenis_berita',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
    			->get();
		return Datatables::of($datas)
	            ->addColumn('action',function($datas){
                return
                '<a onclick="editJenisBerita('.$datas->id_jenis_berita.')"  class="btn btn-primary btn-xs btn-flat"><i class="glyphicon glyphicon-edit btn-xs"></i></a> '.
                '<a onclick="hapusJenisBerita('.$datas->id_jenis_berita.')" class="btn btn-danger btn-xs btn-flat"><i class="glyphicon glyphicon-trash btn-xs"></i></a> ';
            })->make(true);
    }

    public function store(Request $request)
    {
        $get_jenis_berita = [
            'nm_jenis_berita'  =>  $request['nm_jenis_berita']
        ];

        JenisBerita::create($get_jenis_berita);
        return view('admin/jenis_berita.index');
    }

    public function edit($id_jenis_berita)
    {
        $jenis_berita = JenisBerita::find($id_jenis_berita);
        return $jenis_berita;
    }

    public function update(Request $request, $id_jenis_berita)
    {
        $jenis_berita = JenisBerita::find($id_jenis_berita);
        $jenis_berita->nm_jenis_berita = $request['nm_jenis_berita'];
        $jenis_berita->update();
        return $jenis_berita;
    }

    public function destroy($id_jenis_berita)
    {
        JenisBerita::destroy($id_jenis_berita);
    }
}
