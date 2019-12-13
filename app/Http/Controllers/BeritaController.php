<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use App\Berita;

class BeritaController extends Controller
{
    public function index()
    {
    	return view('admin/berita.index');
    }

    public function apiBerita()
    {
        DB::statement(DB::raw('set @rownum=0'));
    	$datas = DB::table('tb_berita')
    			->join('tb_jenis_berita','tb_jenis_berita.id_jenis_berita','tb_berita.id_jenis_berita')
                ->select('tb_berita.judul_berita','tb_berita.isi_berita','tb_berita.created_at','tb_berita.foto','tb_berita.id_berita','tb_jenis_berita.nm_jenis_berita',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
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
                '<a onclick="editBerita('.$datas->id_berita.')"  class="btn btn-primary btn-xs btn-flat"><i class="glyphicon glyphicon-edit btn-xs"></i></a> '.
                '<a onclick="hapusBerita('.$datas->id_berita.')" class="btn btn-danger btn-xs btn-flat"><i class="glyphicon glyphicon-trash btn-xs"></i></a> ';
            })->rawColumns(['foto','action'])->make(true);
    }

    public function store(Request $request)
    {

        $berita = $request->all();
        $berita['foto'] = null;

        if ($request->hasFile('foto')) {
        	$berita['foto'] = '/upload/foto/berita/'.str_slug($berita['judul_berita'],'-').'.'.$request->foto->getClientOriginalExtension();
        	$request->foto->move(public_path('/upload/foto/berita'), $berita['foto']);
        }

        Berita::create($berita);
        return response()->json([
        	'success'	=> true
        ]);
    }

    public function edit($id_berita)
    {
        $berita = Berita::findorFail($id_berita);
        return $berita;
    }

    public function update(Request $request, $id_berita)
    {

        $input = $request->all();
        $berita = Berita::findOrFail($id_berita);

        $input['foto'] = $berita->foto;

        if ($request->hasFile('foto')) {
        	if ($berita->foto != NULL) {
        		unlink(public_path($berita->foto));
        	}
        	$input['foto'] = '/upload/foto/berita/'.str_slug($input['judul_berita'],'-').'.'.$request->foto->getClientOriginalExtension();
        	$request->foto->move(public_path('upload/foto/berita'), $input['foto']);
        }

        $berita->update($input);
        return response()->json([
        	'success'	=> true
        ]);
    }

    public function destroy($id_berita)
    {
        // Berita::destroy($id_berita);
    	$berita = Berita::findOrFail($id_berita);

    	if ($berita->foto != null) {
    		unlink(public_path($berita->foto));
    	}

    	Berita::destroy($id_berita);
    	return response()->json([
    		'success'	=>	true
    	]);
    }
}
