<?php
include "../system/proses.php";
	$hapus=$db->delete("pelanggan","kode_pelanggan='$_GET[kode_pelanggan]'");
	if($hapus){
		echo "<script>alert('Berhasil Dihapus')</script>";
		echo "<script>document.location.href='../index.php?p=pelanggan'</script>";
	}else{
		echo "<script>alert('Gagal Dihapus')</script>";
		echo "<script>document.location.href='../index.php?p=pelanggan'</script>";
	}
?>