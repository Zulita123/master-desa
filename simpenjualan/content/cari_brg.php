<?php
	include "../system/proses.php";
	$query=$db->get("*","barang","WHERE id_brg='$_POST[id_brg]'");
	$tampil=$query->fetch();
	$hasilnya = array('id_brg'=>$tampil['id_brg'],'nama_brg'=>$tampil['nama_brg'],'harga'=>$tampil['harga']);
	echo json_encode($hasilnya);
?>