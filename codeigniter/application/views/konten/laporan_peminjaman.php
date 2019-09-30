<h2>Laporan Peminjaman</h2>
<form action="<?php echo site_url('Laporan_Controller/hello/laporan_peminjaman');?>" method="POST">
	<table>
		<tr>
			<td>
				<select name="bulan" id="bulan" class="text2">
					<option value="01" <?php if($this->input->post('bulan')=="01"){echo "selected";}?>>Januari</option>
					<option value="02" <?php if($this->input->post('bulan')=="02"){echo "selected";}?>>Februari</option>
					<option value="03" <?php if($this->input->post('bulan')=="03"){echo "selected";}?>>Maret</option>
					<option value="04" <?php if($this->input->post('bulan')=="04"){echo "selected";}?>>April</option>
					<option value="05" <?php if($this->input->post('bulan')=="05"){echo "selected";}?>>Mei</option>
					<option value="06" <?php if($this->input->post('bulan')=="06"){echo "selected";}?>>Juni</option>
					<option value="07" <?php if($this->input->post('bulan')=="07"){echo "selected";}?>>Juli</option>
					<option value="08" <?php if($this->input->post('bulan')=="08"){echo "selected";}?>>Agustus</option>
					<option value="09" <?php if($this->input->post('bulan')=="09"){echo "selected";}?>>September</option>
					<option value="10" <?php if($this->input->post('bulan')=="10"){echo "selected";}?>>Oktober</option>
					<option value="11" <?php if($this->input->post('bulan')=="11"){echo "selected";}?>>November</option>
					<option value="12" <?php if($this->input->post('bulan')=="12"){echo "selected";}?>>Desember</option>
				</select>
			</td>
			<td>
				<select name="tahun" id="tahun" class="text2">
					<?php
						$qw=$this->Laporan_Model->qw('*','peminjaman',"GROUP BY year(tanggal_pinjam)")->result();
						foreach ($qw as $tpa) {
							$data	= explode('-',$tpa->tanggal_pinjam);
							$thn	= $data[0];
					?>
					<option <?php if($thn==$this->input->post('tahun')){echo "selected";}?>><?php echo $thn;?></option>
					<?php
						}
					?>
				</select>
			</td>
			<td>
				<input type="submit" name="cari" class="btn btn-merah" value="Cari">
				<input type="button" name="cetak" class="btn btn-biru" value="Cetak" onclick="ctk()">
			</td>
		</tr>
	</table>
	<table class="tabel" border="1">
		<tr>
			<th>ID Peminjaman</th>
			<th>Tanggal Pinjam</th>
			<th>Tanggal Kembali</th>
			<th>Nama Pegawai</th>
			<th>Status Pinjam</th>
		</tr>
		<?php
			
		foreach($qu as $tampil){
		?>
		<tr>
			<td><?php echo $tampil->id_peminjaman;?></td> 
			<td><?php echo $tampil->tanggal_pinjam;?></td>
			<td><?php echo $tampil->tanggal_kembali;?></td>
			<td><?php echo $tampil->nama_pegawai;?></td>
			<td><?php echo $tampil->status_peminjaman;?></td>
		</tr>
		<?php
			}
		?>
	</table>
</form>
<script type="text/javascript">
	function ctk(){
		bulan=$("#bulan").val();
		tahun=$("#tahun").val();
		window.open("<?php echo site_url('Laporan_Controller/c_laporan');?>"+"/"+bulan+"/"+tahun,"_blank");
	}
</script>