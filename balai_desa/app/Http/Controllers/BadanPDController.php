<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BPD;

class BadanPDController extends Controller
{
    public function Index()
    {
        $data['title'] 	= 'Badan Permusyawaratan Desa';
        $data['data'] = BPD::orderBy('id','asc')->get();

    	return view('pemerintah.bpd.index',$data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Badan Permusyawaratan Desa';
        $data['data']    = BPD::findOrFail($id);
        $data['id']  = $id;

        return view('pemerintah.bpd.tambah', $data);
    }

    public function proses(Request $request)
    {
        $this->validate($request,[
            'keterangan'=>'required',
        ]);

        \DB::table('bpd')->where('id',$request->id)->update([
            'keterangan' => $request->keterangan
        ]);

        return redirect('bpd');
    }

    public function lihat($id)
    {
    	$data['title'] = 'Preview Badan Permusyawaratan Desa';
    	$data['data'] = BPD::where('id', $id)->first();

    	return view('pemerintah.bpd.lihat', $data);
    }
}
