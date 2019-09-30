<?php
	include"../system/proses.php";
	if(isset($_POST['simpan'])){
		$simpan=$db->insert("petugas","'$_POST[kode_ptg]','$_POST[nama_ptg]','$_POST[password_ptg]','$_POST[status]'");
		if($simpan){
			echo "<script>alert('Data Berhasil Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=petugas'</script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=petugas'</script>";
		}
	}else{
		$edit=$db->update("petugas",
				"kode_ptg='$_POST[kode_ptg]',
				nama_ptg='$_POST[nama_ptg]',
				password_ptg='$_POST[password_ptg]',
				status='$_POST[status]'",
				"kode_ptg='$_POST[kode_ptg]'");
		if($edit){
			echo "<script>alert('Data Berhasil Diedit')</script>";
			echo "<script>document.location.href='../index.php?p=petugas'</script>";
		}else{
			echo "<script>alert('Data Gagal Diedit')</script>";
			echo "<script>document.location.href='../index.php?p=petugas'</script>";
		}
	}
?>