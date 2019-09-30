<?php
	include"../system/proses.php";
		$simpan=$db->insert("transaksi",
			"'$_POST[id_trans]',
			'$_POST[id_pelanggan]',
			'$_POST[id_user]',
			'$_POST[total]',
			'$_POST[diskon]',
			'$_POST[bayar]',
			'$_POST[tgl]'");
		if($simpan){
			echo "<script>alert('Data Berhasil Disimpan')</script>";
			echo "<script>window.open('../struk/struk.php?idt=$_POST[id_trans]')</script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=transaksi'</script>";
		}
?>