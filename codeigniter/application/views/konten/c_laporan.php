
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
<style type="text/css">
	.bl{
		text-align: center;
		margin-top: 10px;
	}
</style>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Peminjaman</title>
</head>
<body style="background: #fff;">
	<h2 style="text-align: center;">Laporan Peminjaman</h2>
	<div class="bl">
		<span>Bulan	:	<?php echo $this->uri->segment(3);?></span>
		<span>Tahun	:	<?php echo $this->uri->segment(4);?></span>
	</div>
	<table class="tabel" border="1">
		<tr>
			<th>ID Peminjaman</th>
			<th>Tanggal Pinjam</th>
			<th>Tanggal Kembali</th>
			<th>Nama Pegawai</th>
			<th>Status Pinjam</th>
		</tr>
		<?php
			
		foreach($qu as $tampil){
		?>
		<tr>
			<td><?php echo $tampil->id_peminjaman;?></td> 
			<td><?php echo $tampil->tanggal_pinjam;?></td>
			<td><?php echo $tampil->tanggal_kembali;?></td>
			<td><?php echo $tampil->nama_pegawai;?></td>
			<td><?php echo $tampil->status_peminjaman;?></td>
		</tr>
		<?php
			}
		?>
	</table>
</body>
</html>
<script type="text/javascript">
	window.print();
</script>
