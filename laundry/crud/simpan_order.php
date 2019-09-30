<?php
	include"../system/proses.php";
	if ($_POST['kode_pelanggan']=="") {
		$kdplg="-";
	}else{
		$kdplg=$_POST['kode_pelanggan'];
	}
	if ($_POST['berat_cucian']=="" || $_POST['kode_jasa']=="") {
		echo "<script>alert('Masih Ada Data Yang Kosong')</script>";
		echo "<script>document.location.href='../index.php?p=order'</script>";
	}else{
		$simpan=$db->insert("oder","'$_POST[nomer_order]',
									'$_POST[tgl_order]',
									'$_POST[tgl_rencana_selesai]',
									'$_POST[berat_cucian]',
									'$_POST[total_harga]',
									'$_POST[status_cucian]',
									'$kdplg',
									'$_POST[kode_ptg]',
									'$_POST[kode_jasa]'");
		if($simpan){
			echo "<script>alert('Berhasil Disimpan')</script>";
			echo "<script>window.open('../struk/struk.php?idt=$_POST[nomer_order]')</script>";
			echo "<script>document.location.href='../index.php?p=order'</script>";
		}else{
			echo "<script>alert('Gagal Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=order'</script>";
		}
	}
?>