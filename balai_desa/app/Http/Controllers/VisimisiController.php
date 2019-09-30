<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visimisi;

class VisimisiController extends Controller
{
    public function Index()
    {
        $data['title'] 	= 'Visi & Misi Desa';
        $data['data'] = Visimisi::orderBy('id','asc')->get();

    	return view('pemerintah.visimisi.index',$data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Visi & Misi Desa';
        $data['data']    = Visimisi::findOrFail($id);
        $data['id']  = $id;

        return view('pemerintah.visimisi.tambah', $data);
    }

    public function proses(Request $request)
    {
        $this->validate($request,[
            'keterangan'=>'required',
        ]);

        \DB::table('visimisi')->where('id',$request->id)->update([
            'keterangan' => $request->keterangan
        ]);

        return redirect('visimisi');
    }

    public function lihat($id)
    {
    	$data['title'] = 'Preview Visi & Misi Desa';
    	$data['data'] = Visimisi::where('id', $id)->first();

    	return view('pemerintah.visimisi.lihat', $data);
    }
}
