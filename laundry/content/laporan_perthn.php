<div class="page-header">
       <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account-multiple menu-icon"></i>                 
          </span>
            Laporan Per Tahun
        </h3>
        <ol class="breadcrumb">
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="index.php?p=laporan_perthn" method="POST">
            <select class="btn-opo" name="tahun" id="tahun">
              <?php
              $mulai=date('Y') - 50;
              for($i =$mulai;$i<$mulai + 100;$i++){
                $sel = $i == date('Y') ? ' selected="selected"' : '';
                echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
              }
              ?>
            </select>
            <button type="submit" name="cari" class="btn btn-social-icon btn-inverse-danger btn-rounded" style="margin-left: 10px;">
                <i class="mdi mdi-magnify"></i>
            </button>
            <button type="submit" name="print" class="btn btn-social-icon btn-inverse-secondary btn-rounded" style="margin-left: 10px;" onclick="cetak()">
                <i class="mdi mdi-printer"></i>
            </button>
          </form>
        </div>
        </ol>
</div>
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No Transaksi</th>
                        <th>No Order</th>
                        <th>Tanggal Transaksi</th>
                        <th>Nama Pelanggan</th>
                        <th>Jenis Jasa</th>
                        <th>Harga</th>
                        <th>Berat</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        include "system/proses.php";
                        if(isset($_POST['cari'])){
                          $qwe=$db->get("transaksi.no_transaksi,oder.nomer_order,transaksi.tgl_transaksi,pelanggan.nama_pelanggan,jasa.nama_jasa,jasa.harga,oder.berat_cucian,oder.total_harga","oder","INNER JOIN transaksi on transaksi.nomer_order=oder.nomer_order INNER JOIN jasa on jasa.kode_jasa=oder.kode_jasa INNER JOIN pelanggan on pelanggan.kode_pelanggan=oder.kode_pelanggan WHERE year(transaksi.tgl_transaksi)='$_POST[tahun]' ORDER BY oder.nomer_order ASC");
                        }else{
                          $qwe=$db->get("transaksi.no_transaksi,oder.nomer_order,transaksi.tgl_transaksi,pelanggan.nama_pelanggan,jasa.nama_jasa,jasa.harga,oder.berat_cucian,oder.total_harga","oder","INNER JOIN transaksi on transaksi.nomer_order=oder.nomer_order INNER JOIN jasa on jasa.kode_jasa=oder.kode_jasa INNER JOIN pelanggan on pelanggan.kode_pelanggan=oder.kode_pelanggan");
                        }
                        $tot=0;
                        foreach ($qwe as $tampil){
                          $tot=$tot+$tampil['total_harga'];
                      ?>
                      <tr>
                        <td><?php echo $tampil['no_transaksi'];?></td>
                        <td><?php echo $tampil['nomer_order'];?></td>
                        <td><?php echo $tampil['tgl_transaksi'];?></td>
                        <td><?php echo $tampil['nama_pelanggan'];?></td>
                        <td><?php echo $tampil['nama_jasa'];?></td>
                        <td><?php echo "Rp. ". number_format($tampil['harga'],2, ",", ".");?></td>
                        <td><?php echo $tampil['berat_cucian'];?></td>
                        <td><?php echo "Rp. ". number_format($tampil['total_harga'],2, ",", ".");?></td>
                      </tr>
                      <?php
                        }
                      ?>
                    <tr>
                      <td></td><td></td><td></td><td></td>
                      <td></td><td></td><td>Jumlah:</td><td><b><?php echo "Rp. ". number_format($tot,2, ",", ".");?></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <label style="margin-left: 50px;">Jepara, <?php echo date('d-m-Y');?></label>
                <label style="margin-left: 75px;"><?php echo $_SESSION['status']?>,</label>
                <img src="images/gambar/ttd.png" style="width: 150px;margin-left: 45px;">
                <label style="margin-left: 75px;">(<?php echo $_SESSION['login_admin']?>)</label>
              </div>
            </div>
<script type="text/javascript">
  function cetak(){
    tahun=$("#tahun").val();
    window.open("content/print_pertahun.php?tahun="+tahun);
  }
</script>