<?php
	include "system/proses.php";
?>
<div class="judul-content">
	<h1>Pelanggan</h1>
</div>
<div class="isi-content">
	<a href="index.php?p=f_pelanggan" class="link-tambah">+ Tambah</a>
	<table class="tabel" border="1">
		<tr>
			<th>ID Pelanggan</th>
			<th>Nama Pelanggan</th>
			<th>Alamat</th>
			<th>No Telepon</th>
			<th>Email</th>
			<th>Action</th>
		</tr>
		<?php
			$qw=$db->get("*","pelanggan","ORDER BY id_pelanggan ASC");
			foreach ($qw as $tamp_pelanggan){
		?>
		<tr>
			<td><?php echo $tamp_pelanggan['id_pelanggan'];?></td>
			<td><?php echo $tamp_pelanggan['nama'];?></td>
			<td><?php echo $tamp_pelanggan['alamat'];?></td>
			<td><?php echo $tamp_pelanggan['no_telp'];?></td>
			<td><?php echo $tamp_pelanggan['email'];?></td>
			<td>
				<a href="index.php?p=f_pelanggan&id_pelanggan=<?php echo $tamp_pelanggan['id_pelanggan'];?>"><img src="assets/gambar/edit.png" class="gbr"></a>
				<a href="crud/hapus_pelanggan.php?id_pelanggan=<?php echo $tamp_pelanggan['id_pelanggan'];?>"><img src="assets/gambar/hapus.png" class="gbr"></a>
			</td>
		</tr>
		<?php
			}
		?>
	</table>
</div>