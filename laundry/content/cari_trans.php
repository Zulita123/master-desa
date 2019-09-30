<?php 
include"../system/proses.php";
$query=$db->get("oder.nomer_order,jasa.nama_jasa,jasa.harga,oder.berat_cucian,oder.total_harga","oder","INNER JOIN jasa on jasa.kode_jasa=oder.kode_jasa WHERE nomer_order='$_POST[nomer_order]'");
$mengambil=$query->fetch();
$query1=$db->get("pelanggan.nama_pelanggan","oder","INNER JOIN pelanggan on pelanggan.kode_pelanggan=oder.kode_pelanggan WHERE nomer_order='$_POST[nomer_order]'");
$mengambil1=$query1->fetch();
if ($mengambil1['nama_pelanggan']=="") {
	$nama_pelanggan="Tidak Diketahui";
} else {
	$nama_pelanggan=$mengambil1['nama_pelanggan'];
}
$hasil = array(
	'nama_pelanggan'=>	$nama_pelanggan,
	'nama_jasa'		=>	$mengambil['nama_jasa'],
	'harga'			=>	$mengambil['harga'],
	'berat_cucian'	=>	$mengambil['berat_cucian'],
	'total_harga'	=>	$mengambil['total_harga']);
echo json_encode($hasil);
?>