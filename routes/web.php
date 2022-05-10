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

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['role:admin']], function()
{
    Route::resource('/user','UserController');
    Route::get('/user/edit{id}', 'UserController@edit');
    Route::get('/user/hapus/{id}','UserController@destroy');

    Route::resource('/barang','BarangController');
    Route::get('/barang/hapus/{id}','BarangController@destroy');
    Route::get('/barang/edit/{id}','BarangController@edit');

    Route::resource('/supplier','SupplierController')->middleware('role:admin');
    Route::get('/supplier/hapus/{id}','SupplierController@destroy');

    Route::resource('/akun','AkunController')->middleware('role:admin');
    Route::get('/akun/hapus/{kode}','AkunController@destroy');
    Route::get('/akun/edit/{id}','AkunController@edit');

    Route::get('/setting', 'SettingController@index')->name('setting.transaksi')->middleware('role:admin');
    Route::post('/setting/simpan','SettingController@simpan');
   
    //Pemesanan
    Route::get('/transaksi', 'PemesananController@index')->name('pemesanan.transaksi');
    Route::post('/sem/store', 'PemesananController@store');
    Route::get('/transaksi/hapus/{kd_brg}','PemesananController@destroy');
    //DetailPesan
    Route::post('/detail/store', 'DetailPesanController@store');
    Route::post('/detail/simpan', 'DetailPesanController@simpan');

    Route::get('/pembelian', 'PembelianController@index')->name('pembelian.transaksi');
    Route::get('/pembelian-beli/{id}', 'PembelianController@edit');
    Route::post('/pembelian/simpan', 'PembelianController@simpan');
    Route::get('/pembelian/{id}', 'PembelianController@pdf')->name('cetak.order_pdf');

    //Retur  
    Route::get('/retur','ReturController@index')->name('retur.transaksi');
    Route::get('/retur-beli/{id}', 'ReturController@edit');
    Route::post('/retur/simpan', 'ReturController@simpan');
  
    //Laporan
    Route::resource( '/laporan' , 'LaporanController'); 
    Route::resource( '/stok' , 'LapStokController'); 
    //laporan cetak
    Route::get('/laporancetak/cetak_pdf', 'LaporanController@cetak_pdf');

});

