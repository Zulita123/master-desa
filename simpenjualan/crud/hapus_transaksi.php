<?php
include "../system/proses.php";
	$hapus=$db->delete("transaksi","id_trans='$_GET[id_trans]'");
	if($hapus){
		echo "<script>alert('Berhasil Dihapus')</script>";
		echo "<script>document.location.href='../index.php?p=transaksi'</script>";
	}else{
		echo "<script>alert('Gagal Dihapus')</script>";
		echo "<script>document.location.href='../index.php?p=transaksi'</script>";
	}
?>