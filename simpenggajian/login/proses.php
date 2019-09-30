<?php
	session_start();
	include "../system/proses.php";
	if (isset($_POST['submit'])){
		$nama_ptg =$_POST['nama_ptg'];
		$password_ptg =$_POST['password_ptg'];
		$query = $db->get("*","petugas","WHERE nama_ptg = '$nama_ptg' AND password_ptg = '$password_ptg'");
		$dta = $query->fetch();
		$rows = $query->rowCount();
		if($rows ==0){
			echo "<script>alert('Maaf Username Belum Terdaftar')</script>";
		}else{
			if($password_ptg <> $dta['password_ptg']){
				echo "<script>alert('Maaf Password Salah')</script>";
				echo "<script>document.location = 'index.php'</script>";
			}else{
				echo "<script>alert('Berhasil Login')</script>";
				echo "<script>document.location = '../index.php?p=home'</script>";
				$_SESSION['login_admin'] = $dta['nama_ptg'];
				$_SESSION['login_kode'] = $dta['kode_ptg'];
				$_SESSION['status'] = $dta['status'];
			}
		}	
	}else{

	}
?>