<?php

namespace App\Http\Controllers;

use Request;
use App\Users;
use Hash;

class UsersController extends Controller
{
    public function getIndex(){
    	$data['users']	= Users::all();
    	return view('user',$data);
    }
    public function getAdd(){
    	$data['url']	= url('users/add');
    	$data['judul']	='From Tambah Data User';
    	return view('add-user',$data);
    }
    public function postAdd(){
    	$baru = new Users;
    	$baru->nama = Request::get('nama');
    	$baru->alamat = Request::get('alamat');
    	$baru->telp = Request::get('telp');
    	$baru->password = Hash::make(Request::get('password'));
    	$action = $baru->save();
    	if ($action) {
    		return redirect('/users')
    		->with(['message'=>'Data berhasil disimpan','message_type'=>'success']);
    	}else{
    		return redirect('/users')
    		->with(['message'=>'Data gagal disimpan','message_type'=>'warning']);
    	}
    }
    public function getEdit($id){
    	$data['url']	= url('users/edit');
    	$data['edit']	= Users::find($id);
    	$data['judul']	= 'From Edit data User';
    	return view('add-user',$data);
    }
    public function postEdit(){
    	$id = Request::get('id');
    	$edit = Users::find($id);
    	$edit->nama = Request::get('nama');
    	$edit->alamat = Request::get('alamat');
    	$edit->telp = Request::get('telp');

    	if(Request::get('password')!=''){
    		$edit->password = Hash::make(Request::get('password'));
    	}
    	
    	$action = $edit->save();
    	if ($action) {
    		return redirect('/users')
    		->with(['message'=>'Data berhasil diedit','message_type'=>'success']);
    	}else{
    		return redirect('/users')
    		->with(['message'=>'Data gagal diedit','message_type'=>'warning']);
    	}
    }
    public function getHapus($id){
    	$action	= Users::find($id)->delete();
    	if ($action) {
    		return redirect('/users')
    		->with(['message'=>'Data berhasil dihapus','message_type'=>'success']);
    	}else{
    		return redirect('/users')
    		->with(['message'=>'Data gagal dihapus','message_type'=>'warning']);
    	}
    }
}
