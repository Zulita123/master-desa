<?php
include "../system/proses.php";
	$hapus=$db->delete("petugas","kode_ptg='$_GET[kode_ptg]'");
	if($hapus){
		echo "<script>alert('Berhasil Dihapus')</script>";
		echo "<script>document.location.href='../index.php?p=petugas'</script>";
	}else{
		echo "<script>alert('Gagal Dihapus')</script>";
		echo "<script>document.location.href='../index.php?p=petugas'</script>";
	}
?>