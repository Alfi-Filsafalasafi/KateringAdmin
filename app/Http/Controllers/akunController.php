<?php

namespace App\Http\Controllers;

use App\User;
use App\akunModel;
use App\levelModel;
use Illuminate\Http\Request;
// use App\Http\Controllers\Hash;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class akunController extends Controller
{
    public function index(Request $request)
    {
        $level = levelModel::all();
        $cari = $request->cari;
        $data = akunModel::where('name','like',"%".$cari."%")->orderByRaw('created_at DESC')->paginate(5);
        return view('page.admin.admin',['cari'=>$cari], compact('level'))->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $id = Uuid::uuid(4);
        $data = new User();
        // $data->id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->id_level = $request->id_level;
        // $data->is_admin = $request->is_admin;
        $data->password = Hash::make($request['password']);
        if($request->hasFile('foto')){
            // memindahkan foto ke dalam folder public/images
            $request->file('foto')->move('ximgnasboxyz/xakun/', $request->file('foto')->getClientOriginalName());
            // menyimpan nama foto ke dalam database
            $data->foto = $request->file('foto')->getClientOriginalName();
        }
        $data->save();

        return redirect()->route('akun')->with('success', 'Data Akun Berhasil Di Tambahkan...!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function foto(Request $request)
    {
        $data = new User();
        // cek gambar dari form
        if($request->hasFile('foto')){
            // memindahkan foto ke dalam folder public/images
            $request->file('foto')->move('imgmitra/', $request->file('foto')->getClientOriginalName());
            // menyimpan nama foto ke dalam database
            $data->foto = $request->file('foto')->getClientOriginalName();
        $data->save();
        }

        // Session::flash('alert', 'Data Berhasil Di Tambahkan');


        return redirect()->route('akun')->with('success', 'Data Akun Berhasil Di Ubah...!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $level = levelModel::all();
        $data = User::where('id',$id)->first();
         return view('page.admin.admin_edit', compact('level'))->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $password = $request->password;
        $data->id_level = $request->id_level;
        if ($password == '') {
            $data->password = $data->password;
        }else{
            $data->password = Hash::make($request->password);
        }
        // cek jika file gambar
        if($request->hasFile('foto')){
            // cek foto lama
            $gambar = User::where('id',$id)->first();
            // hapus foto yg lama
            File::delete('ximgnasboxyz/xakun/'. $gambar->foto);
            // upload foto yg baru
            $request->file('foto')->move('ximgnasboxyz/xakun/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
        }
        $data->save();
        // Session::flash('alert', 'Data Berhasil Di Ubah');


        return redirect()->route('akun')->withInfo('Data Akun Berhasil Di Ubah...!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gambar = user::where('id',$id)->first();
            // menghapus foto di folder imgmitra
        File::delete('ximgnasboxyz/xakun/'. $gambar->foto);
        User::where('id',$id)->delete();

        // Session::flash('alert', 'Data Berhasil Di Hapus');

        return redirect()->route('akun')->withDanger('Data Akun Berhasil Di Hapus...!');
    }
    public function fototop($id){
        $data = DB::select('select foto from products where id = $id');

        return view('master_layout.theme_topbar', compact('data'));
    }
}
