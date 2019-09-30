<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

use App\Petugas;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas['page_titel'] = 'Petugas';
        $petugas['petugas']      = Petugas::orderBy('id', 'asc')->get();

        return view('petugas.index',$petugas);
    }

    // Tambah
    public function create()
    {
        $petugas['page_titel'] = 'Create Petugas';

        return view('petugas.create', $petugas);
    }


    // simpan tambah
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);

        DB::table('users')->insert([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password
    ]);
       
       Session::flash('pesan', 'Data berhasil ditambah');

       return redirect('petugas');
    }

    // tampil edit

    public function edit($id)
    {
        $petugas['page_titel'] = 'Edit Petugas';
        $petugas['petugas']  = Petugas::where('id',$id)->first();

        return view('petugas.edit', $petugas);
    }


    // Simpan Edit
    public function update(Request $request)
    {
        
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);


       DB::table('users')->where('id',$request->id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password
    ]);

       Session::flash('pesan', 'Data berhasil diupdate');

       return redirect('petugas');
    }

    public function delete($id)
    {
       Petugas::where('id', $id)->delete();


        Session::flash('pesan', 'Data berhasil dihapus');

        return redirect('petugas');
    }
}
