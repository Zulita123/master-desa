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
			float: right;
			margin: 0px 30px;
		}
		.kotak-struk .tabel3 tr td{
			text-align: right;
			font-family: 'segoe ui';
			line-height: 25px;
			float: left;
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
	<title>STRUK ORDER</title>
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
					$qw1=$db->get("oder.tgl_order,oder.nomer_order,petugas.nama_ptg,petugas.status,oder.tgl_rencana_selesai","oder","INNER JOIN petugas on petugas.kode_ptg=oder.kode_ptg WHERE oder.nomer_order='$_GET[idt]'");
					$qw2=$db->get("pelanggan.nama_pelanggan","oder","INNER JOIN pelanggan on pelanggan.kode_pelanggan=oder.kode_pelanggan WHERE oder.nomer_order='$_GET[idt]'");
					$tmp1=$qw1->fetch();
					$tmp2=$qw2->fetch();
					if($tmp2['nama_pelanggan']==""){
						$plg="(..Bukan Pelanggan..)";
					}else{
						$plg=$tmp2['nama_pelanggan'];
					}
				?>
				<tr>
					<td>Tanggal Order</td>
					<td>:</td>
					<td><?php echo $tmp1['tgl_order'];?></td>
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
					<td>Tanggal Selesai</td>
					<td>:</td>
					<td><?php echo $tmp1['tgl_rencana_selesai'];?></td>
				</tr>
				<tr>
					<td colspan="4">
						=========================
					</td>
				</tr>
			</table>
			<table class="tabel2">
				<tr>
					<td>Jenis Cucian</td>
					<td>Harga</td>
					<td>Berat</td>
				</tr>
				<?php
					$tb=$db->get("jasa.nama_jasa,jasa.harga,oder.berat_cucian,oder.total_harga","oder","INNER JOIN jasa on jasa.kode_jasa=oder.kode_jasa WHERE oder.nomer_order='$_GET[idt]'");
					foreach ($tb as $tamp_oder){
				?>
				<tr>
					<td><?php echo $tamp_oder['nama_jasa'];?></td>
					<td><?php echo "Rp. ". number_format($tamp_oder['harga'],2, ",", ".");?></td>
					<td><?php echo $tamp_oder['berat_cucian'];?></td>
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
					<td>Total</td>
					<td>:</td>
					<td><b><?php echo "Rp. ". number_format($tamp_oder['total_harga'],2, ",", ".");?></td>
				</tr>
			</table>
			<div class="foot">
				<p>Terimakasih Atas Kunjungan Anda</p>
				<p style="font-size: 12px;"><i>"Bawalah Struk Ini Ketika Pengambilan"</i></p>
				<p>--------------------------------------</p>
				<p>Purple L_Aundry</p>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript"> window.print();</script>