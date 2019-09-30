<?php 
	include"../system/proses.php";
?>
	<table class="tabel" border="1">
		<tr>
			<th>No</th>
			<th>ID Transakasi</th>
			<th>Nama Barang</th>
			<th>Harga</th>
			<th>Jumlah Beli</th>
			<th>Total</th>
			<th>Action</th>
		</tr>
		<?php
		$idt=$_GET['idt'];
			$qw=$db->get("detail_transaksi.id_detail_trans,detail_transaksi.id_trans,barang.nama_brg,barang.harga,detail_transaksi.jumlah_beli,detail_transaksi.sub_total","detail_transaksi","INNER JOIN barang on detail_transaksi.id_brg=barang.id_brg WHERE detail_transaksi.id_trans='$idt' ORDER BY detail_transaksi.id_detail_trans ASC");
			$no=0;
			$tot=0;
			foreach ($qw as $tamp_trans){
			$no++;
			$tot=$tot+$tamp_trans['sub_total'];
		?>
		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $tamp_trans['id_trans'];?></td>
			<td><?php echo $tamp_trans['nama_brg'];?></td>
			<td><?php echo $tamp_trans['harga'];?></td>
			<td><?php echo $tamp_trans['jumlah_beli'];?></td>
			<td><?php echo $tamp_trans['sub_total'];?></td>
			<td>
				<a onclick="hapus('<?php echo $tamp_trans['id_detail_trans'];?>')"><img src="assets/gambar/hapus.png" class="gbr"></a>
			</td>
		</tr>
		<?php
			}
		?>
	</table>
	<script type="text/javascript">
		$("#total").val('<?php echo $tot;?>');
		// diskon
		var status=document.getElementById('plg').value;
		var harganya=document.getElementById('total').value;
		var angka01=0.05;
		var kosong=0;
		if(status=="Pelanggan"){
			var hasildsk=angka01*harganya;
			document.getElementById('diskon').value=hasildsk;
		}else{
			document.getElementById('diskon').value=kosong;
		}
		var totale=document.getElementById('total').value;
		var diskone=document.getElementById('diskon').value;
		var bayar=totale-diskone;
		document.getElementById('total_bayar').value=bayar;
		kembalian();

		function hapus(kk) {
			$.ajax({
				url:"crud/hapus_detail.php",
				type:'POST',
				data:{
					id_detail_trans:kk
				},
				success:function(hasil){
					alert(hasil);
					buka_tab();
				}
			});
		}
	</script>