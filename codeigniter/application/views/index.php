<!DOCTYPE html>
<html>
<head>
	<title>Belajar CI</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
</head>
<body>
	<div class="header">
		<h2>Inventory System</h2>
	</div>
	<div class="kotak-kiri">
		<ul>
			<li><a href="<?php echo site_url('Belajar_Controller/hello/dashboard');?>">Dashboard</a></li>
			<li><a href="<?php echo site_url('Pegawai_Controller/hello/pegawai');?>">Pegawai</a></li>
			<li><a href="<?php echo site_url('Petugas_Controller/hello/petugas');?>">Petugas</a></li>
			<li><a href="<?php echo site_url('Jenis_Controller/hello/jenis');?>">Jenis</a></li>
			<li><a href="<?php echo site_url('Ruang_Controller/hello/ruang');?>">Ruang</a></li>
			<li><a href="<?php echo site_url('Inventaris_Controller/hello/inventaris');?>">Inventaris</a></li>
			<li><a href="<?php echo site_url('Peminjaman_Controller/hello/peminjaman');?>">Peminjaman</a></li>
			<li><a href="<?php echo site_url('Pengembalian_Controller/hello/pengembalian');?>">Pengembalian</a></li>
			<li><a href="<?php echo site_url('Laporan_Controller/hello/laporan_peminjaman');?>">Laporan</a></li>
		</ul>
	</div>
	<div class="konten">
		<?php include "konten/".$page.".php";?>
	</div>
	<div class="footer">
		copyright&copy2019
	</div>
</body>
</html>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.11.3.min.js"></script>