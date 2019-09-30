<?php
	include "../system/proses.php";
	$query=$db->get("*","pelanggan","WHERE kode_pelanggan='$_POST[kode_pelanggan]'");
	$tampil=$query->fetch();
	$hasilnya = array('kode_pelanggan'=>$tampil['kode_pelanggan'],'nama_pelanggan'=>$tampil['nama_pelanggan']);
	echo json_encode($hasilnya);
?>