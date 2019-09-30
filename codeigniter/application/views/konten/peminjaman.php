 <?php
		$qw=$this->Peminjaman_Model->qw("*","peminjaman","ORDER BY id_peminjaman DESC")->row_array();
		$kode_peminjaman=$qw['id_peminjaman'];
		$ambil=substr($kode_peminjaman,3,3);
		$jml=$ambil + 1;
		if($jml < 10){
			$nomot ="PMJ00".$jml;
		}elseif($jml > 9 && $jml <=99){
			$nomot ="PMJ0".$jml;
		}else{
			$nomot ="PMJ".$jml;
		}
?>
<body onload="buka()">
<h2>Peminjaman Barang</h2>
<form action="" method="POST">
	<table>
		<tr>
			<td><label>ID Peminjaman</label></td>
			<td><label >:</label></td>
			<td><input readonly style="margin-left: 40px;" type="text" name="id_peminjaman" id="id_peminjaman" value="<?php echo $nomot;?>" class="text2"></td>
		</tr>
		<tr>
			<td><label>ID Inventaris</label></td>
			<td><label>:</label></td>
			<td><input style="margin-left: 40px;" type="text" name="id_inventaris" id="id_inventaris" class="text2" onkeyup="cinv()"></td>

			<td><label style="margin-left: 40px;">Nama Barang</label></td>
			<td><label style="margin-left: 40px;">:</label></td>
			<td><input readonly style="margin-left: 40px;" type="text" name="nama" id="nama" class="text2"></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>

			<td><label style="margin-left: 40px;">Jumlah Barang</label></td>
			<td><label style="margin-left: 40px;">:</label></td>
			<td><input readonly style="margin-left: 40px;" name="jumlah" id="jumlah" class="text2"></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			
			<td><label style="margin-left: 40px;">Kode Inventaris</label></td>
			<td><label style="margin-left: 40px;">:</label></td>
			<td><input readonly style="margin-left: 40px;" type="text" name="kode_inventaris" id="kode_inventaris" class="text2"></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			
			<td><label style="margin-left: 40px;">Kondisi</label></td>
			<td><label style="margin-left: 40px;">:</label></td>
			<td><input readonly style="margin-left: 40px;" type="text" name="kondisi" id="kondisi" class="text2"></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			
			<td><label style="margin-left: 40px;">Ruang</label></td>
			<td><label style="margin-left: 40px;">:</label></td>
			<td><input readonly style="margin-left: 40px;" type="text" name="nama_ruang" id="nama_ruang" class="text2"></td>
		</tr>
		<tr>
			<td><label>ID Pegawai</label></td>
			<td><label >:</label></td>
			<td><input style="margin-left: 40px;" type="text" name="id_pegawai" id="id_pegawai" class="text2" onkeyup="cpw()"></td>

			<td><label style="margin-left: 40px;">NIP</label></td>
			<td><label style="margin-left: 40px;">:</label></td>
			<td><input readonly style="margin-left: 40px;" type="text" name="nip" id="nip" class="text2"></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			
			<td><label style="margin-left: 40px;">Nama</label></td>
			<td><label style="margin-left: 40px;">:</label></td>
			<td><input readonly style="margin-left: 40px;" type="text" name="nama_pegawai" id="nama_pegawai" class="text2"></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			
			<td><label style="margin-left: 40px;">Alamat</label></td>
			<td><label style="margin-left: 40px;">:</label></td>
			<td><input readonly style="margin-left: 40px;" type="text" name="alamat" id="alamat" class="text2"></td>
		</tr>
		<tr>
			<td><label>Jumlah Pinjam</label></td>
			<td><label >:</label></td>
			<td><input readonly style="margin-left: 40px;" name="jumlah_pinjam" id="jumlah_pinjam" value="1" class="text2"></td>

			<td><input style="margin-left: 40px;" type="button" class="btn btn-biru" value="+" name="" onclick="simpan_detail()"></td>
		</tr>
	</table>
	<hr>
	<div id="dtl"></div>
	<table>
		<tr>
			<td><label>Tanggal Pinjam</label></td>
			<td><label>:</label></td>
			<td><input readonly style="margin-left: 40px;" value="<?php echo date('Y/m/d');?>" name="tanggal_pinjam" id="tanggal_pinjam" class="text2"></td>

			<?php 
				$tgl=date('Y/m/d');
				$minggu=date('Y/m/d', strtotime('+1 week',strtotime($tgl)));
			?>

			<td><label style="margin-left: 10px;">Tanggal Kembali</label></td>
			<td><label>:</label></td>
			<td><input readonly style="margin-left: 10px;" value="<?php echo $minggu;?>" name="tanggal_kembali" id="tanggal_kembali" class="text2"></td>
			<td>
				<input type="submit" onclick="simpan_peminjaman()"  class="btn btn-biru" value="Simpan" name="simpan">
				<input type="reset" class="btn btn-merah" value="Batal" name="">
			</td>
		</tr>
	</table>
</form>
</body>
<script type="text/javascript">
	function cinv(){
		$.ajax({
		url:'<?php echo site_url('Peminjaman_Controller/cinv');?>',
		type:"POST",
		dataType:"json",
		data:{
			id_inventaris:$("#id_inventaris").val()
		},
		success:function(data){
			$("#nama").val(data.nama);
			$("#jumlah").val(data.jumlah);
			$("#kode_inventaris").val(data.kode_inventaris);
			$("#kondisi").val(data.kondisi);
			$("#nama_ruang").val(data.nama_ruang);
		}
		});
	}
	function cpw(){
		$.ajax({
		url:'<?php echo site_url('Peminjaman_Controller/cpw');?>',
		type:"POST",
		dataType:"json",
		data:{
			id_pegawai:$("#id_pegawai").val()
		},
		success:function(data){
			$("#nip").val(data.nip);
			$("#nama_pegawai").val(data.nama_pegawai);
			$("#alamat").val(data.alamat);
		}
		});
	}
	function simpan_detail(){
	$.ajax({
		url:'<?php echo site_url('Peminjaman_Controller/simpan_detail');?>',
		type:"POST",
		data:{
			id_peminjaman:$("#id_peminjaman").val(),
			id_inventaris:$("#id_inventaris").val(),
			jumlah_pinjam:$("#jumlah_pinjam").val()
		},
		success:function(hasil){
			alert(hasil);
			buka();
		}
		});
	}
	function simpan_peminjaman(){
	$.ajax({
		url:'<?php echo site_url('Peminjaman_Controller/simpan_peminjaman');?>',
		type:"POST",
		data:{
			id_peminjaman:$("#id_peminjaman").val(),
			tanggal_pinjam:$("#tanggal_pinjam").val(),
			tanggal_kembali:$("#tanggal_kembali").val(),
			id_pegawai:$("#id_pegawai").val()
		},
		success:function(hasil){
			alert(hasil);
		}
		});
	}
	function buka(){
		xx=$('#id_peminjaman').val();
		$("#dtl").load("<?php echo site_url('Peminjaman_Controller/tampil_detail');?>"+"/"+xx);
	}
	function hapus(a){
		$.ajax({
			url:'<?php echo site_url('Peminjaman_Controller/hapus_peminjaman')?>',
			type:"POST",
			data:{
				id_detail_pinjam:a
			},
			success:function(hasil){
				buka();
			}
		})
	}
</script>