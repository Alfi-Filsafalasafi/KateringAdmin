<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pemesananModel;
use App\detailModel;
use Redirect,Response,DB,Config;
use Illuminate\Support\Facades\File;

class pemesananController extends Controller
{
    public function index(Request $request){
        $cari = $request->cari;
    	$data = pemesananModel::where('id_status_pengiriman','1')->where('nama_customer','like',"%".$cari."%")->orwhere('kode_transaksi',$cari)->orderByRaw('waktu_transaksi ASC')->paginate(10);
        return view('page.pemesanan.list_pemesanan', ['cari' => $cari])->with('data',$data);
        
     
        
    } 
    public function store(){
        
 
    }

    public function create(Request $request){
       
    	     
    }


    public function edit($kode_transaksi){
        $data = pemesananModel::where('kode_transaksi',$kode_transaksi)->first();
        $detail = DB::select('select * from v_transaksi_detail where kode_transaksi = '.$kode_transaksi.'');
         return view('page.pemesanan.aksi_pemesanan', compact('detail'))->with('data', $data);
    }


    public function update(Request $request, $kode_transaksi){

        $data = DB::table('v_transaksi')->where('kode_transaksi',$kode_transaksi)->first();
        
        DB::table('xtransaksi')->where('kode_transaksi', $kode_transaksi)->update([
            'id_status_pengiriman' =>'2',
    
        ]);


        return redirect()->route('list_pemesanan')->withInfo("Pemesanan diterima .....");
        ;
    }


    public function destroy(Request $request, $kode_transaksi){
        // mencari foto berdasrkan id
    	$data = pemesananModel::where('kode_transaksi',$kode_transaksi)->first();
        
        DB::table('xtransaksi')->where('kode_transaksi', $kode_transaksi)->update([
            'id_status_pengiriman' =>'4',
        ]);
    	return redirect()->route('list_pemesanan')->withDanger("Pemesanan tidak diterima .....");
    }
}
