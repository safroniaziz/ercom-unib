<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use App\Pembina;

class PembinaController extends Controller
{
    public function index()
    {
    	return view('admin/pembina.index');
    }


    public function apiPembina()
    {
        DB::statement(DB::raw('set @rownum=0'));
    	$datas = DB::table('tb_pembina')
                ->select('nm_pembina','id_pembina','sambutan','foto',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
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
                '<a onclick="editPembina('.$datas->id_pembina.')"  class="btn btn-primary btn-xs btn-flat"><i class="glyphicon glyphicon-edit btn-xs"></i></a> '.
                '<a onclick="hapusPembina('.$datas->id_pembina.')" class="btn btn-danger btn-xs btn-flat"><i class="glyphicon glyphicon-trash btn-xs"></i></a> ';
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
        $pembina = $request->all();
        $pembina['foto'] = null;

        if ($request->hasFile('foto')) {
        	$pembina['foto'] = '/upload/foto/pembina/'.str_slug($pembina['nm_pembina'],'-').'.'.$request->foto->getClientOriginalExtension();
        	$request->foto->move(public_path('/upload/foto/pembina'), $pembina['foto']);
        }

        Pembina::create($pembina);
        return response()->json([
        	'success'	=> true
        ]);
    }

    public function edit($id_pembina)
    {
        $pembina = Pembina::find($id_pembina);
        return $pembina;
    }

    public function update(Request $request, $id_pembina)
    {
        // $anggota = Anggota::find($id_pembina);
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
        $pembina = Pembina::findOrFail($id_pembina);

        $input['foto'] = $pembina->foto;

        if ($request->hasFile('foto')) {
        	if ($pembina->foto != null) {
        		unlink(public_path($pembina->foto));
        	}
        	$input['foto'] = '/upload/foto/pembina/'.str_slug($input['nm_pembina'],'-').'.'.$request->foto->getClientOriginalExtension();
        	$request->foto->move(public_path('/upload/foto/pembina'), $input['foto']);
        }

        $pembina->update($input);
        return response()->json([
        	'success'	=> true
        ]);
    }

    public function destroy($id_pembina)
    {
        // Anggota::destroy($id_pembina);
    	$pembina = Pembina::findOrFail($id_pembina);

    	if ($pembina->foto != null) {
    		unlink(public_path($pembina->foto));
    	}

    	Pembina::destroy($id_pembina);
    	return response()->json([
    		'success'	=>	true
    	]);
    }
}
