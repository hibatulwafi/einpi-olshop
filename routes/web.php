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

Route::get('/', function() {
    //return redirect(route('login'));
    return redirect(route('ui.home'));
});

Route::get('/ui/home','FrontendController@index')->name('ui.home');
Route::get('/ui/register','FrontendController@register')->name('ui.register');
Route::post('/ui/register','FrontendController@post_register')->name('ui.post.register');
Route::get('/ui/product/detail/{id}','FrontendController@detail')->name('ui.product.detail');
Route::get('/ui/product','FrontendController@product')->name('ui.product');
Route::get('/ui/product/{kategori}','FrontendController@product_kategori')->name('ui.product.kategori');
Route::get('/ui/kategori','FrontendController@kategori')->name('ui.kategori');
Route::get('/ui/tentang','FrontendController@tentang')->name('ui.tentang');

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function(){

    Route::group(['middleware' => ['permission:manajemen pembelian']], function() {
        Route::get('/ui/profile','FrontendController@profile')->name('ui.profile');
        Route::post('/ui/keranjang/post','KeranjangController@create')->name('ui.keranjang.create');
        Route::get('/ui/keranjang','KeranjangController@index')->name('ui.keranjang');
        Route::get('/ui/keranjang/delete/{id}','KeranjangController@delete')->name('ui.keranjang.delete');
        Route::get('/ui/checkout','TransaksiController@checkout')->name('ui.checkout');
        Route::post('/ui/checkout/post','TransaksiController@checkout_post')->name('ui.checkout.post');
        Route::post('/ui/checkout/order','TransaksiController@checkout_order')->name('ui.checkout.order');
        Route::get('/ui/pembayaran','TransaksiController@pembayaran')->name('ui.pembayaran');
        Route::get('/ui/pembayaran/{id}','TransaksiController@pembayaran_detail')->name('ui.pembayaran.detail');
        Route::post('/ui/pembayaran','TransaksiController@pembayaran_post')->name('ui.pembayaran.post');
        Route::get('/ui/dikirim/{id}','TransaksiController@dikirim_detail')->name('ui.dikirim.detail');
        Route::post('/ui/diterima','TransaksiController@diterima')->name('ui.diterima');
        Route::get('/ui/selesai/{id}','TransaksiController@selesai')->name('ui.selesai.detail');
    });


    
    //settings
    Route::group(['middleware' => ['role:admin']], function() {
        Route::resource('setting', 'SettingController');        
    });

    
    
    Route::group(['middleware' => ['permission:manajemen users|manajemen roles']], function() {
        Route::get('/roles/search','RoleController@search')->name('roles.search');
        Route::resource('users', 'UserController');
        Route::resource('roles', 'RoleController');
        // Route::resource('setting', 'SettingController');        
    });

    // Produk
    Route::group(['middleware' => ['permission:manajemen produk']], function() {
        Route::get('/produk/search','ProdukController@search')->name('produk.search');
        Route::get('/produk/pdf','ProdukController@reportPdf')->name('produk.pdf');
        Route::get('/produk/export/', 'ProdukController@export')->name('produk.export');
        Route::post('/produk/import/', 'ProdukController@import')->name('produk.import');
        Route::resource('produk', 'ProdukController');        
    });

    // Kategori
    Route::group(['middleware' => ['permission:manajemen kategori']], function() {         
        Route::resource('kategori', 'KategoriController');         
    });

    // Transaksi
    Route::group(['middleware' => ['permission:manajemen transaksi']], function() {         
        Route::get('/order/baru', 'OrderController@baru')->name('order.baru');   
        Route::get('/order/verifikasi', 'OrderController@verifikasi')->name('order.verifikasi');   
        Route::get('/order/dikirim', 'OrderController@dikirim')->name('order.dikirim');   
        Route::get('/order/selesai', 'OrderController@selesai')->name('order.selesai');   
        Route::get('/order/batal', 'OrderController@batal')->name('order.batal');

        Route::post('/order/inputresi', 'OrderController@inputresi')->name('order.inputresi');   
        Route::post('/order/print', 'OrderController@print')->name('order.print');
        Route::post('/order/diterima', 'OrderController@diterima')->name('order.diterima');   
        Route::post('/order/batalkan', 'OrderController@batalkan')->name('order.batalkan');   

    });
    
    //profile
    Route::resource('/profile', 'ProfileController');

    Route::get('/home', 'HomeController@index')->name('home');
});

