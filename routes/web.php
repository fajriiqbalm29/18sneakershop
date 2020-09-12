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




// admin



Auth::routes();

Route::get('/', 'HomeController@index')->name('beranda');
Route::get('product', 'ProductUserController@tampil')->name('index');
Route::get('product/{id}', 'ProductUserController@tampilcat')->name('bycat');
Route::get('/product-detail/{slug}', 'DetailController@detail')->name('detail');
Route::get('product/checkout/{slug}', 'CheckoutController@checkout')->name('checkout');
Route::post('product/cari','ProductUserController@carinama')->name('carinama');
Route::post('checkout/berhasil', 'CheckoutController@bayar')->name('bayar');
Route::get('history-transaksi', 'HistoryController@history')->name('history');
Route::get('forgot','ForgotController@index')->name('forgot');
Route::get('forgot-password','ForgotController@cekemail')->name('cekemail');
Route::post('new-password','ForgotController@ubahpassword')->name('ubahpassword');



Route::prefix('seller')
    ->middleware(['auth','seller'])
    ->group(function(){
        Route::resource('category','CategoryController');
        Route::resource('product','ProductController');
        Route::resource('transaksi','TransaksiController');
        Route::get('report','ReportController@lihatlaporan')->name('lihatlaporan');
        Route::get('report/harian','ReportController@laporanfilter')->name('laporanhari');
        Route::get('report/{bulan}','ReportController@laporanbulan')->name('laporanbulan');
        Route::get('/','DashboardController@penghasilan')->name('dashboard');
    });
