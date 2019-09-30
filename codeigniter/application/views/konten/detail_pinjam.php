<table class="tabel" border="1">
		<tr>
			<th>ID Peminjaman</th>
			<th>Nama</th>
			<th>Kondisi</th>
			<th>Jumlah Pinjam</th>
			<th>Ruang</th>
			<th>Action</th>
		</tr>
		<?php
		foreach($tmp_peminjaman as $tampil){
		?>
		<tr>
			<td><?php echo $tampil->id_peminjaman;?></td> 
			<td><?php echo $tampil->nama;?></td>
			<td><?php echo $tampil->kondisi;?></td>
			<td><?php echo $tampil->jumlah_pinjam;?></td>
			<td><?php echo $tampil->nama_ruang;?></td>
			<td>
				<a onclick="hapus('<?php echo $tampil->id_detail_pinjam;?>')"><img style="width: 45px; height: 45px;" src="<?php echo base_url();?>assets/gambar/hapus.png"></a>
			</td>
		</tr>
		<?php
			}
		?>
	</table>