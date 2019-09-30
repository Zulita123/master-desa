<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemerintah;

class PemerintahController extends Controller
{
    public function Index()
    {
        $data['title'] 	= 'Pemerintah Desa';
        $data['data'] = Pemerintah::orderBy('id','asc')->get();

    	return view('pemerintah.pemerintah.index',$data);
    }

    public function upload()
    {
        $data['title'] = 'Tambah Pemerintah Desa';
        $data['data'] = Pemerintah::get();
        return view('pemerintah.pemerintah.tambah', $data);
    }

    public function proses_upload(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jabatan' => 'required',
            'file_gambar'=> 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $file = $request->file('file_gambar');

        $nama_file = time()."_".$file->getClientOriginalName();

        $tujuan_upload = 'data_file';

        $file->move($tujuan_upload,$nama_file);

        Pemerintah::create([
            'nama'=> $request->nama,
            'jabatan' => $request->jabatan,
            'file_gambar' => $nama_file,
        ]);

        return redirect('pemerintah');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Pemerintah Desa';
        $data['data']  = Pemerintah::findOrFail($id);
        $data['id']  = $id;

        return view('pemerintah.pemerintah.edit', $data);
    }

    public function proses(Request $request)
    {
        $this->validate($request,[
            'nama'=>'required',
            'jabatan'=>'required',
            'file_gambar'=>'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        \DB::table('pemerintah')->where('id',$request->id)->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            
        ]);

        if($request->file('file_gambar') == "")
    	{
    		$produk->gambar=$produk->gambar;

    	}
    	else
    	{

    	$filename = time()."_".$file->getClientOriginalName();
        $request->file('file_gambar')->move("data_file/", $fileName);
	   	$produk->gambar = $filename;
	   }
    	$produk->save();

        return redirect('pemerintah');
    }

    public function lihat($id)
    {
    	$data['title'] = 'Preview Pemerintah Desa';
    	$data['data'] = Pemerintah::where('id', $id)->first();

    	return view('pemerintah.pemerintah.lihat', $data);
    }
}
