<?php

namespace App\Http\Controllers;

use Request;
use Session;

use App\Pemesanan;
use App\Ongkir;
use App\Pembeli;
use App\Menu;

class PemesananController extends Controller
{
    function KodePemesanan(){
        $number = Pemesanan::where("created_at","like","%"."%")->count();
        $angka  = $number +1;
        $code   = 'PMS00'.$angka;
        return $code;
    }
    public function cariMenu(){
        $id = Request::get('id_menu');
        if ($id=='') {
            $data['val']    = 2;
        }else{
            $isi = Menu::where('kode_menu','=',$id)->first();
            if (empty($isi)) {
                $data['val']    = 0;
            }else{
                 $data['val']    = 1;
                 $data['data']   = $isi;
            }
        }

        return response($data);
    }
    public function cariPembeli(){
        $id = Request::get('id_pembeli');
        if ($id=='') {
            $data['val']    = 2;
        }else{
            $isi = Pembeli::where('nama_pembeli','=',$id)->first();
            if (empty($isi)) {
                $data['val']    = 0;
            }else{
                 $data['val']    = 1;
                 $data['data']   = $isi;
            }
        }

        return response($data);
    }
    public function cariOngkir(){
        $id = Request::get('id_ongkir');
        if ($id=='') {
            $data['val']    = 2;
        }else{
            $isi = Ongkir::where('nama','=',$id)->first();
            if (empty($isi)) {
                $data['val']    = 0;
            }else{
                 $data['val']    = 1;
                 $data['data']   = $isi;
            }
        }

        return response($data);
    }
    public function getIndex(){
    	$pemesanan['page_titel']	= 'Pemesanan';
    	$pemesanan['data']		    = Pemesanan::orderBy('kode_pesan', 'asc')->get();
    	$pemesanan['kode']			= self::KodePemesanan();

    	return view('pemesanan.index',$pemesanan);
    }

    public function store()
    {
        $new                = new Pemesanan;
        $new->kode_pesan    = Request::get('kode_pesan');
        $new->tgl_pesan      = Request::get('tgl_pesan');
        $new->tgl_ambil        = Request::get('tgl_ambil');
        $new->kode_menu          = Request::get('kode_menu');
        $new->kode_pembeli          = Request::get('kode_pembeli');
        $new->kode_ongkir     = Request::get('kode_ongkir');
        $new->jumlah_beli   = Request::get('jumlah_beli');
        $new->total_harga   = Request::get('total_harga');

        $act                = $new->save();

        if($act){
            return redirect('pemesanan')->with(['message'=>'Data berhasil disimpan','message_type'=>'success']);
        }else{
            return redirect()->back()->with(['message'=>'Gagal menyimpan data','message_type'=>'warning']);
        }
    }
     public function delete($id_pesan)
    {
        $act    = Pemesanan::where('id_pesan', $id_pesan)->delete();

        if($act){
            return redirect('pemesanan')->with(['message'=>'Data berhasil dihapus','message_type'=>'success']);
        }else{
            return redirect()->back()->with(['message'=>'Gagal menghapus data','message_type'=>'warning']);
        }
    }
    public function struk(){
        $pemesanan['data']  = Pemesanan::all();
        return view("pemesanan.struk", $pemesanan);
    }
}
