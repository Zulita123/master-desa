<h2>Pegawai</h2>
<a href="<?php echo site_url('Pegawai_Controller/hello/f_pegawai');?>" class="btn btn-biru">Tambah</a>
<table class="tabel" border="1">
	<tr>
		<th>ID Pegawai</th>
		<th>NIP</th>
		<th>Nama Pegawai</th>
		<th>Alamat</th>
		<th>Action</th>
	</tr>
	<?php
		foreach ($tmp_pegawai as $tampil) {
	?>
	<tr>
		<td><?php echo $tampil->id_pegawai;?></td>
		<td><?php echo $tampil->nip;?></td>
		<td><?php echo $tampil->nama_pegawai;?></td>
		<td><?php echo $tampil->alamat;?></td>
		<td>
			<a href="<?php echo site_url('Pegawai_Controller/hello/f_pegawai');?>/<?php echo $tampil->id_pegawai;?>"><img style="width: 45px; height: 45px;" src="<?php echo base_url();?>assets/gambar/edit.png"></a>
			<a href="<?php echo site_url('Pegawai_Controller/hapus_pegawai');?>/<?php echo $tampil->id_pegawai;?>"><img style="width: 45px; height: 45px;" src="<?php echo base_url();?>assets/gambar/hapus.png"></a>
		</td>
	</tr>
	<?php 
		}
	?>
</table>