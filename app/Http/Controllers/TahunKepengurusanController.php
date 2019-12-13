<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use App\TahunKepengurusan;

class TahunKepengurusanController extends Controller
{
    public function index()
    {
    	return view('admin/tahun_kepengurusan.index');
    }

    public function apiTahunKepengurusan()
    {
        DB::statement(DB::raw('set @rownum=0'));
    	$datas = DB::table('tb_tahun_kepengurusan')
                ->select('id_tahun_kepengurusan','nm_tahun_kepengurusan',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
    			->get();
		return Datatables::of($datas)
	            ->addColumn('action',function($datas){
                return
                '<a onclick="editTahun('.$datas->id_tahun_kepengurusan.')"  class="btn btn-primary btn-xs btn-flat"><i class="glyphicon glyphicon-edit btn-xs"></i></a> '.
                '<a onclick="hapusTahun('.$datas->id_tahun_kepengurusan.')" class="btn btn-danger btn-xs btn-flat"><i class="glyphicon glyphicon-trash btn-xs"></i></a> ';
            })->make(true);
    }

    public function store(Request $request)
    {
        $get_tahun = [
            'nm_tahun_kepengurusan'  =>  $request['nm_tahun_kepengurusan']
        ];

        TahunKepengurusan::create($get_tahun);
        return view('admin/tahun_kepengurusan.index');
    }

    public function edit($id_tahun_kepengurusan)
    {
        $tahun = TahunKepengurusan::find($id_tahun_kepengurusan);
        return $tahun;
    }

    public function update(Request $request, $id_tahun_kepengurusan)
    {
        $indikator = TahunKepengurusan::find($id_tahun_kepengurusan);
        $indikator->nm_tahun_kepengurusan = $request['nm_tahun_kepengurusan'];
        $indikator->update();
        return $indikator;
    }

    public function destroy($id_tahun_kepengurusan)
    {
        TahunKepengurusan::destroy($id_tahun_kepengurusan);
    }

}
