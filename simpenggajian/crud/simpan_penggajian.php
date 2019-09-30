<?php
	include"../system/proses.php";
		$simpan=$db->insert("gaji","'$_POST[no_slip]',
										'$_POST[tanggal]',
										'$_POST[pendapatan]',
										'$_POST[potongan]',
										'$_POST[gaji_bersih]',
										'$_POST[nip]',
										'$_POST[kode_ptg]'");
		if($simpan){
			echo "<script>alert('Data Berhasil Disimpan')</script>";
			echo "<script>window.open('../struk/struk.php?idt=$_POST[no_slip]');</script>";
			echo "<script>document.location.href='../index.php?p=penggajian'</script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=penggajian'</script>";
		}
?>