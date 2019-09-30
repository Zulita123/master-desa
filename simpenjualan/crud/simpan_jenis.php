<?php
	include"../system/proses.php";
	if(isset($_POST['simpan'])){
		$simpan=$db->insert("jenis_barang","'$_POST[id_jenis_brg]','$_POST[nama_jenis]'");
		if($simpan){
			echo "<script>alert('Data Berhasil Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=jenis'</script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=jenis'</script>";
		}
	}else{
		$edit=$db->update("jenis_barang",
			"id_jenis_brg='$_POST[id_jenis_brg]',
			nama_jenis='$_POST[nama_jenis]'",
			"id_jenis_brg='$_POST[id_jenis_brg]'");
		if($edit){
			echo "<script>alert('Data Berhasil Diedit')</script>";
			echo "<script>document.location.href='../index.php?p=jenis'</script>";
		}else{
			echo "<script>alert('Data Gagal Diedit')</script>";
			echo "<script>document.location.href='../index.php?p=jenis'</script>";
		}
	}
?>