<style type="text/css">
		.kotak-struk{
			float: left;
			width: 350px;
			height: auto;
		}
		.kotak-struk .head p{
			text-align: center;
		}
		.kotak-struk .head .logo{
			font-weight: bold;
			color: #b46bff;
			line-height: 15px;
			font-family: Segoe ui;
			font-size: 25px;
		}
		.kotak-struk .almt,.notelp{
			font-family: 'segoe ui';
			line-height: 15px;
		}
		.kotak-struk .tabel1{
			margin: 0px 30px;
		}
		.kotak-struk .tabel1 tr td{
			font-family: 'segoe ui';
			line-height: 25px;
		}
		.kotak-struk .tabel2{
			margin: 0px 30px;
		}
		.kotak-struk .tabel2 tr td{
			font-family: 'segoe ui';
			line-height: 25px;
		}
		.kotak-struk .tabel3{
			margin: 0px 30px;
		}
		.kotak-struk .tabel3 tr td{
			text-align: left;
			font-family: 'segoe ui';
			line-height: 25px;
		}
		.kotak-struk .tabel4{
			float: right;
			margin: 0px 30px;
		}
		.kotak-struk .tabel4 tr td{
			text-align: right;
			font-family: 'segoe ui';
		}
		.kotak-struk .foot{
			float: left;
			text-align: center;
			line-height: 10px;
			margin: 0px 40px;
			margin-top: 10px;
			font-family: 'segoe ui';
			font-size: 17px;
		}
</style>
<!DOCTYPE html>
<html>
<head>
	<title>STRUK TRANSAKSI</title>
</head>
<body>
	<div class="kotak-struk">
		<div class="head">
			<p class="logo">Puple L_Aundri</p>
			<P class="almt">Jl. Raya Blingoh - Donorojo No 17 A</P>
			<p class="notelp">(029)1872536</p>
		</div>
		<div class="isi">
			<table class="tabel1">
				<?php 
					include "../system/proses.php";
					$qw1=$db->get("transaksi.tgl_transaksi,transaksi.no_transaksi,transaksi.nomer_order,petugas.nama_ptg,petugas.status","transaksi","INNER JOIN petugas on petugas.kode_ptg=transaksi.kode_ptg WHERE transaksi.no_transaksi='$_GET[idt]'");
					$tmp1=$qw1->fetch();

					$qw2=$db->get("pelanggan.nama_pelanggan","oder","INNER JOIN pelanggan on pelanggan.kode_pelanggan=oder.kode_pelanggan WHERE oder.nomer_order='$tmp1[nomer_order]'");
					$tmp2=$qw2->fetch();	

					$qw3=$db->get("oder.total_harga,transaksi.bayar,transaksi.kembali,oder.status_cucian","transaksi","INNER JOIN oder on oder.nomer_order=transaksi.nomer_order WHERE transaksi.no_transaksi='$_GET[idt]'");
					$tmp3=$qw3->fetch();
					if($tmp2['nama_pelanggan']==""){
						$plg="(..Bukan Pelanggan..)";
					}else{
						$plg=$tmp2['nama_pelanggan'];
					}
				?>
				<tr>
					<td>Tanggal Transaksi</td>
					<td>:</td>
					<td><?php echo $tmp1['tgl_transaksi'];?></td>
				</tr>
				<tr>
					<td>No Transaksi</td>
					<td>:</td>
					<td><?php echo $tmp1['no_transaksi'];?></td>
				</tr>
				<tr>
					<td>No Order</td>
					<td>:</td>
					<td><?php echo $tmp1['nomer_order'];?></td>
				</tr>
				<tr>
					<td>Operator</td>
					<td>:</td>
					<td><?php echo $tmp1['nama_ptg'];?>(<?php echo $tmp1['status'];?>)</td>
				</tr>
				<tr>
					<td>Pelanggan</td>
					<td>:</td>
					<td><?php echo $tmp2['nama_pelanggan'];?></td>
				</tr>
				<tr>
					<td colspan="4">
						=========================
					</td>
				</tr>
			</table>
			<table class="tabel2">
				<tr>
					<td><b>Jenis Cucian</td>
					<td><b>Harga</td>
					<td><b>Berat</td>
				</tr>
				<?php
					$qw4=$db->get("jasa.nama_jasa,jasa.harga,oder.berat_cucian","oder","INNER JOIN jasa ON jasa.kode_jasa=oder.kode_jasa WHERE oder.nomer_order='$tmp1[nomer_order]'");
					foreach ($qw4 as $tmp4) {
				?>
				<tr>
					<td><?php echo $tmp4['nama_jasa'];?></td>
					<td><?php echo "Rp. ". number_format($tmp4['harga'],2, ",", ".");?></td>
					<td><?php echo $tmp4['berat_cucian'];?></td>
				</tr>
				<?php
					}
				?>
				<tr>
					<td colspan="4">
						=========================
					</td>
				</tr>
			</table>
			<table class="tabel3">
				<tr>
					<td><b>Total</td>
					<td>:</td>
					<td><?php echo "Rp. ". number_format($tmp3['total_harga'],2, ",", ".");?></td>
				</tr>
				<tr>
					<td><b>Bayar</td>
					<td>:</td>
					<td><?php echo "Rp. ". number_format($tmp3['bayar'],2, ",", ".");?></td>
				</tr>
			</table>
			<table class="tabel4">
				<tr>
					<td colspan="4">
						----------------------------------
					</td>
				</tr>
				<tr>
					<td>Kembali</td>
					<td>:</td>
					<td><b><?php echo "Rp. ". number_format($tmp3['kembali'],2, ",", ".");?></td>
				</tr>
			</table>
			<div class="foot">
				<p>Terimakasih Atas Kunjungan Anda</p>
				<p style="font-size: 12px;"><i>"Semoga Anda Puas Dengan Layanan Kami"</i></p>
				<p>--------------------------------------</p>
				<p><b>Purple L_Aundry</p>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript"> window.print();</script>