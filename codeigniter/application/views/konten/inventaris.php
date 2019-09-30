<h2>inventaris</h2>
<a href="<?php echo site_url('inventaris_Controller/hello/f_inventaris');?>" class="btn btn-biru">Tambah</a>
<table class="tabel" border="1">
	<tr>
		<th>ID inventaris</th>
		<th>Nama</th>
		<th>Jenis</th>
		<th>Ruang</th>
		<th>Kondisi</th>
		<th>Keterangan</th>
		<th>Jumlah</th>
		<th>Tanggal Register</th>
		<th>Kode Inventaris</th>
		<th>Nama Petugas</th>
		<th>Action</th>
	</tr>
	<?php
		foreach ($tmp_inventaris as $tampil) {
	?>
	<tr>
		<td><?php echo $tampil->id_inventaris;?></td>
		<td><?php echo $tampil->nama;?></td>
		<td><?php echo $tampil->nama_jenis;?></td>
		<td><?php echo $tampil->nama_ruang;?></td>
		<td><?php echo $tampil->kondisi;?></td>
		<td><?php echo $tampil->keterangan;?></td>
		<td><?php echo $tampil->jumlah;?></td>
		<td><?php echo $tampil->tanggal_register;?></td>
		<td><?php echo $tampil->kode_inventaris;?></td>
		<td><?php echo $tampil->nama_petugas;?></td>
		<td>
			<a href="<?php echo site_url('inventaris_Controller/hapus_inventaris');?>/<?php echo $tampil->id_inventaris;?>"><img style="width: 45px; height: 45px;" src="<?php echo base_url();?>assets/gambar/hapus.png"></a>
		</td>
	</tr>
	<?php 
		}
	?>
</table>