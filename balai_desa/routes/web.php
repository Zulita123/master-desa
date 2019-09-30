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

Route::get('/', function () {
    return view('website.index');
});
Route::get('/mastercontrol','HomeController@dashboard');
// profil desa
Route::get('/mastercontrol/sejarah','SejarahController@Index');
Route::get('/mastercontrol/sejarah/edit/{id}','SejarahController@edit');
Route::post('/mastercontrol/upload/proses/{id}','SejarahController@proses');
Route::get('/mastercontrol/sejarah/lihat/{id}', 'SejarahController@lihat');

Route::get('/mastercontrol/artilambang','ArtilambangController@Index');
Route::get('/mastercontrol/artilambang/edit/{id}', 'ArtilambangController@edit');
Route::post('/mastercontrol/upload/proses{id}', 'ArtilambangController@proses');
Route::get('/mastercontrol/artilambang/lihat/{id}', 'ArtilambangController@lihat');

Route::get('/mastercontrol/profilwilayah','ProfilwilayahController@Index');
Route::get('/mastercontrol/profilwilayah/edit/{id}', 'ProfilwilayahController@edit');
Route::post('/mastercontrol/upload/proses/{id}', 'ProfilwilayahController@proses');
Route::get('/mastercontrol/profilwilayah/lihat/{id}', 'ProfilwilayahController@lihat');
// visi misi
Route::get('/mastercontrol/visimisi','VisimisiController@Index');
Route::get('/mastercontrol/visimisi/edit/{id}','VisimisiController@edit');
Route::post('/mastercontrol/upload/proses/{id}','VisimisiController@proses');
Route::get('/mastercontrol/visimisi/lihat/{id}', 'VisimisiController@lihat');

// upload gambar
Route::get('/mastercontrol/pemerintah','PemerintahController@Index');
Route::get('/mastercontrol/pemerintah/edit/{id}','PemerintahController@edit');
Route::post('/mastercontrol/upload/proses/{id}','PemerintahController@proses');
Route::get('/mastercontrol/pemerintah/lihat/{id}', 'PemerintahController@lihat');
Route::get('/mastercontrol/upload','PemerintahController@upload');
Route::post('/mastercontrol/upload/proses','PemerintahController@proses_upload');

Route::get('/mastercontrol/bpd','BadanPDController@Index');
Route::get('/mastercontrol/bpd/edit/{id}','BadanPDController@edit');
Route::post('/mastercontrol/upload/proses/{id}','BadanPDController@proses');
Route::get('/mastercontrol/bpd/lihat/{id}', 'BadanPDController@lihat');


// data wilayah
Route::get('/mastercontrol/datawilayah','WilayahController@Index');

