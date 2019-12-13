<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use App\Anggota;

class AnggotaController extends Controller
{
    public function index()
    {
    	return view('admin/anggota.index');
    }

    public function apiAnggota()
    {
        DB::statement(DB::raw('set @rownum=0'));
    	$datas = DB::table('tb_anggota')
    			->join('tb_prodi','tb_prodi.id_prodi','tb_anggota.id_prodi')
    			->join('tb_bidang_kepengurusan','tb_bidang_kepengurusan.id_bidang','tb_anggota.id_bidang')
                ->select('id_anggota','nm_anggota','npm','nm_prodi','nm_bidang','telp','foto','email','fb','instagram',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
    			->get();
		return Datatables::of($datas)
				->addColumn('foto',function($datas){
					if($datas->foto == NULL){
						return 'Tidak Ada Foto';
					}
					else
					{
						return '<img class="rounded-square" width="100" height="100" src="'.url($datas->foto).'" alt=""> ';
					}
				})
	            ->addColumn('action',function($datas){
                return
                '<a onclick="editAnggota('.$datas->id_anggota.')"  class="btn btn-primary btn-xs btn-flat"><i class="glyphicon glyphicon-edit btn-xs"></i></a> '.
                '<a onclick="hapusAnggota('.$datas->id_anggota.')" class="btn btn-danger btn-xs btn-flat"><i class="glyphicon glyphicon-trash btn-xs"></i></a> ';
            })->rawColumns(['foto','action'])->make(true);
    }

    public function store(Request $request)
    {
        // $get_anggota = [
        //     'nm_anggota'  =>  $request['nm_anggota'],
        //     'id_bidang'  =>  $request['id_bidang'],
        //     'id_prodi'  =>  $request['id_prodi'],
        //     'telp'  =>  $request['telp'],
        //     'email'  =>  $request['email'],
        //     'fb'  =>  $request['fb'],
        //     'instagram'  =>  $request['instagram'],
        // ];

        // Anggota::create($get_anggota);
        // return view('admin/anggota.index');
        $anggota = $request->all();
        $anggota['foto'] = null;

        if ($request->hasFile('foto')) {
        	$anggota['foto'] = '/upload/foto/anggota/'.str_slug($anggota['nm_anggota'],'-').'.'.$request->foto->getClientOriginalExtension();
        	$request->foto->move(public_path('/upload/foto/anggota'), $anggota['foto']);
        }

        Anggota::create($anggota);
        return response()->json([
        	'success'	=> true
        ]);
    }

    public function edit($id_anggota)
    {
        $anggota = Anggota::findorFail($id_anggota);
        return $anggota;
    }

    public function update(Request $request, $id_anggota)
    {
        // $anggota = Anggota::find($id_anggota);
        // $anggota->nm_anggota = $request['nm_anggota'];
        // $anggota->id_bidang = $request['id_bidang'];
        // $anggota->id_prodi = $request['id_prodi'];
        // $anggota->telp = $request['telp'];
        // $anggota->email = $request['email'];
        // $anggota->fb = $request['fb'];
        // $anggota->instagram = $request['instagram'];
        // $anggota->update();
        // return $anggota;
        $input = $request->all();
        $anggota = Anggota::findOrFail($id_anggota);

        $input['foto'] = $anggota->foto;

        if ($request->hasFile('foto')) {
        	if ($anggota->foto != NULL) {
        		unlink(public_path($anggota->foto));
        	}
        	$input['foto'] = '/upload/foto/anggota/'.str_slug($input['nm_anggota'],'-').'.'.$request->foto->getClientOriginalExtension();
        	$request->foto->move(public_path('/upload/foto/anggota'), $input['foto']);
        }

        $anggota->update($input);
        return response()->json([
        	'success'	=> true
        ]);
    }

    public function destroy($id_anggota)
    {
        // Anggota::destroy($id_anggota);
    	$anggota = Anggota::findOrFail($id_anggota);

    	if ($anggota->foto != null) {
    		unlink(public_path($anggota->foto));
    	}

    	Anggota::destroy($id_anggota);
    	return response()->json([
    		'success'	=>	true
    	]);
    }
}
