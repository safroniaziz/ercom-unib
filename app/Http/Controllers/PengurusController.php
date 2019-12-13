<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use App\Pengurus;

class PengurusController extends Controller
{
    public function index()
    {
    	return view('admin/pengurus.index');
    }

    public function apiPengurus()
    {
        DB::statement(DB::raw('set @rownum=0'));
    	$datas = DB::table('tb_pengurus')
    			->join('tb_prodi','tb_prodi.id_prodi','tb_pengurus.id_prodi')
                ->join('tb_jabatan','tb_jabatan.id_jabatan','tb_pengurus.id_jabatan')
                ->join('tb_bidang_kepengurusan','tb_bidang_kepengurusan.id_bidang','tb_pengurus.id_bidang')
    			->join('tb_tahun_kepengurusan','tb_tahun_kepengurusan.id_tahun_kepengurusan','tb_pengurus.id_tahun_kepengurusan')
                ->select('id_pengurus','nm_pengurus','tb_pengurus.npm','nm_tahun_kepengurusan','nm_bidang','nm_prodi','nm_jabatan','telp','foto','email','fb','instagram',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
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
                '<a onclick="editPengurus('.$datas->id_pengurus.')"  class="btn btn-primary btn-xs btn-flat"><i class="glyphicon glyphicon-edit btn-xs"></i></a> '.
                '<a onclick="hapusPengurus('.$datas->id_pengurus.')" class="btn btn-danger btn-xs btn-flat"><i class="glyphicon glyphicon-trash btn-xs"></i></a> ';
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
        $pengurus = $request->all();
        $pengurus['foto'] = null;

        if ($request->hasFile('foto')) {
        	$pengurus['foto'] = '/upload/foto/pengurus/'.str_slug($pengurus['nm_pengurus'],'-').'.'.$request->foto->getClientOriginalExtension();
        	$request->foto->move(public_path('/upload/foto/pengurus'), $pengurus['foto']);
        }

        Pengurus::create($pengurus);
        return response()->json([
        	'success'	=> true
        ]);
    }

    public function edit($id_pengurus)
    {
        $pengurus = Pengurus::find($id_pengurus);
        return $pengurus;
    }

    public function update(Request $request, $id_pengurus)
    {
        // $anggota = Anggota::find($id_pengurus);
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
        $pengurus = Pengurus::findOrFail($id_pengurus);

        $input['foto'] = $pengurus->foto;

        if ($request->hasFile('foto')) {
        	if ($pengurus->foto != null) {
        		unlink(public_path($pengurus->foto));
        	}
        	$input['foto'] = '/upload/foto/pengurus/'.str_slug($input['nm_pengurus'],'-').'.'.$request->foto->getClientOriginalExtension();
        	$request->foto->move(public_path('/upload/foto/pengurus'), $input['foto']);
        }

        $pengurus->update($input);
        return response()->json([
        	'success'	=> true
        ]);
    }

    public function destroy($id_pengurus)
    {
        // Anggota::destroy($id_pengurus);
    	$pengurus = Pengurus::findOrFail($id_pengurus);

    	if ($pengurus->foto != null) {
    		unlink(public_path($pengurus->foto));
    	}

    	Pengurus::destroy($id_pengurus);
    	return response()->json([
    		'success'	=>	true
    	]);
    }
}
