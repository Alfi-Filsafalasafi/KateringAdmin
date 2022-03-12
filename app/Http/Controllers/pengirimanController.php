<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pengirimanModel;
use Redirect,Response,DB,Config;
use Illuminate\Support\Facades\File;

class pengirimanController extends Controller
{
    public function index(Request $request){
        $cari = $request->cari;
    	$data = pengirimanModel::where('id_status_pengiriman','2')->where('nama_customer','like',"%".$cari."%")->orwhere('kode_transaksi',$cari)->orderByRaw('waktu_transaksi ASC')->paginate(10);
        return view('page.pengiriman.list_pengiriman', ['cari' => $cari])->with('data',$data);
    } 
    public function history(Request $request){
        $cari = $request->cari;
    	$data = pengirimanModel::where('id_status_pengiriman','3')->where('nama_customer','like',"%".$cari."%")->orwhere('kode_transaksi',$cari)->orderByRaw('waktu_transaksi DESC')->paginate(10);
        return view('page.history.history', ['cari' => $cari])->with('data',$data);
        
 
    }

    public function history_detail($kode_transaksi){
        $data = pengirimanModel::where('kode_transaksi',$kode_transaksi)->first();
        return view('page.history.history_detail')->with('data', $data);
    	     
    }


    public function edit($kode_transaksi){
        $data = pengirimanModel::where('kode_transaksi',$kode_transaksi)->first();
        $detail = DB::select('select * from v_transaksi_detail where kode_transaksi = '.$kode_transaksi.'');
        
         return view('page.pengiriman.aksi_pengiriman', compact('detail'))->with('data', $data);
    }


    public function update(Request $request, $kode_transaksi){

        $data = pengirimanModel::where('kode_transaksi',$kode_transaksi)->first();
        
        DB::table('xtransaksi')->where('kode_transaksi', $kode_transaksi)->update([
            'id_status_pengiriman' =>'3',
    
        ]);


        return redirect()->route('list_pengiriman')->withinfo("Pengiriman telah selesai ");
        ;
    }


    public function destroy(Request $request, $kode_transaksi){
        // mencari foto berdasrkan id
    	$data = pemesananModel::where('kode_transaksi',$kode_transaksi)->first();
        
        DB::table('xtransaksi')->where('kode_transaksi', $kode_transaksi)->update([
            'id_status_pengiriman' =>'4',
        ]);
    	return redirect()->route('list_pengiriman')->withdanger('Pengiriman dibatalkan');
    }
}
