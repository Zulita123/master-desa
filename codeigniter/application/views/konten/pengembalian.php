<h2>Pengembalian</h2>
<form>
<table class="tabel" border="1">
		<tr>
			<th>ID Peminjaman</th>
			<th>Tanggal Pinjam</th>
			<th>Tanggal Kembali</th>
			<th>Nama Pegawai</th>
			<th>Status Pinjam</th>
			<th>Action</th>
		</tr>
		<?php
			$qu=$this->Pengembalian_Model->qw("peminjaman.id_peminjaman,peminjaman.tanggal_pinjam,peminjaman.tanggal_kembali,pegawai.nama_pegawai,peminjaman.status_peminjaman","peminjaman","INNER JOIN pegawai on peminjaman.id_pegawai=pegawai.id_pegawai")->result();
		foreach($qu as $tampil){
		?>
		<tr>
			<td><?php echo $tampil->id_peminjaman;?></td> 
			<td><?php echo $tampil->tanggal_pinjam;?></td>
			<td><?php echo $tampil->tanggal_kembali;?></td>
			<td><?php echo $tampil->nama_pegawai;?></td>
			<td><?php echo $tampil->status_peminjaman;?></td>
			<td>
				<a href="#" class="btn btn-merah">Lihat</a>
				<a href="<?php echo site_url('Pengembalian_Controller/kembalikan')?>/<?php echo $tampil->id_peminjaman?>" class="btn btn-biru">Kembalikan</a>
			</td>
		</tr>
		<?php
			}
		?>
	</table>
</form>