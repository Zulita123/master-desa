<?php
	include"../system/proses.php";
	if(isset($_POST['simpan'])){
		$simpan=$db->insert("barang","'$_POST[id_brg]','$_POST[nama_brg]','$_POST[harga]','$_POST[stok]','$_POST[expired]','$_POST[id_jenis_brg]'");
		if($simpan){
			echo "<script>alert('Data Berhasil Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=barang'</script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=barang'</script>";
		}
	}else{
		$edit=$db->update("barang",
									"id_brg='$_POST[id_brg]',
									nama_brg='$_POST[nama_brg]',
									harga='$_POST[harga]',
									stok='$_POST[stok]',
									expired='$_POST[expired]',
									id_jenis_brg='$_POST[id_jenis_brg]'",
									"id_brg='$_POST[id_brg]'");
		if($edit){
			echo "<script>alert('Data Berhasil DiEdit')</script>";
			echo "<script>document.location.href='../index.php?p=barang'</script>";
		}else{
			echo "<script>alert('Data Gagal DiEdit')</script>";
			echo "<script>document.location.href='../index.php?p=barang'</script>";
		}
	}
?>