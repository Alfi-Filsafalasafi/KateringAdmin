<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use App\mitraModel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use session;

class mitraController extends Controller
{
    public function index(Request $request){
        $cari = $request->cari;

    	$data = mitraModel::where('nama_mitra','like',"%".$cari."%")->orderByRaw('tgl_buat_mitra DESC')->paginate(5);
        
    	return view('page.mitra',['cari'=>$cari])->with('data',$data);
    }

    public function create(Request $request){
    	$data = new mitraModel();
    	$data->nama_mitra = $request->nama_mitra;

    	$data->kata_sandi_mitra = $request->kata_sandi_mitra;
    	$data->isi_toko_mitra = $request->isi_toko_mitra;
    	$data->no_hp_mitra = $request->no_hp_mitra;
    	$data->alamat_mitra = $request->alamat_mitra;
    	if($request->hasFile('foto_mitra')){
            // memindahkan foto_mitra ke dalam folder public/images
            $request->file('foto_mitra')->move('ximgnasboxyz/xmitra/', $request->file('foto_mitra')->getClientOriginalName());
            // menyimpan nama foto_mitra ke dalam database
            $data->foto_mitra = $request->file('foto_mitra')->getClientOriginalName();
    	}
        $data->tgl_buat_mitra = $request->tgl_buat_mitra;
        $data->kapasitas_mitra = $request->kapasitas_mitra;
        $data->batas_waktu_mitra = $request->batas_waktu_mitra;
        $data->rating_mitra = $request->rating_mitra;
        $data->status_buka_mitra = $request->status_buka_mitra;
        $data->id_kategori_layanan = $request->status_layanan;
        $data->timestamps = false;
        $data->save();

    return redirect()->route('mitra')->with('success', 'Data Akun Berhasil Di Tambahkan...!');        
    }


    public function edit($id_mitra){
        $data = mitraModel::where('id_mitra',$id_mitra)->first();
         return view('page.mitra_edit')->with('data', $data);
    }


    public function update(Request $request, $id_mitra){

        $data = mitraModel::where('id_mitra',$id_mitra)->first();
        $foto= $data->foto_mitra;
        if($request->hasFile('foto_mitra')){
            $gambar = mitraModel::where('id_mitra',$id_mitra)->first();
            // hapus foto_mitra yg lama
            File::delete('ximgnasboxyz/xmitra/'. $gambar->foto_mitra);
            // upload foto_mitra yg baru
            $request->file('foto_mitra')->move('ximgnasboxyz/xmitra/', $request->file('foto_mitra')->getClientOriginalName());
            $foto = $request->file('foto_mitra')->getClientOriginalName();
        }
        DB::table('xmitra')->where('id_mitra', $id_mitra)->update([
            'id_mitra' => $request->id_mitra,
            'nama_mitra' => $request->nama_mitra,
            'kata_sandi_mitra' => $request->kata_sandi_mitra,
            'isi_toko_mitra' => $request->isi_toko_mitra,
            'no_hp_mitra' => $request->no_hp_mitra,
            'alamat_mitra' => $request->alamat_mitra,
            'foto_mitra' => $foto,
            'tgl_buat_mitra' => $request->tgl_buat_mitra,
            'kapasitas_mitra' => $request->kapasitas_mitra,
            'batas_waktu_mitra' => $request->batas_waktu_mitra,
            'rating_mitra' => $request->rating_mitra,
            'status_buka_mitra' => $request->status_buka_mitra
        ]);


        return redirect()->route('mitra')->withInfo('Data berhasil di ubah ....!');
    }


    public function destroy(Request $request, $id_mitra){
    	// mencari foto berdasrkan id
    	$gambar = mitraModel::where('id_mitra',$id_mitra)->first();
    	// menghapus foto di folder imgmitra
        File::delete('ximgnasboxyz/xmitra/'. $gambar->foto_mitra);
        // menghapus semua data mitra berdasrkan id
    	mitraModel::where('id_mitra',$id_mitra)->delete();

    	return redirect()->route('mitra')->withdanger('Data berhasil di hapus ...!');
    }
}
