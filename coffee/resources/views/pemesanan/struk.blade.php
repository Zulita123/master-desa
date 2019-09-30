
<style type="text/css">
		.kotak-struk{
			float: left;
			width: 550px;
			height: auto;
		}
		.kotak-struk .head p{
			text-align: center;
		}
		.kotak-struk .head .logo{
			font-weight: bold;
			color: #357ca5;
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
			padding: 10px;
		}
		.kotak-struk .tabel1 tr td{
			font-family: 'segoe ui';
			line-height: 25px;
			font-size: 15px;
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
	<title>STRUK Pemesanan</title>
</head>
<body>
	<div class="kotak-struk">
		<div class="head">
			<p class="logo">Catering Food</p>
			<P class="almt">Jl. Raya Blingoh - Kelet No 17 A</P>
			<p class="notelp">(029)1872536</p>
		</div>
		<div class="isi">
			<table class="tabel1">
				@foreach($data as $p)
				<tr>
					<td>Tanggal Pengambilan</td>
					<td>:</td>
					<td>{{ $p->tgl_ambil }}</td>
				</tr>
				<tr>
					<td>Kode Pemesanan</td>
					<td>:</td>
					<td>{{ $p->kode_pesan }}</td>
				</tr>
				<tr>
					<td>Operator</td>
					<td>:</td>
					<td>admin(Admin)</td>
				</tr>
				<tr>
					<td>Pembeli</td>
					<td>:</td>
					<td>{{ $p->pembeli->nama_pembeli }}</td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td>{{ $p->pembeli->alamat_pembeli }}</td>
				</tr>
				<tr>
					<td colspan="4">
						=========================
					</td>
				</tr>
			</table>
			<table class="tabel2">
				<tr>
					<td><b>Nama Menu</td>
					<td><b>Harga </td>
					<td><b>Jumlah </td>
				</tr>
				<tr>
					<td><b>{{ $p->menu->nama_menu }}</td>
					<td><b>{{ $p->menu->harga_menu }}</td>
					<td><b>{{ $p->jumlah_beli }} </td>
				</tr>
				<tr>
					<td colspan="4">
						=========================
					</td>
				</tr>
			</table>
			<table class="tabel4">
				<tr>
					<td>Total</td>
					<td>:</td>
					<td><b>{{ $p->total_harga}}</td>
				</tr>
				@endforeach
			</table>
			<div class="foot">
				<p>Terimakasih Telah Memesan</p>
				<p style="font-size: 12px;"><i>"Semoga Anda Puas Dengan Layanan Kami"</i></p>
				<p>--------------------------------------</p>
				<p><b>Catering Food</p>
			</div>
		</div>
	</div>
</body>
</html>
