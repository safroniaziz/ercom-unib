<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use App\Mapres;

class MapresController extends Controller
{
    public function index()
    {
    	return view('admin/mapres.index');
    }

    public function apiMapres()
    {
        DB::statement(DB::raw('set @rownum=0'));
    	$datas = DB::table('tb_mapres')
    			->join('tb_anggota','tb_anggota.npm','tb_mapres.npm')
    			->join('tb_prodi','tb_prodi.id_prodi','tb_anggota.id_prodi')
    			->join('tb_jabatan','tb_jabatan.id_jabatan','tb_anggota.id_jabatan')
    			->join('tb_bidang','tb_bidang.id_bidang','tb_anggota.id_bidang')
                ->select('tb_anggota.nm_anggota',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
    			->get();
		return Datatables::of($datas)
				->addColumn('gambar_kegiatan',function($datas){
					if($datas->gambar_kegiatan == NULL){
						return 'Tidak Ada Gambar';
					}
					else
					{
						return '<img class="rounded-square" width="100" height="100" src="'.url($datas->gambar_kegiatan).'" alt=""> ';
					}
				})
	            ->addColumn('action',function($datas){
                return
                '<a onclick="editKegiatan('.$datas->id_mapres.')"  class="btn btn-primary btn-xs btn-flat"><i class="glyphicon glyphicon-edit btn-xs"></i></a> '.
                '<a onclick="hapusKegiatan('.$datas->id_mapres.')" class="btn btn-danger btn-xs btn-flat"><i class="glyphicon glyphicon-trash btn-xs"></i></a> ';
            })->rawColumns(['gambar_kegiatan','action'])->make(true);
    }

    public function store(Request $request)
    {
        // $get_anggota = [
        //     'judul_kegiatan'  =>  $request['judul_kegiatan'],
        //     'id_bidang'  =>  $request['id_bidang'],
        //     'id_prodi'  =>  $request['id_prodi'],
        //     'telp'  =>  $request['telp'],
        //     'email'  =>  $request['email'],
        //     'fb'  =>  $request['fb'],
        //     'instagram'  =>  $request['instagram'],
        // ];

        // Kegiatan::create($get_anggota);
        // return view('admin/kegiatan.index');
        $mapres = $request->all();
        $mapres['gambar_kegiatan'] = null;

        if ($request->hasFile('gambar_kegiatan')) {
        	$mapres['gambar_kegiatan'] = '/upload/gambar/kegiatan/'.str_slug($mapres['judul_kegiatan'],'-').'.'.$request->gambar_kegiatan->getClientOriginalExtension();
        	$request->gambar_kegiatan->move(public_path('/upload/gambar/kegiatan'), $mapres['gambar_kegiatan']);
        }

        Kegiatan::create($mapres);
        return response()->json([
        	'success'	=> true
        ]);
    }

    public function edit($id_mapres)
    {
        $mapres = Kegiatan::findorFail($id_mapres);
        return $mapres;
    }

    public function update(Request $request, $id_mapres)
    {
        // $mapres = Kegiatan::find($id_mapres);
        // $mapres->judul_kegiatan = $request['judul_kegiatan'];
        // $mapres->id_bidang = $request['id_bidang'];
        // $mapres->id_prodi = $request['id_prodi'];
        // $mapres->telp = $request['telp'];
        // $mapres->email = $request['email'];
        // $mapres->fb = $request['fb'];
        // $mapres->instagram = $request['instagram'];
        // $mapres->update();
        // return $mapres;
        $input = $request->all();
        $mapres = Kegiatan::findOrFail($id_mapres);

        $input['gambar_kegiatan'] = $mapres->gambar_kegiatan;

        if ($request->hasFile('gambar_kegiatan')) {
        	if ($mapres->gambar_kegiatan != NULL) {
        		unlink(public_path($mapres->gambar_kegiatan));
        	}
        	$input['gambar_kegiatan'] = '/upload/gambar/kegiatan/'.str_slug($input['judul_kegiatan'],'-').'.'.$request->gambar_kegiatan->getClientOriginalExtension();
        	$request->gambar_kegiatan->move(public_path('/upload/gambar/kegiatan'), $input['gambar_kegiatan']);
        }

        $mapres->update($input);
        return response()->json([
        	'success'	=> true
        ]);
    }

    public function destroy($id_mapres)
    {
        // Kegiatan::destroy($id_mapres);
    	$mapres = Kegiatan::findOrFail($id_mapres);

    	if ($mapres->gambar_kegiatan != null) {
    		unlink(public_path($mapres->gambar_kegiatan));
    	}

    	Kegiatan::destroy($id_mapres);
    	return response()->json([
    		'success'	=>	true
    	]);
    }
}
