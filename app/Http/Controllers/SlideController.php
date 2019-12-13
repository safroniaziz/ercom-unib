<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use App\Slide;

class SlideController extends Controller
{
    public function index()
    {
    	return view('admin/slide.index');
    }

    public function apiSlide()
    {
        DB::statement(DB::raw('set @rownum=0'));
    	$datas = DB::table('tb_slide')
                ->select('id_slide','gambar','keterangan',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
    			->get();
		return Datatables::of($datas)
				->addColumn('gambar',function($datas){
					if($datas->gambar == NULL){
						return 'Tidak Ada gambar';
					}
					else
					{
						return '<img class="rounded-square" width="100" height="100" src="'.url($datas->gambar).'" alt=""> ';
					}
				})
	            ->addColumn('action',function($datas){
                return
                '<a onclick="editSlide('.$datas->id_slide.')"  class="btn btn-primary btn-xs btn-flat"><i class="glyphicon glyphicon-edit btn-xs"></i></a> '.
                '<a onclick="hapusSlide('.$datas->id_slide.')" class="btn btn-danger btn-xs btn-flat"><i class="glyphicon glyphicon-trash btn-xs"></i></a> ';
            })->rawColumns(['gambar','action'])->make(true);
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
        $slide = $request->all();
        $slide['gambar'] = null;

        if ($request->hasFile('gambar')) {
        	$slide['gambar'] = '/upload/gambar/slide/'.str_slug($slide['keterangan'],'-').'.'.$request->gambar->getClientOriginalExtension();
        	$request->gambar->move(public_path('/upload/gambar/slide'), $slide['gambar']);
        }

        Slide::create($slide);
        return response()->json([
        	'success'	=> true
        ]);
    }

    public function edit($id_slide)
    {
        $slide = Slide::find($id_slide);
        return $slide;
    }

    public function update(Request $request, $id_slide)
    {
        // $anggota = Anggota::find($id_slide);
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
        $slide = Slide::findOrFail($id_slide);

        $input['gambar'] = $slide->gambar;

        if ($request->hasFile('gambar')) {
        	if ($slide->gambar != null) {
        		unlink(public_path($slide->gambar));
        	}
        	$input['gambar'] = '/upload/gambar/slide/'.str_slug($input['keterangan'],'-').'.'.$request->gambar->getClientOriginalExtension();
        	$request->gambar->move(public_path('/upload/gambar/slide'), $input['gambar']);
        }

        $slide->update($input);
        return response()->json([
        	'success'	=> true
        ]);
    }

    public function destroy($id_slide)
    {
        // Anggota::destroy($id_slide);
    	$slide = Slide::findOrFail($id_slide);

    	if ($slide->gambar != null) {
    		unlink(public_path($slide->gambar));
    	}

    	Slide::destroy($id_slide);
    	return response()->json([
    		'success'	=>	true
    	]);
    }

    public function slideShow()
    {
        $slides = DB::table('tb_slide')
                    ->select('gambar')
                    ->get();
        return view('home.index',compact('slides'));
    }
}
