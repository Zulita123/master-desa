<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

use App\Ongkir;
use App\Transaksi;

class OngkirController extends Controller
{
   function KodeOngkir(){
        $number = Ongkir::where("created_at","like","%"."%")->count();
        $angka  = $number +1;
        $code   = 'OGK00'.$angka;
        return $code;
    }
    public function index()
    {
        $ongkir ['page_titel'] = 'Ongkir';
        $ongkir ['ongkirs'] = Ongkir::orderBy('id_ongkir', 'asc')->get();

        return view('ongkir.ongkir_index', $ongkir);
    }

    // Tambah
    public function create()
    {
        $ongkir['page_titel'] = 'Create Ongkir';
        $ongkir['kode']       = self::KodeOngkir();

        return view('ongkir.ongkir_create', $ongkir);
    }


    // simpan tambah
    public function store(Request $request)
    {
        $this->validate($request,[
            'kode_ongkir'=>'required',
            'nama'=>'required',
            'harga_ongkir'=>'required',

        ]);

       DB::table('ongkir')->insert([
        'kode_ongkir' => $request->kode_ongkir,
        'nama' => $request->nama,
        'harga_ongkir' => $request->harga_ongkir
    ]);
       
       Session::flash('pesan', 'Data berhasil ditambah');

       return redirect('ongkir');
    }

    // tampil edit

    public function edit($id_ongkir)
    {
        $page_titel = 'Edit Ongkir';
        $ongkir    = Ongkir::where('id_ongkir', $id_ongkir)->first();

        return view('ongkir.ongkir_edit', compact('page_titel', 'ongkir'));
    }


    // Simpan Edit
    public function update(Request $request)
    {
        $this->validate($request,[
            'kode_ongkir'=>'required',
            'nama'=>'required',
            'harga_ongkir'=>'required',
        ]);


       DB::table('ongkir')->where('id_ongkir',$request->id)->update([
        'kode_ongkir' => $request->kode_ongkir,
        'nama' => $request->nama,
        'harga_ongkir' => $request->harga_ongkir
    ]);

       Session::flash('pesan', 'Data berhasil diupdate');

       return redirect('ongkir');
    }

    public function delete($id)
    {
        DB::table('ongkir')->where('id_ongkir',$id)->delete();


        Session::flash('pesan', 'Data berhasil dihapus');

        return redirect('ongkir');
    }
}
