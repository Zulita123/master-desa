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




Route::group(['prefix'=>config('app.admin_path')],function()
{
	Route::get('/', function () {
	$data['page_titel']	=  'Dashboard';
	return view('index',$data);
	});

	Route::get('anggota','AnggotaController@getIndex');

	Route::get('anggota/add','AnggotaController@getAdd');

	Route::post('anggota/add','AnggotaController@postAdd');

	Route::get('anggota/edit/{id}','AnggotaController@getEdit');

	Route::post('anggota/edit/{id}','AnggotaController@postEdit');

	Route::get('anggota/delete/{id}','AnggotaController@getDelete');
});