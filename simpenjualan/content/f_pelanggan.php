<?php include "system/proses.php";
	error_reporting(0);
	if(empty($_GET['id_pelanggan'])){
		$host       =   "localhost";
		$user       =   "root";
		$password   =   "";
		$database   =   "penjualan";
		$connect = mysqli_connect($host, $user, $password, $database);
		$query = "SELECT max(id_pelanggan) as maxKode FROM pelanggan";
		$hasil = mysqli_query($connect,$query);
		$data = mysqli_fetch_array($hasil);
		$kodePelanggan = $data['maxKode'];
		$noUrut = (int) substr($kodePelanggan, 3, 3);
		$noUrut++;
		$char = "PLG";
		$kodePelanggan = $char . sprintf("%03s", $noUrut);
	$sub='simpan';
	}else{
		$kodePelanggan=$_GET['id_pelanggan'];
		$sub='edit';
	}
	$qw=$db->get("*","pelanggan","WHERE id_pelanggan='$_GET[id_pelanggan]'");
	$tampl=$qw->fetch();
?>
<div class="judul-content">
	<h1>Input Pelanggan</h1>
</div>
<div class="isi-content">
	<form action="crud/simpan_pelanggan.php" method="POST">
		<table>
			<tr>
				<td><label>ID Pelanggan</label></td>
			</tr>
			<tr>
				<td>
					<input readonly type="text" name="id_pelanggan" class="text" value="<?php echo $kodePelanggan;?>">
				</td>
			</tr>
			<tr>
				<td><label>Nama Pelanggan</label></td>
			</tr>
			<tr>
				<td>
					<input type="text" name="nama" class="text" value="<?php echo $tampl['nama'];?>">
				</td>
			</tr>
			<tr>
				<td><label>Alamat</label></td>
			</tr>
			<tr>
				<td><input type="text" name="alamat" class="text" value="<?php echo $tampl['alamat'];?>"></td>
			</tr>
			<tr>
				<td><label>No Telepon</label></td>
			</tr>
			<tr>
				<td><input type="number" name="no_telp" class="text" value="<?php echo $tampl['no_telp'];?>"></td>
			</tr>
			<tr>
				<td><label>Email</label></td>
			</tr>
			<tr>
				<td><input type="email" name="email" class="text" value="<?php echo $tampl['email'];?>"></td>
			</tr>
			<tr>
				<td><input type="submit" name="<?php echo $sub;?>" value="Simpan" class="simpan"></td>
			</tr>
		</table>
	</form>
</div>