<?php
	include "system/proses.php";
?>
<div class="judul-content">
	<h1>Petugas/User</h1>
</div>
<div class="isi-content">
	<a href="index.php?p=f_user" class="link-tambah">+ Tambah</a>
	<table class="tabel" border="1">
		<tr>
			<th>ID User</th>
			<th>Username</th>
			<th>Password</th>
			<th>Level</th>
			<th>Action</th>
		</tr>
		<?php
			$qw=$db->get("*","user","ORDER BY id_user ASC");
			foreach ($qw as $tamp_user){
		?>
		<tr>
			<td><?php echo $tamp_user['id_user'];?></td>
			<td><?php echo $tamp_user['username'];?></td>
			<td><?php echo $tamp_user['password'];?></td>
			<td><?php echo $tamp_user['level'];?></td>
			<td>
				<a href="index.php?p=f_user&id_user=<?php echo $tamp_user['id_user'];?>"><img src="assets/gambar/edit.png" class="gbr"></a>
				<a href="crud/hapus_user.php?id_user=<?php echo $tamp_user['id_user'];?>"><img src="assets/gambar/hapus.png" class="gbr"></a>
			</td>
		</tr>
		<?php
			}
		?>
	</table>
</div>