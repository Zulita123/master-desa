<?php
	include "system/proses.php";
?>
<div class="judul-content">
	<h1>Jenis Barang</h1>
</div>
<div class="isi-content">
	<a href="index.php?p=f_jenis" class="link-tambah">+ Tambah</a>
	<table class="tabel" border="1">
		<tr>
			<th>ID Jenis</th>
			<th>Nama Jenis</th>
			<th>Action</th>
		</tr>
		<?php
			$qw=$db->get("*","jenis_barang","ORDER BY id_jenis_brg ASC");
			foreach ($qw as $tamp_jenis){
		?>
		<tr>
			<td><?php echo $tamp_jenis['id_jenis_brg'];?></td>
			<td><?php echo $tamp_jenis['nama_jenis'];?></td>
			<td>
				<a href="index.php?p=f_jenis&id_jenis_brg=<?php echo $tamp_jenis['id_jenis_brg'];?>"><img src="assets/gambar/edit.png" class="gbr"></a>
				<a href="crud/hapus_jenis.php?id_jenis_brg=<?php echo $tamp_jenis['id_jenis_brg'];?>"><img src="assets/gambar/hapus.png" class="gbr"></a>
			</td>
		</tr>
		<?php
			}
		?>
	</table>
</div>