<?php include "system/proses.php";
	error_reporting(0);
	if(empty($_GET['id_brg'])) {
		$host       =   "localhost";
		$user       =   "root";
		$password   =   "";
		$database   =   "penjualan";
		$connect = mysqli_connect($host, $user, $password, $database);
		$query = "SELECT max(id_brg) as maxKode FROM barang";
		$hasil = mysqli_query($connect,$query);
		$data = mysqli_fetch_array($hasil);
		$kodeBarang = $data['maxKode'];
		$noUrut = (int) substr($kodeBarang, 3, 3);
		$noUrut++;
		$char = "BR";
		$kodeBarang = $char . sprintf("%03s", $noUrut);
	$sub='simpan';
	}else{
		$kodeBarang=$_GET['id_brg'];
		$sub='edit';
	}
	$qw=$db->get("*","barang","WHERE id_brg='$_GET[id_brg]'");
	$tampl=$qw->fetch();
?>
<div class="judul-content">
	<h1>Barang</h1>
</div>
<div class="isi-content">
	<form action="crud/simpan_barang.php" method="POST">
		<table>
			<tr>
				<td><label>ID Barang</label></td>
			</tr>
			<tr>
				<td><input readonly type="text" name="id_brg" class="text" value="<?php echo $kodeBarang;?>"></td>
			</tr>
			<tr>
				<td><label>Nama Barang</label></td>
			</tr>
			<tr>
				<td>
					<input type="text" name="nama_brg" onKeyPress="return goodchars(event,'abcdeABCDE',this)" class="text" value="<?php echo $tampl['nama_brg'];?>">
				</td>
			</tr>
			<tr>
				<td><label>Jenis Barang</label></td>
			</tr>
			<tr>
				<td>
					<select name="id_jenis_brg" class="text">
						<?php
							$qw=$db->get("*","jenis_barang","ORDER BY id_jenis_brg ASC");
							foreach ($qw as $tampil) {
						?>
						<option <?php if($tampl['id_jenis_brg']==$tampil['id_jenis_brg']){echo "selected";}?> value="<?php echo $tampil['id_jenis_brg'];?>">
							<?php echo $tampil['nama_jenis'];?></option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Harga</label></td>
			</tr>
			<tr>
				<td><input type="number" name="harga" class="text" value="<?php echo $tampl['harga'];?>"></td>
			</tr>
			<tr>
				<td><label>Stok</label></td>
			</tr>
			<tr>
				<td><input type="number" name="stok" class="text" value="<?php echo $tampl['stok'];?>"></td>
			</tr>
			<tr>
				<td><label>Expired</label></td>
			</tr>
			<tr>
				<td><input type="date" name="expired" class="text" value="<?php echo $tampl['expired'];?>"></td>
			</tr>
			<tr>
				<td><input type="submit" name="<?php echo $sub;?>" value="Simpan" class="simpan"></td>
			</tr>
		</table>
	</form>
</div>