<?php include "system/proses.php";
	error_reporting(0);
	if(empty($_GET['id_user'])) {
		$host       =   "localhost";
		$user       =   "root";
		$password   =   "";
		$database   =   "penjualan";
		$connect = mysqli_connect($host, $user, $password, $database);
		$query = "SELECT max(id_user) as maxKode FROM user";
		$hasil = mysqli_query($connect,$query);
		$data = mysqli_fetch_array($hasil);
		$kodeUser = $data['maxKode'];
		$noUrut = (int) substr($kodeUser, 3, 3);
		$noUrut++;
		$char = "US";
		$kodeUser = $char . sprintf("%03s", $noUrut);
	$sub='simpan';
	}else{
		$kodeUser=$_GET['id_user'];
		$sub='edit';
	}
	$qw=$db->get("*","user","WHERE id_user='$_GET[id_user]'");
	$tampl=$qw->fetch();
?>
<div class="judul-content">
	<h1>Input Petugas</h1>
</div>
<div class="isi-content">
	<form action="crud/simpan_user.php" method="POST">
		<table>
			<tr>
				<td><label>ID User</label></td>
			</tr>
			<tr>
				<td><input readonly type="text" name="id_user" class="text" value="<?php echo $kodeUser;?>"></td>
			</tr>
			<tr>
				<td><label>Username</label></td>
			</tr>
			<tr>
				<td>
					<input type="text" name="username" class="text" value="<?php echo $tampl['username'];?>">
				</td>
			</tr>
			<tr>
				<td><label>Password</label></td>
			</tr>
			<tr>
				<td><input type="text" name="password" class="text" value="<?php echo $tampl['password'];?>"></td>
			</tr>
			<tr>
				<td><label>Level</label></td>
			</tr>
			<tr>
				<td>
					<select type="text" name="level" class="text" value="<?php echo $tampl['level'];?>">
						<option>Admin</option>
						<option>Kasir</option>
						<option>Manager</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><input type="submit" name="<?php echo $sub;?>" value="Simpan" class="simpan"></td>
			</tr>
		</table>
	</form>
</div>