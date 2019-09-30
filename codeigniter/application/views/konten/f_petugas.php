<?php
if($status=='edit'){
	$val=$hsl->row_array();
	$nomot=$val['id_petugas'];
}else{
	$qw=$this->Petugas_Model->qw("*","petugas","ORDER BY id_petugas DESC")->row_array();
	$kode_petugas=$qw['id_petugas'];
	$ambil=substr($kode_petugas,3,3);
	$jml=$ambil + 1;
	if($jml < 10){
		$nomot ="PTG00".$jml;
	}elseif($jml > 9 && $jml <=99){
		$nomot ="PTG0".$jml;
	}else{
		$nomot ="PTG".$jml;
	}
	$val['username']='';
	$val['password']='';
	$val['nama_petugas']='';
	$val['id_level']='';
}
?>
<h2>Form Petugas</h2>
<form action="<?php echo site_url($open);?>" method="POST">
	<table>
		<tr>
			<td><label>ID Petugas</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="id_petugas" class="text" value="<?php echo $nomot;?>"><td>
		</tr>
		<tr>
			<td><label>Username</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="username" class="text" value="<?php echo $val['username'];?>"></td>
		</tr>
		<tr>
			<td><label>Password</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="password" class="text" value="<?php echo $val['password'];?>"></td>
		</tr>
		<tr>
			<td><label>Nama Petugas</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="nama_petugas" class="text" value="<?php echo $val['nama_petugas'];?>"></td>
		</tr>
		<tr>
			<td><label id="id_level">Level</label></td>
			<td><label>:</label></td>
			<td>
				<select name="id_level" class="text">
					<?php
						foreach ($tmp_level as $tampilkan) {
					?>
						<option <?php if($val['id_level']==$tampilkan->id_level){echo "selected";}?> value="<?php echo $tampilkan->id_level;?>"><?php echo $tampilkan->nama_level;?></option>
					<?php
						}
					?>
				</select>
			</td>
		</tr>
	</table>
	<input type="submit" name="" value="Simpan" class="btn btn-biru">
	<input type="reset" name="" value="Batal" class="btn btn-merah">
</form>

