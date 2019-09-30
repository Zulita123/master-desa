<?php
session_start();
	if(!isset($_SESSION['login_admin'])){
		header("location:login/index.php");
	}
	$level=$_SESSION['login_id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>SIM Penjualan</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
	<input hidden type="text" name="id_usernya" id="id_usernya" value="<?php echo $level;?>">
	<div class="header">
		<div class="judul">
			<h1>SIM Penjualan</h1>
		</div>
	</div>
	<div class="sidebar">
		<div class="menu">
			<ul>
				<?php
				if($_SESSION['level']=="Admin"){
					$home="";
					$user="";
					$barang="";
					$pelanggan="";
					$jenis="";
					$transaksi="";
					$laporan="";
					$gp="hidden";
				}elseif($_SESSION['level']=="Kasir"){
					$home="";
					$user="hidden";
					$barang="hidden";
					$pelanggan="hidden";
					$jenis="hidden";
					$transaksi="";
					$laporan="hidden";
					$gp="";
				}else{
					$home="";
					$user="hidden";
					$barang="hidden";
					$pelanggan="hidden";
					$jenis="hidden";
					$transaksi="hidden";
					$laporan="";
					$gp="";
				}
				?>
				<li <?php echo $home;?>>
					<a href="index.php?p=home">
					<i class="fa fa-home fa-1x" style="font-size: 25px;margin-left: 5px;margin-right: 5px; margin-top: -5px; color: #fff;"></i>Beranda</a>
				</li>
				<li <?php echo $user;?>>
					<a href="index.php?p=user">
					<i class="fa fa-user fa-1x" 
					style="font-size: 25px;margin-left: 5px;margin-right: 5px; margin-top: -5px; color: #fff;"></i>User</a>
				</li>
				<li <?php echo $barang;?>>
					<a href="index.php?p=barang">
					<i class="fa fa-cart-plus fa-1x" 
					style="font-size: 25px;margin-left: 5px;margin-right: 5px; margin-top: -5px; color: #fff;"></i>Barang</a>
				</li>
				<li <?php echo $pelanggan;?>>
					<a href="index.php?p=pelanggan">
					<i class="fa fa-users fa-1x" 
					style="font-size: 20px;margin-left: 5px;margin-right: 5px; margin-top: -5px; color: #fff;"></i>Pelanggan</a>
				</li>
				<li <?php echo $jenis;?>>
					<a href="index.php?p=jenis">
					<i class="fa fa-list-alt fa-1x" 
					style="font-size: 21px;margin-left: 5px;margin-right: 5px; margin-top: -5px; color: #fff;"></i>Jenis Barang</a>
				</li>
				<li <?php echo $transaksi;?>>
					<a href="index.php?p=transaksi">
					<i class="fa fa-download fa-1x" 
					style="font-size: 21px;margin-left: 5px;margin-right: 5px; margin-top: -5px; color: #fff;"></i>Transaksi</a>
				</li>
				<li <?php echo $laporan;?> id="lpr">
					<a href="#">
					<i class="fa fa-paperclip fa-1x" 
					style="font-size: 23px;margin-left: 5px;margin-right: 5px; margin-top: -5px; color: #fff;"></i>Laporan</a>
				</li>
				<li <?php echo $laporan;?> id="lpr1">
					<a href="index.php?p=lap_pertanggal" style="margin-left: 15px;">Per Tanggal</a>
				</li>
				<li <?php echo $laporan;?> id="lpr2">
					<a href="index.php?p=lap_perbulan" style="margin-left: 15px;">Per Bulan</a>
				</li>
				<li <?php echo $laporan;?> id="lpr3">
					<a href="#" style="margin-left: 15px;">Per Tahun</a>
				</li>
				<li <?php echo $gp;?>>
					<a href="index.php?p=gantipassword">
					<i class="fa fa-pencil fa-1x" 
					style="font-size: 21px;margin-left: 5px;margin-right: 5px; margin-top: -5px; color: #fff;"></i>Ganti Password</a>
				</li>
				<li>
					<a href="login/logout.php">
					<i class="fa fa-power-off fa-1x" 
					style="font-size: 21px;margin-left: 5px;margin-right: 5px; margin-top: -5px; color: #fff;"></i>Logout</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="content">
		<?php
			if(empty($_GET['p'])){
				echo "<script>document.location.href='index.php?p=home'</script>";
			}else{
				$p=$_GET['p'];
				include "content/$p.php";
			}
		?>
	</div>
	<script type="text/javascript" src="assets/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="assets/js/transaksi.js"></script>
</body>
</html>