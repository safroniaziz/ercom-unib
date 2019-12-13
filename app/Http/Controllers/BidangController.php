<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use App\BidangKepengurusan;

class BidangController extends Controller
{
    public function index()
    {
    	return view('admin/bidang_kepengurusan.index');
    }

    public function apiBidang()
    {
        DB::statement(DB::raw('set @rownum=0'));
    	$datas = DB::table('tb_bidang_kepengurusan')
                ->select('id_bidang','nm_bidang',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
    			->get();
		return Datatables::of($datas)
	            ->addColumn('action',function($datas){
                return
                '<a onclick="editBidang('.$datas->id_bidang.')"  class="btn btn-primary btn-xs btn-flat"><i class="glyphicon glyphicon-edit btn-xs"></i></a> '.
                '<a onclick="hapusBidang('.$datas->id_bidang.')" class="btn btn-danger btn-xs btn-flat"><i class="glyphicon glyphicon-trash btn-xs"></i></a> ';
            })->make(true);
    }

    public function store(Request $request)
    {
        $get_bidang = [
            'nm_bidang'  =>  $request['nm_bidang']
        ];

        BidangKepengurusan::create($get_bidang);
        return view('admin/bidang_kepengurusan.index');
    }

    public function edit($id_bidang)
    {
        $bidang = BidangKepengurusan::find($id_bidang);
        return $bidang;
    }

    public function update(Request $request, $id_bidang)
    {
        $bidang = BidangKepengurusan::find($id_bidang);
        $bidang->nm_bidang = $request['nm_bidang'];
        $bidang->update();
        return $bidang;
    }

    public function destroy($id_bidang)
    {
        BidangKepengurusan::destroy($id_bidang);
    }
}
