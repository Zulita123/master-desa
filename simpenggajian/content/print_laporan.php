<!DOCTYPE html>
<html>
<head>
	<title>Print Laporan Perbulan</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body style="background-color: #fff;">
	<div class="judul-content">
	<h2 style="text-align: center;font-family: segoe ui;">Laporan Perbulan</h2>
  <h2 style="text-align: center;font-family: segoe ui;">PT . WIKRAMA TEKHNO</h2>
  <h4 style="text-align: center;font-family: segoe ui;">Bulan Ke-<?php echo $_GET['bulan'];?></h4>
</div>
<div class="isi-content">
	<form action="index.php?p=laporan" method="POST">
		<div class="col-lg-12 grid-margin stretch-card">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No Slip</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Tunj Jabatan</th>
                        <th>Tunj Istri</th>
                        <th>Tunj Anak</th>
                        <th>Gaji Kotor</th>
                        <th>Potongan</th>
                        <th>Gaji Bersih</th>
                    </tr>
                </thead>
                <tbody>
                      <?php
                        include "../system/proses.php";
                        if(isset($_POST['cari'])){
                          $qwe=$db->get("gaji.no_slip,pegawai.nama,jabatan.nama_jabatan,jabatan.tj_jabatan,golongan.tj_suami_istri,golongan.tj_anak,gaji.pendapatan,gaji.potongan,gaji.gaji_bersih","pegawai","INNER JOIN gaji on gaji.nip=pegawai.nip INNER JOIN jabatan on jabatan.kode_jabatan=pegawai.kode_jabatan INNER JOIN golongan on golongan.kode_golongan=pegawai.kode_golongan WHERE month(gaji.tanggal)='$_POST[bulan]' ORDER BY gaji.no_slip ASC");
                        }else{
                          $qwe=$db->get("gaji.no_slip,pegawai.nama,jabatan.nama_jabatan,jabatan.tj_jabatan,golongan.tj_suami_istri,golongan.tj_anak,gaji.pendapatan,gaji.potongan,gaji.gaji_bersih","pegawai","INNER JOIN gaji on gaji.nip=pegawai.nip INNER JOIN jabatan on jabatan.kode_jabatan=pegawai.kode_jabatan INNER JOIN golongan on golongan.kode_golongan=pegawai.kode_golongan");
                        }
                        $no=0;
                        $noo=0;
                        $nooo=0;
                        foreach ($qwe as $tampil){
                          $no=$no+$tampil['pendapatan'];
                          $noo=$noo+$tampil['potongan'];
                          $nooo=$nooo+$tampil['gaji_bersih'];
                      ?>
                      <tr>
                        <td><?php echo $tampil['no_slip'];?></td>
                        <td><?php echo $tampil['nama'];?></td>
                        <td><?php echo $tampil['nama_jabatan'];?></td>
                        <td><?php echo $tampil['tj_jabatan'];?></td>
                        <td><?php echo $tampil['tj_suami_istri'];?></td>
                        <td><?php echo $tampil['tj_anak'];?></td>
                        <td><?php echo "Rp. ". number_format($tampil['pendapatan'],2, ",", ".");?></td>
                        <td><?php echo "Rp. ". number_format($tampil['potongan'],2, ",", ".");?></td>
                        <td><?php echo "Rp. ". number_format($tampil['gaji_bersih'],2, ",", ".");?></td>
                      </tr>
                      <?php
                        }
                      ?>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>Jumlah:</td>
                      <td><b><?php echo "Rp. ". number_format($no,2, ",", ".");?></td>
                      <td><b><?php echo "Rp. ". number_format($noo,2, ",", ".");?></td>
                      <td><b><?php echo "Rp. ". number_format($nooo,2, ",", ".");?></td>
                    </tr>
                    </tbody>
            </table>
    	</div>
	</form>
	<div>
	<label style="margin-left: 50px;">Jepara, <?php echo date('d-m-Y');?></label><br>
    <div style="float: left;margin: 10px 50px">
        <label style="margin-bottom: 50px;">Disetujui Oleh</label><br>
        <label><u>Joko Agung S</label><br>
        <label>CEO</label>
    </div>
     <div style="float: right;margin: 10px 50px;">
        <label style="margin-bottom: 50px">Dibuat Oleh</label><br>
        <label><u>Lailya Meily U</label><br>
        <label>HRD</label>
    </div>
</div>
</div>
</body>
</html>