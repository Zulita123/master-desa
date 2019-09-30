<?php
if($status=='edit'){
	$val=$hsl->row_array();
	$nomot=$val['id_jenis'];
}else{
	$qw=$this->Jenis_Model->qw("*","jenis","ORDER BY id_jenis DESC")->row_array();
	$kode_jenis=$qw['id_jenis'];
	$ambil=substr($kode_jenis,3,3);
	$jml=$ambil + 1;
	if($jml < 10){
		$nomot ="JNS00".$jml;
	}elseif($jml > 9 && $jml <=99){
		$nomot ="JNS0".$jml;
	}else{
		$nomot ="JNS".$jml;
	}
	$val['kode_jenis']='';
	$val['nama_jenis']='';
	$val['keterangan']='';
}
?>
<h2>Form Ruang</h2>
<form action="<?php echo site_url($open);?>" method="POST">
	<table>
		<tr>
			<td><label>ID Jenis</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="id_jenis" class="text" value="<?php echo $nomot;?>"><td>
		</tr>
		<tr>
			<td><label>Kode Jenis</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="kode_jenis" class="text" value="<?php echo $val['kode_jenis'];?>"></td>
		</tr>
		<tr>
			<td><label>Nama Jenis</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="nama_jenis" class="text" value="<?php echo $val['nama_jenis'];?>"></td>
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

