<?php
if($status=='edit'){
	$val=$hsl->row_array();
	$nomot=$val['id_pegawai'];
}else{
	$qw=$this->Pegawai_Model->qw("*","pegawai","ORDER BY id_pegawai DESC")->row_array();
	$kode_pegawai=$qw['id_pegawai'];
	$ambil=substr($kode_pegawai,3,3);
	$jml=$ambil + 1;
	if($jml < 10){
		$nomot ="PGW00".$jml;
	}elseif($jml > 9 && $jml <=99){
		$nomot ="PGW0".$jml;
	}else{
		$nomot ="PGW".$jml;
	}
	$val['nip']='';
	$val['nama_pegawai']='';
	$val['alamat']='';
}
?>
<h2>Form Pegawai</h2>
<form action="<?php echo site_url($open);?>" method="POST">
	<table>
		<tr>
			<td><label>ID Pegawai</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="id_pegawai" class="text" value="<?php echo $nomot;?>"><td>
		</tr>
		<tr>
			<td><label>NIP</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="nip" class="text" value="<?php echo $val['nip'];?>"></td>
		</tr>
		<tr>
			<td><label>Nama Pegawai</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="nama_pegawai" class="text" value="<?php echo $val['nama_pegawai'];?>"></td>
		</tr>
		<tr>
			<td><label>Alamat</label></td>
			<td><label>:</label></td>
			<td><textarea class="text" name="alamat"><?php echo $val['alamat'];?></textarea></td>
		</tr>
	</table>
	<input type="submit" name="" value="Simpan" class="btn btn-biru">
	<input type="reset" name="" value="Batal" class="btn btn-merah">
</form>

