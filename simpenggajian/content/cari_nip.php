<?php 
include"../system/proses.php";
$query=$db->get("pegawai.nip,pegawai.nama,pegawai.status,jabatan.nama_jabatan,jabatan.gaji_pokok,jabatan.tj_jabatan,golongan.golongan,golongan.tj_suami_istri,golongan.tj_anak,pegawai.jumlah_anak","pegawai"," INNER JOIN jabatan on jabatan.kode_jabatan=pegawai.kode_jabatan INNER JOIN golongan on golongan.kode_golongan=pegawai.kode_golongan WHERE pegawai.nip='$_POST[nip]'");
$mengambil=$query->fetch();
$hasil = array(
	'nama'			=>	$mengambil['nama'],
	'status'		=>	$mengambil['status'],
	'nama_jabatan'	=>	$mengambil['nama_jabatan'],
	'gaji_pokok'	=>	$mengambil['gaji_pokok'],
	'tj_jabatan'	=>	$mengambil['tj_jabatan'],
	'golongan'		=>	$mengambil['golongan'],
	'tj_suami_istri'=>	$mengambil['tj_suami_istri'],
	'tj_anak'		=>	$mengambil['tj_anak'],
	'jumlah_anak'	=>	$mengambil['jumlah_anak']);
echo json_encode($hasil);
?>