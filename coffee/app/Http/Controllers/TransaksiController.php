<?php

namespace App\Http\Controllers;

use Request;
use App\Transaksi;
use App\Pemesanan;

class TransaksiController extends Controller
{
	function KodeTransaksi(){
        $number = Transaksi::where("created_at","like","%"."%")->count();
        $angka  = $number +1;
        $code   = 'TR00'.$angka;
        return $code;
    }
	public function index()
	{
		$transaksi['page_titel']	= "Form Transaksi";
		$transaksi['kode'] 			= self::KodeTransaksi();
		$transaksi['data']			= Pemesanan::all();

		return view('transaksi.index', $transaksi);
	}
	public function cariPesan(){
        $id = Request::get('id_pesan');
        if ($id=='') {
            $data['val']    = 2;
        }else{
            $isi = Pemesanan::where('kode_pesan','=',$id)->first();
            if (empty($isi)) {
                $data['val']    = 0;
            }else{
                 $data['val']    = 1;
                 $data['data']   = $isi;

            }

        }

        return response($data);

    }
    
}
