<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customerModel;

class customercontroller extends Controller
{
    public function index(Request $request){
        $cari = $request->cari;

    	$data = customerModel::where('nama_customer','like',"%".$cari."%")->paginate(5);
        
    	return view('page.customer',['cari'=>$cari])->with('data',$data);
    }
}
