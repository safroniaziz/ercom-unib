<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use App\Kegiatan;


class KegiatanController extends Controller
{
    public function index()
    {
    	return view('admin/kegiatan.index');
    }

    public function apiKegiatan()
    {
        DB::statement(DB::raw('set @rownum=0'));
    	$datas = DB::table('tb_kegiatan')
    			->join('tb_bidang_kepengurusan','tb_bidang_kepengurusan.id_bidang','tb_kegiatan.id_bidang')
                ->select('id_kegiatan','judul_kegiatan','nm_bidang','gambar_kegiatan','created_at','isi',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
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
                '<a onclick="editKegiatan('.$datas->id_kegiatan.')"  class="btn btn-primary btn-xs btn-flat"><i class="glyphicon glyphicon-edit btn-xs"></i></a> '.
                '<a onclick="hapusKegiatan('.$datas->id_kegiatan.')" class="btn btn-danger btn-xs btn-flat"><i class="glyphicon glyphicon-trash btn-xs"></i></a> ';
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
        $kegiatan = $request->all();
        $kegiatan['gambar_kegiatan'] = null;

        if ($request->hasFile('gambar_kegiatan')) {
        	$kegiatan['gambar_kegiatan'] = '/upload/gambar/kegiatan/'.str_slug($kegiatan['judul_kegiatan'],'-').'.'.$request->gambar_kegiatan->getClientOriginalExtension();
        	$request->gambar_kegiatan->move(public_path('/upload/gambar/kegiatan'), $kegiatan['gambar_kegiatan']);
        }

        Kegiatan::create($kegiatan);
        return response()->json([
        	'success'	=> true
        ]);
    }

    public function edit($id_kegiatan)
    {
        $kegiatan = Kegiatan::findorFail($id_kegiatan);
        return $kegiatan;
    }

    public function update(Request $request, $id_kegiatan)
    {
        // $kegiatan = Kegiatan::find($id_kegiatan);
        // $kegiatan->judul_kegiatan = $request['judul_kegiatan'];
        // $kegiatan->id_bidang = $request['id_bidang'];
        // $kegiatan->id_prodi = $request['id_prodi'];
        // $kegiatan->telp = $request['telp'];
        // $kegiatan->email = $request['email'];
        // $kegiatan->fb = $request['fb'];
        // $kegiatan->instagram = $request['instagram'];
        // $kegiatan->update();
        // return $kegiatan;
        $input = $request->all();
        $kegiatan = Kegiatan::findOrFail($id_kegiatan);

        $input['gambar_kegiatan'] = $kegiatan->gambar_kegiatan;

        if ($request->hasFile('gambar_kegiatan')) {
        	if ($kegiatan->gambar_kegiatan != NULL) {
        		unlink(public_path($kegiatan->gambar_kegiatan));
        	}
        	$input['gambar_kegiatan'] = '/upload/gambar/kegiatan/'.str_slug($input['judul_kegiatan'],'-').'.'.$request->gambar_kegiatan->getClientOriginalExtension();
        	$request->gambar_kegiatan->move(public_path('/upload/gambar/kegiatan'), $input['gambar_kegiatan']);
        }

        $kegiatan->update($input);
        return response()->json([
        	'success'	=> true
        ]);
    }

    public function destroy($id_kegiatan)
    {
        // Kegiatan::destroy($id_kegiatan);
    	$kegiatan = Kegiatan::findOrFail($id_kegiatan);

    	if ($kegiatan->gambar_kegiatan != null) {
    		unlink(public_path($kegiatan->gambar_kegiatan));
    	}

    	Kegiatan::destroy($id_kegiatan);
    	return response()->json([
    		'success'	=>	true
    	]);
    }
}
