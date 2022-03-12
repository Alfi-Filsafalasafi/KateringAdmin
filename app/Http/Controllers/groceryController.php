<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\groceryModel;
use App\mitraModel;
use App\menuModel;
use Redirect,Response,DB,Config;
use Illuminate\Support\Facades\File;

class groceryController extends Controller
{
    public function index(Request $request){
        $mitra = MitraModel::all();
        $cari = $request->cari;
    	$data = menuModel::where('id_kategori_menu','3')
                           ->where(function($q) use ($cari){
                               $q->where('nama_menu','like',"%".$cari."%")
                                 ->orwhere('nama_mitra', 'like', "%".$cari."%");
                           })
                           ->paginate(10);
        return view('page.grocery.menu_grocery', ['cari'=>$cari], compact('mitra'))->with('data',$data);
        
     
        
    } 
    public function store(){
        
 
    }

    public function create(Request $request){
       
    	$data = new groceryModel();
    	$data->nama_menu = $request->nama_menu;
                      $data->rating_menu = $request->rating_menu;
        $data->harga_menu = $request->harga_menu;
        $data->desk_menu = $request->desk_menu;
        
        if($request->hasFile('foto_menu')){
            // memindahkan foto_mitra ke dalam folder public/images
            $request->file('foto_menu')->move('ximgnasboxyz/xmenu/grocery/', $request->file('foto_menu')->getClientOriginalName());
            // menyimpan nama foto_mitra ke dalam database
            $data->foto_menu = $request->file('foto_menu')->getClientOriginalName();
        }
        $data->min_pembelian_menu = $request->min_pembelian_menu;
        $data->promo_menu = $request->promo_menu;
        $data->stok_menu = $request->stok_menu;
        $data->id_mitra = $request->id_mitra;
        $data->timestamps = false;
        $data->id_kategori_menu = '3';
        $data->save();

    return redirect()->route('menu_grocery')->with('succes', 'data berhasil di tambah ....!');        
    }


    public function edit($id_menu){
        $mitra = MitraModel::all();
        $data = groceryModel::where('id_menu',$id_menu)->first();
         return view('page.grocery.grocery_update', compact('mitra'))->with('data', $data);
    }


    public function update(Request $request, $id_menu){

        $data = groceryModel::where('id_menu',$id_menu)->first();
        $foto = $data->foto_menu;
        if($request->hasFile('foto_menu')){
            $gambar = groceryModel::where('id_menu',$id_menu)->first();
            // hapus foto_mitra yg lama
            File::delete('ximgnasboxyz/xmenu/grocery/'. $gambar->foto_menu);
            // upload foto_mitra yg baru
            $request->file('foto_menu')->move('ximgnasboxyz/xmenu/grocery/', $request->file('foto_menu')->getClientOriginalName());
            $foto =  $request->file('foto_menu')->getClientOriginalName();
        }
        
        DB::table('xmenu')->where('id_menu', $id_menu)->update([
            'id_menu' => $request->id_menu,
            'nama_menu' => $request->nama_menu,
            'rating_menu' => $request->rating_menu,
            'foto_menu' =>$foto,
            'desk_menu' => $request->desk_menu,
            'min_pembelian_menu' => $request->min_pembelian_menu,
            'promo_menu' => $request->promo_menu,
            'stok_menu' => $request->stok_menu,
            'id_mitra' => $request->id_mitra,
        ]);


        return redirect()->route('menu_grocery')->withinfo('Data berhasil di ubah ...!');
    }


    public function destroy(Request $request, $id_menu){
        // mencari foto berdasrkan id
    	$gambar = groceryModel::where('id_menu',$id_menu)->first();
    	// menghapus foto di folder imgmitra
        File::delete('ximgnasboxyz/xmenu/grocery/'. $gambar->foto_menu);
    	groceryModel::where('id_menu',$id_menu)->delete();

    	return redirect()->route('menu_grocery')->withdanger('Data berhasil di hapus ..!');
    }
}
