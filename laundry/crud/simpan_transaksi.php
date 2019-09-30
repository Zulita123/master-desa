<?php
	include"../system/proses.php";
		$simpan=$db->insert("transaksi","'$_POST[no_transaksi]',
										'$_POST[tgl_transaksi]',
										'$_POST[bayar]',
										'$_POST[kembali]',
										'$_POST[kode_ptg]',
										'$_POST[nomer_order]'");
		$edit=$db->update("oder",
									"status_cucian='$_POST[status_cucian]'",
									"nomer_order='$_POST[nomer_order]'");
		if($simpan && $edit){
			echo "<script>alert('Data Berhasil Disimpan')</script>";
			echo "<script>window.open('../struk/struk_transaksi.php?idt=$_POST[no_transaksi]');</script>";
			echo "<script>document.location.href='../index.php?p=transaksi'</script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=transaksi'</script>";
		}
?>