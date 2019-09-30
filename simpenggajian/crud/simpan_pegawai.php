<?php
	include"../system/proses.php";
	if(isset($_POST['simpan'])){
		$simpan=$db->insert("pegawai","'$_POST[nip]','$_POST[nama]','$_POST[tempat_lahir]','$_POST[tanggal_lahir]','$_POST[kode_jabatan]','$_POST[kode_golongan]','$_POST[status]','$_POST[jumlah_anak]'");
		if($simpan){
			echo "<script>alert('Data Berhasil Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=pegawai'</script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=pegawai'</script>";
		}
	}else{
		$edit=$db->update("pegawai",
				"nip='$_POST[nip]',
				nama='$_POST[nama]',
				tempat_lahir='$_POST[tempat_lahir]',
				tanggal_lahir='$_POST[tanggal_lahir]',
				kode_jabatan='$_POST[kode_jabatan]',
				kode_golongan='$_POST[kode_golongan]',
				status='$_POST[status]',
				jumlah_anak='$_POST[jumlah_anak]'",
				"nip='$_POST[nip]'");
		if($edit){
			echo "<script>alert('Data Berhasil Diedit')</script>";
			echo "<script>document.location.href='../index.php?p=pegawai'</script>";
		}else{
			echo "<script>alert('Data Gagal Diedit')</script>";
			echo "<script>document.location.href='../index.php?p=pegawai'</script>";
		}
	}
?>