<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sejarah;

class SejarahController extends Controller
{
    public function Index()
    {
        $data['title'] 	= 'Sejarah Desa';
        $data['data'] = Sejarah::orderBy('id','asc')->get();

    	return view('profil.sejarah.index',$data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Sejarah Desa';
        $data['data']    = Sejarah::findOrFail($id);
        $data['id']  = $id;

        return view('profil.sejarah.tambah', $data);
    }

    public function proses(Request $request)
    {
        $this->validate($request,[
            'keterangan'=>'required',
        ]);

        \DB::table('sejarah')->where('id',$request->id)->update([
            'keterangan' => $request->keterangan
        ]);

        return redirect('sejarah');
    }

    public function lihat($id)
    {
    	$data['title'] = 'Detail Barang';
    	$data['data'] = Sejarah::where('id', $id)->first();

    	return view('profil.sejarah.lihat', $data);
    }
}
