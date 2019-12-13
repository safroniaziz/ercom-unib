<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use App\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
    	return view('admin/galeri.index');
    }

    public function apiGaleri()
    {
        DB::statement(DB::raw('set @rownum=0'));
    	$datas = DB::table('tb_galeri')
    			->join('tb_kegiatan','tb_kegiatan.id_kegiatan','tb_galeri.id_kegiatan')
                ->select('tb_galeri.id_galeri','tb_kegiatan.judul_kegiatan','tb_galeri.foto',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
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
                '<a onclick="editGaleri('.$datas->id_galeri.')"  class="btn btn-primary btn-xs btn-flat"><i class="glyphicon glyphicon-edit btn-xs"></i></a> '.
                '<a onclick="hapusGaleri('.$datas->id_galeri.')" class="btn btn-danger btn-xs btn-flat"><i class="glyphicon glyphicon-trash btn-xs"></i></a> ';
            })->rawColumns(['foto','action'])->make(true);
    }

    public function store(Request $request)
    {

        $galeri = $request->all();
        $galeri['foto'] = null;

        if ($request->hasFile('foto')) {
        	$galeri['foto'] = '/upload/foto/galeri/'.str_slug($galeri['id_galeri'],'-').'.'.$request->foto->getClientOriginalExtension();
        	$request->foto->move(public_path('/upload/foto/galeri'), $galeri['foto']);
        }

        Galeri::create($galeri);
        return response()->json([
        	'success'	=> true
        ]);
    }

    public function edit($id_galeri)
    {
        $galeri = Galeri::findorFail($id_galeri);
        return $galeri;
    }

    public function update(Request $request, $id_galeri)
    {

        $input = $request->all();
        $galeri = Galeri::findOrFail($id_galeri);

        $input['foto'] = $galeri->foto;

        if ($request->hasFile('foto')) {
        	if ($galeri->foto != NULL) {
        		unlink(public_path($galeri->foto));
        	}
        	$input['foto'] = '/upload/foto/galeri/'.str_slug($input['id_galeri'],'-').'.'.$request->foto->getClientOriginalExtension();
        	$request->foto->move(public_path('upload/foto/galeri'), $input['foto']);
        }

        $galeri->update($input);
        return response()->json([
        	'success'	=> true
        ]);
    }

    public function destroy($id_galeri)
    {
        // Galeri::destroy($id_galeri);
    	$galeri = Galeri::findOrFail($id_galeri);

    	if ($galeri->foto != null) {
    		unlink(public_path($galeri->foto));
    	}

    	Galeri::destroy($id_galeri);
    	return response()->json([
    		'success'	=>	true
    	]);
    }
}
