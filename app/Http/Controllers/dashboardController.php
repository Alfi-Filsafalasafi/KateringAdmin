<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){
        $jumlah_mitra = DB::table('xmitra')->count();

    	return view('page.dashboard_page');
    }
}
