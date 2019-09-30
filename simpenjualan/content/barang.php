<?php
	include "system/proses.php";
?>
<div class="judul-content">
	<h1>Barang</h1>
</div>
<div class="isi-content">
	<a href="index.php?p=f_barang" class="link-tambah">+ Tambah</a>
	<table class="tabel" border="1">
		<tr>
			<th>ID Barang</th>
			<th>Nama Barang</th>
			<th>ID Jenis</th>
			<th>Harga</th>
			<th>Stok</th>
			<th>TGL Expired</th>
			<th>Action</th>
		</tr>
		<?php
			$qw=$db->get("barang.id_brg,barang.nama_brg,jenis_barang.nama_jenis,barang.harga,barang.stok,barang.expired","barang","inner JOIN jenis_barang on barang.id_jenis_brg=jenis_barang.id_jenis_brg ORDER BY barang.id_brg ASC");
			foreach ($qw as $tamp_barang){
		?>
		<tr>
			<td><?php echo $tamp_barang['id_brg'];?></td>
			<td><?php echo $tamp_barang['nama_brg'];?></td>
			<td><?php echo $tamp_barang['nama_jenis'];?></td>
			<td><?php echo $tamp_barang['harga'];?></td>
			<td><?php echo $tamp_barang['stok'];?></td>
			<td><?php echo $tamp_barang['expired'];?></td>
			<td>
				<a href="index.php?p=f_barang&id_brg=<?php echo $tamp_barang['id_brg'];?>"><img src="assets/gambar/edit.png" class="gbr"></a>
				<a href="crud/hapus_barang.php?id_brg=<?php echo $tamp_barang['id_brg'];?>"><img src="assets/gambar/hapus.png" class="gbr"></a>
			</td>
		</tr>
		<?php
			}
		?>
	</table>
</div>