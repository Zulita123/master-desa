<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

use App\Pembeli;
use App\Ongkir;
use App\Pemesanan;
use App\Transaksi;

class PembeliController extends Controller
{
	function KodePembeli(){
        $number = Pembeli::where("created_at","like","%"."%")->count();
        $angka  = $number +1;
        $code   = 'PMB00'.$angka;
        return $code;
    }
    public function index()
    {
    	$pembeli['page_titel'] = 'Pembeli';
    	$pembeli['pembelis'] = Pembeli::orderBy('id_pembeli', 'asc')->get();

    	return view('pembeli.pembeli_index', $pembeli);
    }

    // Tambah
    public function create()
    {
        $pembeli['page_titel'] = 'Create Pembeli';
        $pembeli['kode'] 		= self::KodePembeli();
        $pembeli['data'] 		= Ongkir::all();

        return view('pembeli.pembeli_create', $pembeli);
    }


    // simpan tambah
    public function store(Request $request)
    {

        $this->validate($request,[
            'kode_pembeli'=>'required',
            'nama_pembeli'=>'required',
            'alamat_pembeli'=>'required',
        ]);

        DB::table('pembeli')->insert([
        'kode_pembeli' => $request->kode_pembeli,
        'nama_pembeli' => $request->nama_pembeli,
        'alamat_pembeli' => $request->alamat_pembeli,
    ]);
       
       Session::flash('pesan', 'Data berhasil ditambah');

       return redirect('pembeli');
        
    }

    // tampil edit

    public function edit($id_pembeli)
    {
    	$page_titel = 'Edit Pembeli';
    	$pembeli 	= Pembeli::where('id_pembeli', $id_pembeli)->first();

    	return view('pembeli.pembeli_edit', compact('page_titel', 'pembeli'));
    }


    // Simpan Edit
    public function update(Request $request)
    {
    	
    	 
        $this->validate($request,[
            'kode_pembeli'=>'required',
            'nama_pembeli'=>'required',
            'alamat_pembeli'=>'required',
        ]);


       DB::table('pembeli')->where('id_pembeli',$request->id)->update([
        'kode_pembeli' => $request->kode_pembeli,
        'nama_pembeli' => $request->nama_pembeli,
        'alamat_pembeli' => $request->alamat_pembeli
    ]);

       Session::flash('pesan', 'Data berhasil diupdate');

       return redirect('pembeli');
    }

    public function delete($id)
    {
    	 DB::table('pembeli')->where('id_pembeli',$id)->delete();


        Session::flash('pesan', 'Data berhasil dihapus');

        return redirect('menu');
    }
}
