<?php
	include"../system/proses.php";
		$simpan=$db->insert("detail_transaksi","'',
											'$_POST[id_trans]',
											'$_POST[id_brg]',
											'$_POST[jumlah_beli]',
											'$_POST[sub_total]'");
		if($simpan){
			echo "Data Berhasil Disimpan";
		}else{
			echo "Data Gagal Disimpan";
	}
?>