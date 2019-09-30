<?php
include "../system/proses.php";
	$hapus=$db->delete("barang","id_brg='$_GET[id_brg]'");
	if($hapus){
		echo "<script>alert('Berhasil Dihapus')</script>";
		echo "<script>document.location.href='../index.php?p=barang'</script>";
	}else{
		echo "<script>alert('Gagal Dihapus')</script>";
		echo "<script>document.location.href='../index.php?p=barang'</script>";
	}
?>