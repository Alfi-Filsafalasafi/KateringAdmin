<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('Error/404', 'ErrorController@index')->name('eror');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/post', 'PostController@index')->name('post.index')->middleware('auth');
Route::get('/post/create', 'PostController@create')->name('post.create')->middleware('auth');
Route::post('/post/create', 'PostController@store')->name('post.store')->middleware('auth');
Route::get('/post/{post}/edit', 'PostController@edit')->name('post.edit')->middleware('auth');
Route::get('/post/{post}', 'PostController@show')->name('post.show')->middleware('auth');
Route::patch('/post/{post}/edit','PostController@update')->name('post.update')->middleware('auth');
Route::delete('/post/{post}/delete', 'PostController@destroy')->name('post.destroy')->middleware('auth');
Route::post('/post/{post}/comment', 'PostCommentController@store')->name('post.comment.store')->middleware('auth');



// dashboardController
Route::get('/dash', 'homeController@index')->name('dashboard')->middleware('auth');

// mitraController
Route::get('/mitra/', 'mitraController@index')->name('mitra')->middleware('auth');
Route::post('/tambah_mitra/','mitraController@create')->name('tambah_mitra')->middleware('auth');
Route::get('/hapus_mitra{id_mitra}/', 'mitraController@destroy')->name('hapus_mitra')->middleware('auth');
Route::get('/edit_mitra{id_mitra}/', 'mitraController@edit')->name('edit_mitra')->middleware('auth');
Route::post('/update_mitra{id_mitra}/','mitraController@update')->name('update_mitra')->middleware('auth');

// cateringController
Route::get('/catering/menu/', 'menucateringController@index')->name('menu_catering')->middleware('auth');
Route::get('/post/create', 'menuCateringController@create')->name('cate.create')->middleware('auth');
Route::POST('/catering/tambah_menu/', 'menucateringController@create')->name('tambah_menu_cate')->middleware('auth');
Route::get('/catering/hapus_menu{id_menu}/', 'menucateringController@destroy')->name('hapus_cate_menu')->middleware('auth');
Route::get('/catering/edit_menu{id_menu}/', 'menucateringController@edit')->name('edit_cate_menu')->middleware('auth');
Route::post('/catering/update_menu{id_menu}/', 'menucateringController@update')->name('update_catering');

// foodexpressController
Route::get('/foodexpress/menu/', 'menufoodexpressController@index')->name('menu_foodexpress')->middleware('auth');
Route::get('/foodexpress/create', 'menufoodexpressController@create')->name('foodexpress.create')->middleware('auth');
Route::POST('/foodexpress/tambah_menu/', 'menufoodexpressController@create')->name('tambah_menu_food')->middleware('auth');
Route::get('/foodexpress/hapus_menu{id_menu}/', 'menufoodexpressController@destroy')->name('hapus_food_menu')->middleware('auth');
Route::get('/foodexpress/edit_menu{id_menu}/', 'menufoodexpressController@edit')->name('edit_food_menu')->middleware('auth');
Route::post('/foodexpress/update_menu{id_menu}/', 'menufoodexpressController@update')->name('update_food');

// groceryController
Route::get('/grocery/menu/', 'groceryController@index')->name('menu_grocery')->middleware('auth');
Route::get('/grocery/create', 'groceryController@create')->name('grocery.create')->middleware('auth');
Route::POST('/grocery/tambah_menu/', 'groceryController@create')->name('tambah_menu_grocery')->middleware('auth');
Route::get('/grocery/hapus_menu{id_menu}/', 'groceryController@destroy')->name('hapus_grocery_menu')->middleware('auth');
Route::get('/grocery/edit_menu{id_menu}/', 'groceryController@edit')->name('edit_grocery_menu')->middleware('auth');
Route::post('/grocery/update_menu{id_menu}/', 'groceryController@update')->name('update_grocery');

//bank
Route::get('/bank/', 'bankController@index')->name('bank')->middleware('auth');
Route::post('/tambah_bank/', 'bankController@create')->name('tambah_bank')->middleware('auth');
Route::get('/hapusbank{kode_bank}/', 'bankController@destroy')->name('hapus_bank')->middleware('auth');
Route::get('/edit_bank{kode_bank}/', 'bankController@edit')->name('edit_bank')->middleware('auth');
Route::post('/update_bank{kode_bank}/', 'bankController@update')->name('update_bank')->middleware('auth');

//admin
Route::get('/akun/', 'akunController@index')->name('akun')->middleware('auth');
Route::post('/tambah_akun/', 'akunController@store')->name('tambah_akun')->middleware('auth');
Route::get('/hapusakun{id}/', 'akunController@destroy')->name('hapus_akun')->middleware('auth');
Route::get('/edit_akun{id}/', 'akunController@edit')->name('edit_akun')->middleware('auth');
Route::post('/update_akun{id}/', 'akunController@update')->name('simpan_foto')->middleware('auth');

// pemesananController
Route::get('/pemesanan/list/', 'pemesananController@index')->name('list_pemesanan')->middleware('auth');
Route::get('/pemesanan/batal_pesan{kode_transaksi}/', 'pemesananController@destroy')->name('batal_pesan')->middleware('auth');
Route::get('/pemesanan/aksi_pesan{kode_transaksi}/', 'pemesananController@edit')->name('aksi_pesan')->middleware('auth');
Route::get('/pemesanan/terima_pesan{kode_transaksi}/', 'pemesananController@update')->name('terima_pesan')->middleware('auth');


// pengirimanController
Route::get('/pengiriman/list/', 'pengirimanController@index')->name('list_pengiriman')->middleware('auth');
Route::get('/pengiriman/batal_kiriman{kode_transaksi}/', 'pengirimanController@destroy')->name('batal_kirim')->middleware('auth');
Route::get('/pengiriman/aksi_kiriman{kode_transaksi}/', 'pengirimanController@edit')->name('aksi_kirim')->middleware('auth');
Route::get('/pengiriman/terima_kiriman{kode_transaksi}/', 'pengirimanController@update')->name('terima_kirim')->middleware('auth');

// historyController
Route::get('/history/list/', 'pengirimanController@history')->name('history')->middleware('auth');
Route::get('/history/detail{kode_transaksi}/', 'pengirimanController@history_detail')->name('history_detail')->middleware('auth');


// customerController
Route::get('/customer/', 'customerController@index')->name('customer')->middleware('auth');