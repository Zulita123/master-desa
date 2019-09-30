<?php
include "../system/proses.php";
	$hapus=$db->delete("pegawai","nip='$_GET[nip]'");
	if($hapus){
		echo "<script>alert('Berhasil Dihapus')</script>";
		echo "<script>document.location.href='../index.php?p=pegawai'</script>";
	}else{
		echo "<script>alert('Gagal Dihapus')</script>";
		echo "<script>document.location.href='../index.php?p=pegawai'</script>";
	}
?>