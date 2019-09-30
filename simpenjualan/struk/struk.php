<style type="text/css">
		.kotak-struk{
			float: left;
			width: 380px;
			height: auto;
		}
		.kotak-struk .head p{
			text-align: center;
		}
		.kotak-struk .head .logo{
			font-weight: bold;
		}
		.kotak-struk .head .logo,.almt,.notelp{
			font-family: 'tahoma';
			line-height: 15px;
		}
		.kotak-struk .tabel1{
			margin: 0px 30px;
		}
		.kotak-struk .tabel1 tr td{
			font-family: 'tahoma';
			line-height: 25px;
		}
		.kotak-struk .tabel2{
			margin: 0px 30px;
		}
		.kotak-struk .tabel2 tr td{
			font-family: 'tahoma';
			line-height: 25px;
		}
		.kotak-struk .tabel3{
			float: right;
			margin: 0px 30px;
		}
		.kotak-struk .tabel3 tr td{
			text-align: right;
			font-family: 'tahoma';
			line-height: 25px;
		}
		.kotak-struk .tabel4{
			float: right;
			margin: 0px 30px;
		}
		.kotak-struk .tabel4 tr td{
			text-align: right;
			font-family: 'tahoma';
		}
		.kotak-struk .foot{
			float: left;
			text-align: center;
			line-height: 10px;
			margin: 0px 40px;
			margin-top: 10px;
			font-family: 'tahoma';
		}
</style>
<?php 
	include "../system/proses.php";
	$qw1=$db->get("transaksi.tgl,transaksi.id_trans,user.username,user.level","transaksi","INNER JOIN user on user.id_user=transaksi.id_user WHERE transaksi.id_trans='$_GET[idt]'");
	$qw2=$db->get("pelanggan.nama","transaksi","INNER JOIN pelanggan on pelanggan.id_pelanggan=transaksi.id_pelanggan WHERE transaksi.id_trans='$_GET[idt]'");
	$tmp1=$qw1->fetch();
	$tmp2=$qw2->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="kotak-struk">
		<div class="head">
			<p class="logo">TOKO AMAN SEJAHTERA JAYA ABADI SELAMANYA SEPANJANG MASA</p>
			<P class="almt">Jl. Raya Bangsri - Kelet No 17 A</P>
			<p class="notelp">(029)1872536</p>
		</div>
		<div class="isi">
			<table class="tabel1">
				<tr>
					<td>Tanggal</td>
					<td>:</td>
					<td><?php echo $tmp1['tgl'];?></td>
				</tr>
				<tr>
					<td>Transaksi</td>
					<td>:</td>
					<td><?php echo $tmp1['id_trans'];?></td>
				</tr>
				<tr>
					<td>Operator</td>
					<td>:</td>
					<td><?php echo $tmp1['username'];?>(<?php echo $tmp1['level'];?>)</td>
				</tr>
				<tr>
					<td>Pelanggan</td>
					<td>:</td>
					<td><?php echo $tmp2['nama'];?></td>
				</tr>
				<tr>
					<td colspan="4">
						===========================
					</td>
				</tr>
			</table>
			<table class="tabel2">
				<?php
					$tb=$db->get("barang.nama_brg,barang.harga,detail_transaksi.jumlah_beli,detail_transaksi.sub_total","detail_transaksi","INNER JOIN barang on barang.id_brg=detail_transaksi.id_brg WHERE detail_transaksi.id_trans='$_GET[idt]'");
					foreach ($tb as $tamp_trans){
				?>
				<tr>
					<td><?php echo $tamp_trans['nama_brg'];?></td>
					<td><?php echo $tamp_trans['harga'];?></td>
					<td><?php echo $tamp_trans['jumlah_beli'];?></td>
					<td><?php echo $tamp_trans['sub_total'];?></td>
				</tr>
				<?php
					}
				?>
				<tr>
					<td colspan="4">
						===========================
					</td>
				</tr>
			</table>
			<table class="tabel3">
				<?php
					$qwe=$db->get("transaksi.total,transaksi.diskon,transaksi.bayar","transaksi","WHERE transaksi.id_trans='$_GET[idt]'");
					$tr=$qwe->fetch();
					$gt=$tr['total']-$tr['diskon'];
					$km=$tr['bayar']-$gt;
				?>
				<tr>
					<td>Total</td>
					<td>:</td>
					<td><?php echo $tr['total'];?></td>
				</tr>
				<tr>
					<td>Diskon</td>
					<td>:</td>
					<td><?php echo $tr['diskon'];?></td>
				</tr>
				<tr>
					<td style="font-weight:bold;">Grand Total</td>
					<td>:</td>
					<td><?php echo $gt;?></td>
				</tr>
				<tr>
					<td>Tunai</td>
					<td>:</td>
					<td><?php echo $tr['bayar'];?></td>
				</tr>
				<tr>
					<td colspan="4">
					------------------------------</td>
				</tr>
			</table>
			<table class="tabel4">
				<tr>
					<td>Kembali</td>
					<td>:</td>
					<td><?php echo $km;?></td>
				</tr>
			</table>
			<div class="foot">
				<p>Terimakasih Atas Kunjungan Anda</p>
				<p>Semoga Anda Puas Dengan Layanan Kami</p>
				<p>------------------------------------</p>
				<p>"Pembeli Adalah Raja"</p>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">window.print();</script>