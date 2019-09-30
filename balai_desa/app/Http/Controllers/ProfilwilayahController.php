<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profilwilayah;

class ProfilwilayahController extends Controller
{
    public function Index()
    {
        $data['title'] 	= 'Profil Wilayah Desa';
        $data['data'] = Profilwilayah::orderBy('id','asc')->get();

    	return view('profil.profilwilayah.index',$data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Profil Wilayah';
        $data['data']    = Profilwilayah::findOrFail($id);
        $data['id']  = $id;

        return view('profil.profilwilayah.tambah', $data);
    }

    public function proses(Request $request)
    {
        $this->validate($request,[
            'keterangan'=>'required',
        ]);

        \DB::table('profilwilayah')->where('id',$request->id)->update([
            'keterangan' => $request->keterangan
        ]);

        return redirect('profilwilayah');
    }

    public function lihat($id)
    {
    	$data['title'] = 'Detail Barang';
    	$data['data'] = Profilwilayah::where('id', $id)->first();

    	return view('profil.profilwilayah.lihat', $data);
    }
}
