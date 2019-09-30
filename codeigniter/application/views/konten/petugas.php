<h2>Petugas</h2>
<a href="<?php echo site_url('Petugas_Controller/hello/f_petugas');?>" class="btn btn-biru">Tambah</a>
<table class="tabel" border="1">
	<tr>
		<th>ID Petugas</th>
		<th>Username</th>
		<th>Password</th>
		<th>Nama Petugas</th>
		<th>Level</th>
		<th>Action</th>
	</tr>
	<?php
		foreach ($tmp_petugas as $tampil) {
	?>
	<tr>
		<td><?php echo $tampil->id_petugas;?></td>
		<td><?php echo $tampil->username;?></td>
		<td><?php echo $tampil->password;?></td>
		<td><?php echo $tampil->nama_petugas;?></td>
		<td><?php echo $tampil->nama_level;?></td>
		<td>
			<a href="<?php echo site_url('Petugas_Controller/hello/f_petugas');?>/<?php echo $tampil->id_petugas;?>"><img style="width: 45px; height: 45px;" src="<?php echo base_url();?>assets/gambar/edit.png"></a>
			<a href="<?php echo site_url('Petugas_Controller/hapus_petugas');?>/<?php echo $tampil->id_petugas;?>"><img style="width: 45px; height: 45px;" src="<?php echo base_url();?>assets/gambar/hapus.png"></a>
		</td>
	</tr>
	<?php 
		}
	?>
</table>