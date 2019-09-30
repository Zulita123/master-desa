<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Pemesanan;
use App\Pembeli;
use App\Menu;

class LaporanController extends Controller
{
	function postIndex(Request $request){
    	$data['page_titel']  	= 'Laporan';
    	$bulan 					= $request->bulan;
    	$tahun 					= $request->tahun;
		$data['laporan']		= Pemesanan::whereMONTH('tgl_pesan', $bulan)->whereYEAR('tgl_pesan', $tahun)->get();
		return view('laporan.index',$data, compact('bulan','tahun'));
    }
    public function getIndex(){
        $laporan['page_titel']  = 'Laporan';
        $laporan['laporan'] 	= Pemesanan::orderBy('kode_pesan', 'asc')->get();
        
        return view('laporan.index',$laporan);
    }
    public function getCetak($data){
       	$laporan['page_titel']  = 'Cetak Laporan';
        $laporan['laporan']        = Pemesanan::orderBy('kode_pesan', 'asc')->get();

        return view('laporan.form',$data, compact('bulan','tahun'));
    }
    

}
    