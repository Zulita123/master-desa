<?php
include "../system/proses.php";
	$hapus=$db->delete("oder","nomer_order='$_GET[nomer_order]'");
	if($hapus){
			echo "<script>alert('Berhasil Dihapus')</script>";
			echo "<script>document.location.href='../index.php?p=order'</script>";
		}else{
			echo "<script>alert('Gagal Dihapus')</script>";
			echo "<script>document.location.href='../index.php?p=order'</script>";
		}
?>