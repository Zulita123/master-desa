<?php

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
Route::group(['middleware'=>'auth'], function(){
	Route::get('/keluar', 'LoginController@logout');

	Route::get('/', 'LoginController@Index');

	});

		// Petugas
	Route::get('petugas','PetugasController@index');
	Route::get('petugas/create','PetugasController@create');
	Route::post('petugas/store','PetugasController@store');
	Route::get('petugas/edit/{id}','PetugasController@edit');
	Route::post('petugas/update/{id}','PetugasController@update');
	Route::get('petugas/delete/{id}','PetugasController@delete');


	// Menu
	Route::get('menu','MenuController@index');
	// Tambah Menu
	Route::get('menu/create','MenuController@create');
	// Menyimpan Tambah Menu
	Route::post('menu/store','MenuController@store');
	// Edit Menu
	Route::get('menu/edit/{id_menu}','MenuController@edit');
	// Memperbarui Edit Menu
	Route::post('menu/update/{id}','MenuController@update');
	// Hapus Menu
	Route::get('menu/delete/{id}','MenuController@delete');


	// Ongkir
	Route::get('ongkir','OngkirController@index');
	Route::get('ongkir/create','OngkirController@create');
	Route::post('ongkir/store','OngkirController@store');
	Route::get('ongkir/edit/{id_ongkir}','OngkirController@edit');

	Route::post('ongkir/update/{id}','OngkirController@update');
	Route::get('ongkir/delete/{id}','OngkirController@delete');

	// Pembeli
	Route::get('pembeli','PembeliController@index');
	// Tambah Pembeli
	Route::get('pembeli/create','PembeliController@create');
	// Menyimpan Pembeli
	Route::post('pembeli/store','PembeliController@store');
	// Edit Pembeli
	Route::get('pembeli/edit/{id_pembeli}','PembeliController@edit');
	// Memperbarui Pembeli
	Route::post('pembeli/update/{id}','PembeliController@update');
	// Hapus Pembeli
	Route::get('pembeli/delete/{id}','PembeliController@delete');


	// Transaksi
	Route::get('transaksi','TransaksiController@index');
	Route::get('transaksi/add','TransaksiController@getAdd');
	Route::post('transaksi/add','TransaksiController@postAdd');
	Route::get('transaksi/edit/{id}','TransaksiController@getEdit');
	Route::post('transaksi/edit/{id}','TransaksiController@postEdit');
	Route::get('transaksi/delete/{id}','TransaksiController@getDelete');
	Route::get('cari/pemesanan','TransaksiController@cariPesan');


	// Pemesanan
	Route::get('pemesanan','PemesananController@getIndex');
	Route::get('pemesanan/struk','PemesananController@struk');
	Route::post('pemesanan/store','PemesananController@store');
	Route::get('pemesanan/delete/{id}','PemesananController@delete');
	Route::get('cari/menu','PemesananController@cariMenu');
	Route::get('cari/pembeli','PemesananController@cariPembeli');
	Route::get('cari/ongkir','PemesananController@cariOngkir');


	Route::get('laporan','LaporanController@getIndex');
	Route::post('laporan','LaporanController@postIndex');
	Route::get('laporan/delete/{id}','LaporanController@getDelete');
	Route::get('laporan/cetak/{bulan}/{tahun}','TransaksiController@getCetak');


Auth::routes();

Route::get('/home', 'HomeController@Index')->name('home');
