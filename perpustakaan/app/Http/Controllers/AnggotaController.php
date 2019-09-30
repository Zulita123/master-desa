<?php

namespace App\Http\Controllers;

use Request;
use App\AnggotaModel;

class AnggotaController extends Controller
{
	public function KodeAnggota(){
    	$tgl	= date('Y-m-d');
    	$number	= AnggotaModel::where("created_at", "like", "%".$tgl."%")->count();
    	$angka	= $number +1;
    	$code	= 'AGT'.date('ymd').$angka;
    	return $code;
    }
    public function getIndex(){
    	$data['page_titel']	=	'Anggota';
    	$data['data']		= 	AnggotaModel::all();
    	return view('anggota.index',$data);
    }
    public function getAdd(){
    	$data['page_titel']	=	'Tambah Anggota';
    	$data['kode']		=	self::KodeAnggota();
    	return view('anggota.form',$data);
    }
    public function postAdd(){
    	$new				= new AnggotaModel;
    	$new->kode_anggota	= Request::get('kode_anggota');
    	$new->nama 			= Request::get('nama');
    	$new->alamat 		= Request::get('alamat');
    	$new->telp 			= Request::get('telp');
    	$new->jenis_kelamin	= Request::get('jenis_kelamin');

    	$act 				= $new->save();
    	if ($act) {
    		return redirect(config('app.admin_path').'/anggota')->with([
    			'message'=> 'Data berhasil disimpan',
    			'message_type'=>'success'
    		]);
    	}else{
    		return redirect()->back()->with([
    			'message'=> 'Data gagal disimpan',
    			'message_type'=>'warning'
    		]);
    	}
    }
    public function getEdit($id){
        $data['data']       = AnggotaModel::findOrFail($id);
        $data['page_titel'] = 'Edit Anggota';
        $data['id']         = $id;

        return view('anggota.form',$data);
    }
    public function postEdit($id){
        $new                = AnggotaModel::findOrFail($id);
        $new->kode_anggota  = Request::get('kode_anggota');
        $new->nama          = Request::get('nama');
        $new->alamat        = Request::get('alamat');
        $new->telp          = Request::get('telp');
        $new->jenis_kelamin = Request::get('jenis_kelamin');

        $act                = $new->save();
        if ($act) {
            return redirect(config('app.admin_path').'/anggota')->with([
                'message'=> 'Data berhasil diedit',
                'message_type'=>'success'
            ]);
        }else{
            return redirect()->back()->with([
                'message'=> 'Data gagal diedit',
                'message_type'=>'warning'
            ]);
        }
    }
    public function getDelete($id){
        $act                = AnggotaModel::findOrFail($id)->delete();
        if ($act) {
            return redirect()->back()->with([
                'message'=> 'Data berhasil diHapus',
                'message_type'=>'success'
            ]);
        }else{
            return redirect()->back()->with([
                'message'=> 'Data gagal diHapus',
                'message_type'=>'warning'
            ]);
        }
    }
}
