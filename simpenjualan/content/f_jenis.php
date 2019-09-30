<?php include "system/proses.php";
	error_reporting(0);
	if(empty($_GET['id_jenis_brg'])){
		$host       =   "localhost";
		$user       =   "root";
		$password   =   "";
		$database   =   "penjualan";
		$connect = mysqli_connect($host, $user, $password, $database);
		$query = "SELECT max(id_jenis_brg) as maxKode FROM jenis_barang";
		$hasil = mysqli_query($connect,$query);
		$data = mysqli_fetch_array($hasil);
		$kodeJenis = $data['maxKode'];
		$noUrut = (int) substr($kodeJenis, 0, 3);
		$noUrut++;
		$kodeJenis = sprintf("%03s", $noUrut);
	$sub='simpan';
	}else{
		$kodeJenis=$_GET['id_jenis_brg'];
		$sub='edit';
	}
	$qw=$db->get("*","jenis_barang","WHERE id_jenis_brg='$_GET[id_jenis_brg]'");
	$tampl=$qw->fetch();
?>
<div class="judul-content">
	<h1>Input Jenis</h1>
</div>
<div class="isi-content">
	<form action="crud/simpan_jenis.php" method="POST">
		<table>
			<tr>
				<td><label>ID Jenis</label></td>
			</tr>
			<tr>
				<td>
					<input readonly type="text" name="id_jenis_brg" class="text" value="<?php echo $kodeJenis;?>">
				</td>
			</tr>
			<tr>
				<td><label>Nama Jenis</label></td>
			</tr>
			<tr>
				<td>
					<input type="text" name="nama_jenis" class="text" value="<?php echo $tampl['nama_jenis'];?>">
				</td>
			</tr>
			<tr>
				<td><input type="submit" name="<?php echo $sub;?>" value="Simpan" class="simpan"></td>
			</tr>
		</table>
	</form>
</div>