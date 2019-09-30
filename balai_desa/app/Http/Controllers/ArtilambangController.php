<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artilambang;

class ArtilambangController extends Controller
{
    public function Index()
    {
        $data['title'] 	= 'Arti Lambang Desa';
        $data['data'] = Artilambang::orderBy('id','asc')->get();

    	return view('profil.artilambang.index',$data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Arti Lambang Desa';
        $data['data']    = Artilambang::findOrFail($id);
        $data['id']  = $id;

        return view('profil.artilambang.tambah', $data);
    }

    public function proses(Request $request)
    {
        $this->validate($request,[
            'keterangan'=>'required',
        ]);

        \DB::table('artilambang')->where('id',$request->id)->update([
            'keterangan' => $request->keterangan
        ]);

        return redirect('artilambang');
    }

    public function lihat($id)
    {
    	$data['title'] = 'Detail Barang';
    	$data['data'] = Artilambang::where('id', $id)->first();

    	return view('profil.artilambang.lihat', $data);
    }
}
