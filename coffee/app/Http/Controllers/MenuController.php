<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

use App\Menu;
use App\Transaksi;
use App\Pemesanan;

class MenuController extends Controller
{
    function KodeMenu(){
        $number = Menu::where("created_at","like","%"."%")->count();
        $angka  = $number +1;
        $code   = 'MN00'.$angka;
        return $code;
    }
    public function index()
    {
        $menu['page_titel'] = 'Menu';
        $menu['menu']      = Menu::orderBy('id_menu', 'asc')->get();

        return view('menu.menu_index',$menu);
    }

    // Tambah
    public function create()
    {
        $menu['page_titel'] = 'Create Menu';
        $menu['kode']       = self::KodeMenu();

        return view('menu.menu_create', $menu);
    }


    // simpan tambah
    public function store(Request $request)
    {
        $this->validate($request,[
            'kode_menu'=>'required',
            'nama_menu'=>'required',
            'harga_menu'=>'required',
            'keterangan'=>'required',
        ]);

        DB::table('menu')->insert([
        'kode_menu' => $request->kode_menu,
        'nama_menu' => $request->nama_menu,
        'harga_menu' => $request->harga_menu,
        'keterangan' => $request->keterangan
    ]);
       
       Session::flash('pesan', 'Data berhasil ditambah');

       return redirect('menu');
    }

    // tampil edit

    public function edit($id_menu)
    {
        $page_titel = 'Edit Menu';
        $menu  = Menu::where('id_menu',$id_menu)->first();

        return view('menu.menu_edit', compact('page_titel', 'menu'));
    }


    // Simpan Edit
    public function update(Request $request)
    {
        
        $this->validate($request,[
            'kode_menu'=>'required',
            'nama_menu'=>'required',
            'harga_menu'=>'required',
            'keterangan'=>'required',
        ]);


       DB::table('menu')->where('id_menu',$request->id)->update([
        'kode_menu' => $request->kode_menu,
        'nama_menu' => $request->nama_menu,
        'harga_menu' => $request->harga_menu,
        'keterangan' => $request->keterangan
    ]);

       Session::flash('pesan', 'Data berhasil diupdate');

       return redirect('menu');
    }

    public function delete($id)
    {
        DB::table('menu')->where('id_menu',$id)->delete();


        Session::flash('pesan', 'Data berhasil dihapus');

        return redirect('menu');
    }
}
