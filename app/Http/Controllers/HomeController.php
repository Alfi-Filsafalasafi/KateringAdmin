<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use App\totalModel;
use App\favoritModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menu = favoritModel::all();
        $jumlah_mitra = DB::table('xmitra')->count();
        $jumlah_customer = DB::table('xcustomer')->count();
        $jumlah_admin = DB::table('users')->count();
        $jumlah_menu = DB::table('xmenu')->count();
        $jumlah_menu_cat = DB::table('xmenu')->where('id_kategori_menu', '1')->count();
        $jumlah_menu_food = DB::table('xmenu')->where('id_kategori_menu', '2')->count();
        $jumlah_menu_groc = DB::table('xmenu')->where('id_kategori_menu', '3')->count();
        $saldo = DB::table('v_total')->sum('total_transaksi');
       $jumlah_pemasukanlalu = DB::table('v_total_bulan_lalu')->sum('harga');
        $jumlah_bulanini = DB::table('v_total_bulan_ini')->sum('harga');
        $pertambahan = '1';
        $new_order = DB::table('xtransaksi')->where('id_status_pengiriman', '1')->count();

        $v_total = totalModel::all();
           
        $bulan = [];
        $Rp = [];
        $Rpcat = [];
        $Rpfood = [];
        $Rpgroc = [];
        foreach ($v_total as $total) {
            $bulan[] = $total->bulan;
            $Rp[] = intval($total->total);
            $Rpcat[] = intval($total->total_cat);
            $Rpfood[] = intval($total->total_food);
            $Rpgroc[] = intval($total->total_grocery);
        }
        // dd($Rp);
        // dd($bulan);
        // dd($menu);
        if ($saldo == 0) {
        $graf_cat = 1;
        $graf_food = 1;
        $graf_groc = 1;
        } else {

        $cat = DB::table('v_graf_cat')->sum('total_catering');
        $graf_cat =  $cat /$saldo *100 ;
    

        $food = DB::table('v_graf_food')->sum('total_catering');
        $graf_food =  $food /$saldo *100 ;

        $groc = DB::table('v_graf_groc')->sum('total_catering');
        $graf_groc =  $groc /$saldo *100 ;

        }
        // dd($graf_cat);

        return view('home', ['jumlah_bulanini' => $jumlah_bulanini,
                             'jumlah_menu'=> $jumlah_menu,
                             'jumlah_menu_cat'=> $jumlah_menu_cat,
                             'jumlah_menu_food'=> $jumlah_menu_food,
                             'jumlah_menu_groc'=> $jumlah_menu_groc,
                             'jumlah_admin'=> $jumlah_admin,
                             'saldo' => $saldo,
                             'jumlah_bulanini' => $jumlah_bulanini,
                             'jumlah_pemasukanlalu' => $jumlah_pemasukanlalu,
                             'jumlah_customer' => $jumlah_customer, 
                             'jumlah_mitra' => $jumlah_mitra, 
                             'new_order' => $new_order,
                             'Rp' => $Rp,
                             'graf_cat' => $graf_cat,
                             'graf_food' => $graf_food,
                             'graf_groc' => $graf_groc,
                             'Rpcat' => $Rpcat,
                             'Rpfood' => $Rpfood,
                             'Rpgroc' => $Rpgroc,
                             'bulan' => $bulan ])->with('menu',$menu);
    }
}
