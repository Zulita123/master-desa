<div class="judul-content">
	<h1>Laporan Per Tanggal</h1>
</div>
<div class="isi-content">
	<form action="index.php?p=lap_pertanggal" method="POST">
		<table class="tabel1">
			<tr>
				<td><label>Dari</label></td>
				<td></td>
				<td><label>Sampai</label></td>
			</tr>
			<tr>
				<td><input type="date" name="tgl_awal" id="tgl_awal" class="texx" value="<?php echo $_POST['tgl_awal'];?>"></td>
				<td><label style="margin:15px; ">s/d</label></td>
				<td><input type="date" name="tgl_akhir" id="tgl_akhir" class="texx" value="<?php echo $_POST['tgl_akhir'];?>"></td>
				<td>
					<input type="submit" name="cari" value="Cari" class="btn-merah">
				</td>
				<td>
					<input type="button" name="cari" class="btn-hijau" value="Cetak" onclick="cetak()">
				</td>
			</tr>
		</table>
		<table class="tabel" border="1">
			<tr>
				<th>No</th>
				<th>ID Transakasi</th>
				<th>Nama User</th>
				<th>Harga</th>
				<th>Jumlah Beli</th>
				<th>Total Bayar</th>
			</tr>
			<?php
				include "system/proses.php";
				if(isset($_POST['cari'])){
					$tglawal=$_POST['tgl_awal'];
					$tglakhir=$_POST['tgl_akhir'];
					$qwe=$db->get("transaksi.id_trans,transaksi.tgl,user.username,transaksi.total,transaksi.diskon","transaksi","INNER JOIN user ON transaksi.id_user=user.id_user WHERE transaksi.tgl >='$tglawal' and transaksi.tgl <='$tglakhir'");
				}else{
					$qwe=$db->get("transaksi.id_trans,transaksi.tgl,user.username,transaksi.total,transaksi.diskon","transaksi","INNER JOIN user ON transaksi.id_user=user.id_user");
				}
				foreach ($qwe as $tampil){
					$totbay=$tampil['total']-$tampil['diskon'];
			?>
			<tr>
				<td><?php echo $tampil['id_trans'];?></td>
				<td><?php echo $tampil['tgl'];?></td>
				<td><?php echo $tampil['username'];?></td>
				<td><?php echo $tampil['total'];?></td>
				<td><?php echo $tampil['diskon'];?></td>
				<td><?php echo $totbay;?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</form>
</div>
<script type="text/javascript">
	function cetak(){
		tgl_awal=$("#tgl_awal").val();
		tgl_akhir=$("#tgl_akhir").val();
		window.open("content/print_pertanggal.php?tgl_awal="+tgl_awal+"&"+"tgl_akhir="+tgl_akhir);
	}
</script>