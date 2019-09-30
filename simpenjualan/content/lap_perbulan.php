<div class="judul-content">
	<h1>Laporan Per Bulan</h1>
</div>
<div class="isi-content">
	<form action="index.php?p=lap_pertanggal" method="POST">
		<table class="tabel1">
			<tr>
				<td><label>Bulan</label></td>
				<td><label>Tahun</label></td>
			</tr>
			<tr>
				<td>
					<select name="bulan" class="texx">
						<option value="01">Januari</option>
						<option value="02">Februari</option>
						<option value="03">Maret</option>
						<option value="04">April</option>
						<option value="05">Mei</option>
						<option value="06">Juni</option>
						<option value="07">Juli</option>
						<option value="08">Agustus</option>
						<option value="09">September</option>
						<option value="10">Oktober</option>
						<option value="11">November</option>
						<option value="12">Desember</option>
					</select>
				</td>
				<td>
					<select name="tahun">
						
					</select>
				</td>
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