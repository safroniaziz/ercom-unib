<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
use App\Prodi;

class ProdiController extends Controller
{
    public function index()
    {
    	return view('admin/prodi.index');
    }

    public function apiProdi()
    {
        DB::statement(DB::raw('set @rownum=0'));
    	$datas = DB::table('tb_prodi')
                ->select('id_prodi','nm_prodi',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
    			->get();
		return Datatables::of($datas)
	            ->addColumn('action',function($datas){
                return
                '<a onclick="editProdi('.$datas->id_prodi.')"  class="btn btn-primary btn-xs btn-flat"><i class="glyphicon glyphicon-edit btn-xs"></i></a> '.
                '<a onclick="hapusProdi('.$datas->id_prodi.')" class="btn btn-danger btn-xs btn-flat"><i class="glyphicon glyphicon-trash btn-xs"></i></a> ';
            })->make(true);
    }

    public function store(Request $request)
    {
        $get_prodi = [
            'nm_prodi'  =>  $request['nm_prodi']
        ];

        Prodi::create($get_prodi);
        return view('admin/tahun_kepengurusan.index');
    }

    public function edit($id_prodi)
    {
        $prodi = Prodi::find($id_prodi);
        return $prodi;
    }

    public function update(Request $request, $id_prodi)
    {
        $prodi = Prodi::find($id_prodi);
        $prodi->nm_prodi = $request['nm_prodi'];
        $prodi->update();
        return $prodi;
    }

    public function destroy($id_prodi)
    {
        Prodi::destroy($id_prodi);
    }
}
