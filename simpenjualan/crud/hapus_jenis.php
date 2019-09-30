<?php
include "../system/proses.php";
	$hapus=$db->delete("jenis_barang","id_jenis_brg='$_GET[id_jenis_brg]'");
	if($hapus){
		echo "<script>alert('Berhasil Dihapus')</script>";
		echo "<script>document.location.href='../index.php?p=jenis'</script>";
	}else{
		echo "<script>alert('Gagal Dihapus')</script>";
		echo "<script>document.location.href='../index.php?p=jenis'</script>";
	}
?>