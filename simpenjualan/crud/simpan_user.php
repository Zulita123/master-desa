<?php
	include"../system/proses.php";
	if(isset($_POST['simpan'])){
		$simpan=$db->insert("user",
			"'$_POST[id_user]',
			'$_POST[username]',
			'$_POST[password]',
			'$_POST[level]'");
		if($simpan){
			echo "<script>alert('Data Berhasil Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=user'</script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=user'</script>";
		}
	}else{
		$edit=$db->update("user",
									"id_user='$_POST[id_user]',
									username='$_POST[username]',
									password='$_POST[password]',
									level='$_POST[level]'",
									"id_user='$_POST[id_user]'");
		if($edit){
			echo "<script>alert('Data Berhasil DiEdit')</script>";
			echo "<script>document.location.href='../index.php?p=user'</script>";
		}else{
			echo "<script>alert('Data Gagal DiEdit')</script>";
			echo "<script>document.location.href='../index.php?p=user'</script>";
		}
	}
?>