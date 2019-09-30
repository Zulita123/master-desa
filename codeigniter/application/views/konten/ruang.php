<h2>Ruang</h2>
<a href="<?php echo site_url('Ruang_Controller/hello/f_ruang');?>" class="btn btn-biru">Tambah</a>
<table class="tabel" border="1">
	<tr>
		<th>ID ruang</th>
		<th>Kode Ruang</th>
		<th>Nama Ruang</th>
		<th>Keterangan</th>
		<th>Action</th>
	</tr>
	<?php
		foreach ($tmp_ruang as $tampil) {
	?>
	<tr>
		<td><?php echo $tampil->id_ruang;?></td>
		<td><?php echo $tampil->kode_ruang;?></td>
		<td><?php echo $tampil->nama_ruang;?></td>
		<td><?php echo $tampil->keterangan;?></td>
		<td>
			<a href="<?php echo site_url('Ruang_Controller/hello/f_ruang');?>/<?php echo $tampil->id_ruang;?>"><img style="width: 45px; height: 45px;" src="<?php echo base_url();?>assets/gambar/edit.png"></a>
			<a href="<?php echo site_url('Ruang_Controller/hapus_ruang');?>/<?php echo $tampil->id_ruang;?>"><img style="width: 45px; height: 45px;" src="<?php echo base_url();?>assets/gambar/hapus.png"></a>
		</td>
	</tr>
	<?php 
		}
	?>
</table>