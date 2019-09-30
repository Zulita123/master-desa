<?php
	include "../system/proses.php";
	$query=$db->get("*","jasa","WHERE kode_jasa='$_POST[kode_jasa]'");
	$tampil=$query->fetch();
	$hasilnya = array('kode_jasa'=>$tampil['kode_jasa'],'nama_jasa'=>$tampil['nama_jasa'],'harga'=>$tampil['harga']);
	echo json_encode($hasilnya);
?>