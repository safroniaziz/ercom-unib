<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use App\Jabatan;

class JabatanController extends Controller
{
    public function index()
    {
    	return view('admin/jabatan_pengurus.index');
    }

    public function apiJabatan()
    {
        DB::statement(DB::raw('set @rownum=0'));
    	$datas = DB::table('tb_jabatan')
                ->select('id_jabatan','nm_jabatan',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
    			->get();
		return Datatables::of($datas)
	            ->addColumn('action',function($datas){
                return
                '<a onclick="editJabatan('.$datas->id_jabatan.')"  class="btn btn-primary btn-xs btn-flat"><i class="glyphicon glyphicon-edit btn-xs"></i></a> '.
                '<a onclick="hapusJabatan('.$datas->id_jabatan.')" class="btn btn-danger btn-xs btn-flat"><i class="glyphicon glyphicon-trash btn-xs"></i></a> ';
            })->make(true);
    }

    public function store(Request $request)
    {
        $get_jabatan = [
            'nm_jabatan'  =>  $request['nm_jabatan']
        ];

        Jabatan::create($get_jabatan);
        return view('admin/tahun_kepengurusan.index');
    }

    public function edit($id_jabatan)
    {
        $jabatan = Jabatan::find($id_jabatan);
        return $jabatan;
    }

    public function update(Request $request, $id_jabatan)
    {
        $jabatan = Jabatan::find($id_jabatan);
        $jabatan->nm_jabatan = $request['nm_jabatan'];
        $jabatan->update();
        return $jabatan;
    }

    public function destroy($id_jabatan)
    {
        Jabatan::destroy($id_jabatan);
    }
}
