<!DOCTYPE html>
<html>
<head>
	<title>Print Laporan Pertanggal</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body style="background-color: #fff;">
	<div class="judul-content">
	<h1 style="text-align: center;font-family: segoe ui;">Laporan Pertanggal</h1>
</div>
<div class="isi-content">
	<form action="index.php?p=lap_pertanggal" method="POST">
		<table class="tabel" border="2">
			<tr>
				<th>No</th>
				<th>ID Transakasi</th>
				<th>Nama User</th>
				<th>Harga</th>
				<th>Jumlah Beli</th>
				<th>Total Bayar</th>
			</tr>
			<?php
				include "../system/proses.php";
					$qwe=$db->get("transaksi.id_trans,transaksi.tgl,user.username,transaksi.total,transaksi.diskon","transaksi","INNER JOIN user ON transaksi.id_user=user.id_user WHERE transaksi.tgl>='$_GET[tgl_awal]' and transaksi.tgl<='$_GET[tgl_akhir]'");
				foreach ($qwe as $tampil){
					$totbay=$tampil['total']-$tampil['diskon'];
			?>
			<tr>
				<td><?php echo $tampil['id_trans'];?></td>
				<td><?php echo $tampil['tgl'];?></td>
				<td><?php echo $tampil['username'];?></td>
				<td><?php echo $tampil['total'];?></td>
				<td><?php echo $tampil['diskon'];?></td>
				<td><?php echo $totbay;?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</form>
</div>
</body>
</html>
<script type="text/javascript">window.print();</script>