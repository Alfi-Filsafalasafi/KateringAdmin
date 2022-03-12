<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Illuminate\Support\Facades\Storage;
use App\bankModel;
use Illuminate\Support\Facades\File;
class bankController extends Controller
{
    public function index(Request $request){
        $cari = $request->cari;

    	$data = bankModel::where('nama_bank','like',"%".$cari."%")->orwhere('kode_bank','like',"%".$cari."%")->orderByRaw('created_at DESC')->paginate(5);
        
    	return view('page.bank.bank',['cari'=>$cari])->with('data',$data);
    } 

    public function create(Request $request){
    	$data = new bankModel();
    	$data->nama_bank = $request->nama_bank;
        $data->no_virtual_account_bank = $request->no_virtual_account_bank;
        if($request->hasFile('foto_bank')){
            // memindahkan foto_mitra ke dalam folder public/images
            $request->file('foto_bank')->move('ximgnasboxyz/xbank/', $request->file('foto_bank')->getClientOriginalName());
            // menyimpan nama foto_mitra ke dalam database
            $data->foto_bank = $request->file('foto_bank')->getClientOriginalName();
        }
        $data->timestamps = false;
        $data->save();

    return redirect()->route('bank')->with('success', 'Post ditambahkan');        
    }


    public function edit($kode_bank){
        $data = bankModel::where('kode_bank',$kode_bank)->first();
         return view('page.bank.bank_edit')->with('data', $data);
    }


    public function update(Request $request, $kode_bank){

        $data = bankModel::where('kode_bank',$kode_bank)->first();
        $foto = $data->foto_bank;
        if($request->hasFile('foto_bank')){
            $gambar = bankModel::where('kode_bank',$kode_bank)->first();
            // hapus foto_mitra yg lama
            File::delete('ximgnasboxyz/xbank/'. $gambar->foto_bank);
            // upload foto_mitra yg baru
            $request->file('foto_bank')->move('ximgnasboxyz/xbank/', $request->file('foto_bank')->getClientOriginalName());
            
            $foto = $request->file('foto_bank')->getClientOriginalName();
            
        }
        
        
        DB::table('xref_bank')->where('kode_bank', $kode_bank)->update([
            'kode_bank' => $request->kode_bank,
            'nama_bank' => $request->nama_bank,
            'no_virtual_account_bank' => $request->no_virtual_account_bank,
            'foto_bank' => $foto
        ]);

        return redirect()->route('bank')->withInfo('bank berhasil di rubah');
    }


    public function destroy(Request $request, $kode_bank){
        
            $gambar = bankModel::where('kode_bank',$kode_bank)->first();
            // menghapus foto di folder imgmitra
            File::delete('ximgnasboxyz/xbank/'. $gambar->foto_bank);
            bankModel::where('kode_bank',$kode_bank)->delete();
    
            return redirect()->route('bank')->withDanger('Data berhasil di hapus'); 
        // mencari foto berdasrkan id
    	
    }
}
