<?php
if($status=='edit'){
	$val=$hsl->row_array();
	$nomot=$val['id_ruang'];
}else{
	$qw=$this->Ruang_Model->qw("*","ruang","ORDER BY id_ruang DESC")->row_array();
	$kode_ruang=$qw['id_ruang'];
	$ambil=substr($kode_ruang,3,3);
	$jml=$ambil + 1;
	if($jml < 10){
		$nomot ="RNG00".$jml;
	}elseif($jml > 9 && $jml <=99){
		$nomot ="RNG0".$jml;
	}else{
		$nomot ="RNG".$jml;
	}
	$val['kode_ruang']='';
	$val['nama_ruang']='';
	$val['keterangan']='';
}
?>
<h2>Form Ruang</h2>
<form action="<?php echo site_url($open);?>" method="POST">
	<table>
		<tr>
			<td><label>ID Ruang</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="id_ruang" class="text" value="<?php echo $nomot;?>"><td>
		</tr>
		<tr>
			<td><label>Kode Ruang</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="kode_ruang" class="text" value="<?php echo $val['kode_ruang'];?>"></td>
		</tr>
		<tr>
			<td><label>Nama Ruang</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="nama_ruang" class="text" value="<?php echo $val['nama_ruang'];?>"></td>
		</tr>
		<tr>
			<td><label>Keterangan</label></td>
			<td><label>:</label></td>
			<td><textarea class="text" name="keterangan"><?php echo $val['keterangan'];?></textarea></td>
		</tr>
	</table>
	<input type="submit" name="" value="Simpan" class="btn btn-biru">
	<input type="reset" name="" value="Batal" class="btn btn-merah">
</form>

