<?php include "system/proses.php";
	error_reporting(0);
	if(empty($_GET['id_trans'])) {
		$host       =   "localhost";
		$user       =   "root";
		$password   =   "";
		$database   =   "penjualan";
		$connect = mysqli_connect($host, $user, $password, $database);
		$query = "SELECT max(id_trans) as maxKode FROM transaksi";
		$hasil = mysqli_query($connect,$query);
		$data = mysqli_fetch_array($hasil);
		$kodeTrans = $data['maxKode'];
		$noUrut = (int) substr($kodeTrans, 3, 3);
		$noUrut++;
		$char = "TR";
		$kodeTrans = $char . sprintf("%03s", $noUrut);
	$sub='simpan';
	}else{
		$kodeTrans=$_GET['id_trans'];
		$sub='edit';
	}
	$qw=$db->get("*","transaksi","WHERE id_trans='$_GET[id_trans]'");
	$tampl=$qw->fetch();
	$user=$_SESSION['login_id'];
?>
<body onload="buka_tab()">
<div class="judul-content">
	<h1>Transaksi</h1>
</div>
<div class="isi-content">
	<form action="crud/simpan_trans.php" method="POST">
		<table class="tabel2">
			<tr><td><label>ID User</label></td></tr>
			<tr><td><input readonly type="text" id="id_user" name="id_user" class="text" value="<?php echo $user;?>"></td></tr>
			<tr>
				<td><label>ID Transaksi</label></td>
				<td><label>Tanggal Transaksi</label></td>
			</tr>
			<tr>
				<td><input readonly type="text" id="id_trans" name="id_trans" class="texx" value="<?php echo $kodeTrans;?>"></td>
				<td><input readonly type="text" id="tgl" name="tgl" class="texx" value="<?php echo date('Y-m-d');?>"></td>
			</tr>
			<tr>
				<td><label>Pelanggan</label></td>
				<td><label id="id_plg">ID Pelanggan</label></td>
				<td><label id="nama_plg">Nama Pelanggan</label></td>
			</tr>
			<tr>
				<td><select class="texx" id="plg" onchange="plgn()">
					<option>--Pilih--</option>
					<option id="Pelanggan">Pelanggan</option>
					<option id="bknpel">Bukan Pelanggan</option>
				</select></td>
				<td><input type="text" id="id_pelanggan" name="id_pelanggan" class="texx" onkeyup="idp()"></td>
				<td><input readonly type="text" id="nama" name="nama" class="texx"></td>
			</tr>			
			<tr>
				<td><label>ID Barang</label></td>
				<td><label>Nama Barang</label></td>
				<td><label>Harga</label></td>
				<td><label>Jumlah Beli</label></td>
				<td><label>Total</label></td>
			</tr>
			<tr>
				<td><input type="text" id="id_brg" name="id_brg" class="texx" onkeyup="idb()"></td>
				<td><input readonly type="text" id="nama_brg" name="nama_brg" class="texx"></td>
				<td><input readonly type="text" id="harga" name="harga" class="texx"></td>
				<td><input type="text" id="jumlah_beli" name="jumlah_beli" class="texx" onkeyup="tot()"></td>
				<td><input readonly type="text" id="sub_total" name="sub_total" class="texx"></td>
				<td><input type="button" id="tambah" value="+" class="simpan" onclick="simpan_detail()"></td>
			</tr>
		</table>
		<div id="kotak-detail"></div>
		<table class="tabel2">
			<tr>
				<td><label>Sub Total</label></td>
				<td><label>Diskon</label></td>
				<td><label>Total Bayar</label></td>	
				<td><label>Bayar</label></td>
				<td><label>Kembali</label></td>
			</tr>
			<tr>
				<td><input type="text" id="total" name="total" class="texx"></td>
				<td><input type="text" id="diskon" name="diskon" class="texx"></td>
				<td><input type="text" id="total_bayar" name="total_bayar" class="texx"></td>
				<td><input type="text" id="bayar" name="bayar" class="texx" onkeyup="kembalian()"></td>
				<td><input type="text" id="kembali" name="kembali" class="texx"></td>
			</tr>
			<tr><center>
				<td><input type="submit" value="Transaksi" class="batal"></td>
			</center></tr>
		</table>
	</form>
</div>
</body>