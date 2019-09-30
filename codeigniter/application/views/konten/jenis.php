<h2>Jenis</h2>
<a href="<?php echo site_url('Jenis_Controller/hello/f_jenis');?>" class="btn btn-biru">Tambah</a>
<table class="tabel" border="1">
	<tr>
		<th>ID Jenis</th>
		<th>Kode Jenis</th>
		<th>Nama Jenis</th>
		<th>Keterangan</th>
		<th>Action</th>
	</tr>
	<?php
		foreach ($tmp_jenis as $tampil) {
	?>
	<tr>
		<td><?php echo $tampil->id_jenis;?></td>
		<td><?php echo $tampil->kode_jenis;?></td>
		<td><?php echo $tampil->nama_jenis;?></td>
		<td><?php echo $tampil->keterangan;?></td>
		<td>
			<a href="<?php echo site_url('Jenis_Controller/hello/f_jenis');?>/<?php echo $tampil->id_jenis;?>"><img style="width: 45px; height: 45px;" src="<?php echo base_url();?>assets/gambar/edit.png"></a>
			<a href="<?php echo site_url('Jenis_Controller/hapus_jenis');?>/<?php echo $tampil->id_jenis;?>"><img style="width: 45px; height: 45px;" src="<?php echo base_url();?>assets/gambar/hapus.png"></a>
		</td>
	</tr>
	<?php 
		}
	?>
</table>