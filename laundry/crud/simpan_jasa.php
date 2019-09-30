<?php
	include"../system/proses.php";
	if(isset($_POST['simpan'])){
		$simpan=$db->insert("jasa","'$_POST[kode_jasa]','$_POST[nama_jasa]','$_POST[harga]','$_POST[keterangan]'");
		if($simpan){
			echo "<script>alert('Data Berhasil Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=jasa'</script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=jasa'</script>";
		}
	}else{
		$edit=$db->update("jasa",
				"kode_jasa='$_POST[kode_jasa]',
				nama_jasa='$_POST[nama_jasa]',
				harga='$_POST[harga]',
				keterangan='$_POST[keterangan]'",
				"kode_jasa='$_POST[kode_jasa]'");
		if($edit){
			echo "<script>alert('Data Berhasil Diedit')</script>";
			echo "<script>document.location.href='../index.php?p=jasa'</script>";
		}else{
			echo "<script>alert('Data Gagal Diedit')</script>";
			echo "<script>document.location.href='../index.php?p=jasa'</script>";
		}
	}
?>