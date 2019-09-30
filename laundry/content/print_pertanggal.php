<!DOCTYPE html>
<html>
<head>
	<title>Print Laporan Pertanggal</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body style="background-color: #fff;">
	<div class="judul-content">
	<h1 style="text-align: center;font-family: segoe ui;">Laporan Pertanggal</h1>
</div>
<div class="isi-content">
	<form action="index.php?p=laporan_pertgl" method="POST">
		<div class="col-lg-12 grid-margin stretch-card">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No Transaksi</th>
                        <th>No Order</th>
                        <th>Tanggal Transaksi</th>
                        <th>Petugas</th>
                        <th>Jenis Jasa</th>
                        <th>Harga</th>
                        <th>Berat</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
					include "../system/proses.php";
					session_start();
						$qwe=$db->get("transaksi.no_transaksi,oder.nomer_order,transaksi.tgl_transaksi,pelanggan.nama_pelanggan,jasa.nama_jasa,jasa.harga,oder.berat_cucian,oder.total_harga","oder","INNER JOIN transaksi on transaksi.nomer_order=oder.nomer_order INNER JOIN jasa on jasa.kode_jasa=oder.kode_jasa INNER JOIN pelanggan on pelanggan.kode_pelanggan=oder.kode_pelanggan WHERE transaksi.tgl_transaksi>='$_GET[tgl_awal]' and transaksi.tgl_transaksi<='$_GET[tgl_akhir]'");
					$tot=0;
					foreach ($qwe as $tampil){
					$tot=$tot+$tampil['total_harga'];
					?>
					<tr>
						<td><?php echo $tampil['no_transaksi'];?></td>
                        <td><?php echo $tampil['nomer_order'];?></td>
                        <td><?php echo $tampil['tgl_transaksi'];?></td>
                        <td><?php echo $tampil['nama_pelanggan'];?></td>
                        <td><?php echo $tampil['nama_jasa'];?></td>
                        <td><?php echo "Rp. ". number_format($tampil['harga'],2, ",", ".");?></td>
                        <td><?php echo $tampil['berat_cucian'];?></td>
                        <td><?php echo "Rp. ". number_format($tampil['total_harga'],2, ",", ".");?></td>
					</tr>
					<?php
						}
					?>
					<tr>
                      <td></td><td></td><td></td><td></td>
                      <td></td><td></td><td>Jumlah:</td><td><b><?php echo "Rp. ". number_format($tot,2, ",", ".");?></td>
                    </tr>
                </tbody>
            </table>
    	</div>
	</form>
	<div>
	<label style="margin-left: 50px;">Jepara, <?php echo date('d-m-Y');?></label><br>
    <label style="margin-left: 75px;"><?php echo $_SESSION['status']?>,</label><br>
    <img src="../images/gambar/ttd.png" style="width: 150px;margin-left: 45px;"><br>
    <label style="margin-left: 75px;">(<?php echo $_SESSION['login_admin']?>)</label>
</div>
</div>
</body>
</html>