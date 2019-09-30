<?php
	$qw=$this->Inventaris_Model->qw("*","inventaris","ORDER BY id_inventaris DESC")->row_array();
	$kode_inventaris=$qw['id_inventaris'];
	$ambil=substr($kode_inventaris,3,3);
	$jml=$ambil + 1;
	if($jml < 10){
		$nomot ="INV00".$jml;
	}elseif($jml > 9 && $jml <=99){
		$nomot ="INV0".$jml;
	}else{
		$nomot ="INV".$jml;
	}
	$val['nama']='';
	$val['kondisi']='';
	$val['keterangan']='';
	$val['jumlah']='';
	$val['id_jenis']='';
	$val['tanggal_register']='';
	$val['id_ruang']='';
	$val['kode_inventaris']='';
	$val['id_petugas']='';
?>
<h2>Inventaris Barang</h2>
<form action="<?php echo site_url($open);?>" method="POST">
	<table style="float: right;">
		<tr>
			<td><label>Tanggal Registrasi</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="tanggal_register" class="text2" value="<?php echo date('Y-m-d');?>"><td>
		</tr>
		<tr>
			<td><label>Petugas</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="id_petugas" class="text2" value="<?php echo $val['id_petugas'];?>"></td>
		</tr>
	</table>
	<table>
		<tr>
			<td><label>ID Inventaris</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="id_inventaris" class="text2" value="<?php echo $nomot;?>"><td>
		</tr>
		<tr>
			<td><label>Nama Barang</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="nama" class="text2" value="<?php echo $val['nama'];?>"></td>
		</tr>
		<tr>
			<td><label id="id_jenis">Jenis</label></td>
			<td><label>:</label></td>
			<td>
				<select name="id_jenis" class="text2">
					<?php
						foreach ($tmp_jenis as $tampilkan) {
					?>
						<option <?php if($val['id_jenis']==$tampilkan->id_jenis){echo "selected";}?> value="<?php echo $tampilkan->id_jenis;?>"><?php echo $tampilkan->nama_jenis;?></option>
					<?php
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td><label id="id_ruang">Ruang</label></td>
			<td><label>:</label></td>
			 <td>
				<select name="id_ruang" class="text2">
					<?php
						foreach ($tmp_ruang as $tampilkan) {
					?>
						<option <?php if($val['id_ruang']==$tampilkan->id_ruang){echo "selected";}?> value="<?php echo $tampilkan->id_ruang;?>"><?php echo $tampilkan->nama_ruang;?></option>
					<?php
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td><label>Kondisi</label></td>
			<td><label>:</label></td>
			<td>
				<select name="kondisi" class="text2">
					<option>Baik</option>
					<option>Rusak</option>
					<option>Sedang Diperbarui</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><label>Jumlah</label></td>
			<td><label>:</label></td>
			<td><input type="number" name="jumlah" class="text2" value="<?php echo $val['jumlah'];?>"></td>
		</tr>
		<tr>
			<td><label>Kode Inventaris</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="kode_inventaris" class="text2" value="<?php echo $val['kode_inventaris'];?>"></td>
		</tr>
		<tr>
			<td><label>Keterangan</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="keterangan" class="text2" value="<?php echo $val['keterangan'];?>"></td>
		</tr>
	</table>
	<input type="submit" name="" value="Simpan" class="btn btn-biru">
	<input type="reset" name="" value="Batal" class="btn btn-merah">
</form>

