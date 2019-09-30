<style type="text/css">
		.kotak-struk{
			float: left;
			width: 450px;
			height: auto;
		}
		.kotak-struk .head p{
			text-align: center;
		}
		.kotak-struk p .logo{
			font-weight: bold;
			line-height: 15px;
			font-family: Segoe ui;
			font-size: 25px;
		}
		.kotak-struk .almt,.notelp{
			font-family: 'segoe ui';
			line-height: 16px;
		}
		.kotak-struk .tabel1{
			margin: 0px 15px;
		}
		.kotak-struk .tabel1 tr td{
			font-family: 'segoe ui';
			line-height: 25px;
		}
		.kotak-struk .tabel2{
			margin: 0px 15px;
			float: right;
			margin-top: -60px;
		}
		.kotak-struk .tabel2 tr td{
			font-family: 'segoe ui';
			line-height: 25px;
		}
		.kotak-struk .tabel3{
			margin: 0px 15px;
			float: right;
		}
		.kotak-struk .tabel3 tr td{
			text-align: justify-all;
			font-family: 'segoe ui';
			line-height: 25px;	
		}
		.kotak-struk .tabel4{
			float: right;
		}
		.kotak-struk .tabel4 tr td{
			text-align:right;
			font-family: 'segoe ui';
			line-height: 25px;
			padding: 0px 10px;
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
		.kotak-struk .isi .text{
			font-family: segoe ui;
			font-size: 17px;
			text-align: left;
			margin-left: 20px;
		}
</style>
<!DOCTYPE html>
<html>
<head>
	<title>SLIP GAJI</title>
</head>
<body>
	<div class="kotak-struk">
		<div class="head">
			<p class="almt"><b>SLIP GAJI</p>
			<P class="almt"><b>PT . WIKRAMA TEKHNO</P>
		</div>
		<hr>
		<div class="isi">
			<table class="tabel1">
				<?php
					include "../system/proses.php";
					$qw=$db->get("gaji.no_slip,pegawai.nama,jabatan.nama_jabatan,gaji.tanggal,jabatan.gaji_pokok,jabatan.tj_jabatan,golongan.tj_suami_istri,golongan.tj_anak,gaji.pendapatan,gaji.potongan,gaji.gaji_bersih","pegawai","INNER JOIN gaji on gaji.nip=pegawai.nip INNER JOIN jabatan on jabatan.kode_jabatan=pegawai.kode_jabatan INNER JOIN golongan on golongan.kode_golongan=pegawai.kode_golongan WHERE gaji.no_slip='$_GET[idt]'");
					$tampil=$qw->fetch();
				?>
				<tr>
					<td>No Slip</td>
					<td>:</td>
					<td><?php echo $tampil['no_slip'];?></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><?php echo $tampil['nama'];?></td>
				</tr>
			</table>
			<table class="tabel2">
				<tr>
					<td>Periode</td>
					<td>:</td>
					<td><?php echo $tampil['tanggal'];?></td>
				</tr>
				<tr>
					<td>Jabatan</td>
					<td>:</td>
					<td><?php echo $tampil['nama_jabatan'];?></td>
				</tr>
			</table>
			<hr>
			<table class="tabel3">
				<tr><td>Sistem Penggajian Transfer</td></tr>
				<tr>
					<td>Gaji Pokok</td>
					<td>:</td>
					<td><?php echo "Rp. ". number_format($tampil['gaji_pokok'],2, ",", ".");?></td>
				</tr>
				<tr>
					<td>Tunj Jabatan</td>
					<td>:</td>
					<td><?php echo "Rp. ". number_format($tampil['tj_jabatan'],2, ",", ".");?></td>
				</tr>
				<tr>
					<td>Tunj Istri</td>
					<td>:</td>
					<td><?php echo "Rp. ". number_format($tampil['tj_suami_istri'],2, ",", ".");?></td>
				</tr>
				<tr>
					<td>Tunj Anak</td>
					<td>:</td>
					<td><?php echo "Rp. ". number_format($tampil['tj_anak'],2, ",", ".");?></td>
				</tr>
				<tr>
					<td>Gaji Kotor</td>
					<td>:</td>
					<td><?php echo "Rp. ". number_format($tampil['pendapatan'],2, ",", ".");?></td>
				</tr>
				<tr>
					<td>Potongan</td>
					<td>:</td>
					<td><?php echo "Rp. ". number_format($tampil['potongan'],2, ",", ".");?></td>
				</tr>
				<tr>
					<td colspan="4"><hr></td>
				</tr>
				<tr>
					<td>Gaji Bersih</td>
					<td>:</td>
					<td><b><?php echo "Rp. ". number_format($tampil['gaji_bersih'],2, ",", ".");?></td>
				</tr>
			</table>
			<table class="tabel4">
				<tr><td colspan="4">------------------------------------------------------------------</td></tr>
				<th><td>25 Desember 2015</td></th>
				<tr>
					<td style="padding-bottom: 35px;text-align: left;">Disetujui oleh</td><br>
					<td style="padding-bottom: 35px;">Diterima oleh</td>
				</tr>
				<tr>
					<td style="text-align: left;"><u>Joko Agung S</td>
					<td>Ari Wijaya</td>
				</tr>
				<tr>
					<td style="text-align: left;">CEO</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>