<?php include "system/proses.php";
  error_reporting(0);
  if(empty($_GET['nomer_order'])){
    $host       =   "localhost";
    $user       =   "root";
    $password   =   "";
    $database   =   "laundri";
    $connect = mysqli_connect($host, $user, $password, $database);
    $query = "SELECT max(nomer_order) as maxKode FROM oder";
    $hasil = mysqli_query($connect,$query);
    $data = mysqli_fetch_array($hasil);
    $kodeOrder = $data['maxKode'];
    $noUrut = (int) substr($kodeOrder, 3, 3);
    $noUrut++;
    $char = "LDR";
    $kodeOrder = $char . sprintf("%03s", $noUrut);
  $sub='simpan';
  }else{
    $kodeOrder=$_GET['nomer_order'];
    $sub='edit';
  }
  $hmmm=$_SESSION['login_kode'];
?>
<body onload="buka_tab()">
<div class="page-header">
       <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-cart"></i>                 
          </span>
            From Cucian Masuk
        </h3>
</div>
<div class="ol-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <form action="crud/simpan_order.php" method="POST">
                    <div class="from-sample">
                    <div class="form-group" style="float: right;">
                      <label class="btn btn-outline-dark btn-icon-text" style="size: 550px;">
                        <i class="mdi mdi-diamond btn-icon-prepend mdi-36px"></i>
                          <h1 class="d-inline-block text-left">
                            <center><div id="subtotal">Total Bayar</div></center>
                          </h1>
                        </label>
                    </div>
                    <div class="form-group">
                      <input hidden type="text" class="form-control col-sm-3" name="kode_ptg" id="kode_ptg" value="<?php echo $_SESSION['login_kode'];?>">
                      <label class="col-form-label">No Order</label>
                      <input readonly type="text" class="form-control col-sm-3" name="nomer_order" id="nomer_order" value="<?php echo $kodeOrder;?>">
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Tanggal Masuk</label>
                      <input type="text" class="form-control col-sm-3" name="tgl_order" id="tgl_order" value="<?php echo date('Y-m-d');?>">
                    </div>
                  </div>
                  <div class="form-inline" style="margin-left: 5px;">
                    <div class="form-group">
                    <label class="col-form-label">Pelanggan</label>
                    <label id="id_plg" class="col-form-label" style="margin-left: 200px;">Kode Pelanggan</label>
                    <label id="nama" class="col-form-label" style="margin-left: 150px;">Nama Pelanggan</label>
                  </div>
                  </div>
                  <div class="form-inline" style="margin-left: 5px;">
                      <select class="form-control col-sm-3" name="status_pelanggan" id="status_pelanggan" onchange="plgn()">
                        <option>Pilih</option>
                        <option id="Pelanggan">Pelanggan</option>
                        <option id="bknpel">Bukan Pelanggan</option>
                      </select>
                      <input type="text" id="kode_pelanggan" name="kode_pelanggan" class="form-control col-sm-3" onkeyup="idp()" style="margin: 5px;">
                      <input readonly type="text" id="nama_pelanggan" name="nama_pelanggan" class="form-control col-sm-3">
                  </div>
                  <div class="form-inline" style="margin-left: 5px;">
                    <div class="form-group">
                      <label class="col-form-label">Kode Jasa</label>
                      <label class="col-form-label" style="margin-left: 200px;">Nama Jasa</label>
                      <label class="col-form-label" style="margin-left: 200px;">Harga</label>
                      <label class="col-form-label" style="margin-left: 200px;">Berat</label>
                    </div>
                  </div>
                  <div class="form-inline row" style="margin-left: 5px;">
                    <!-- Jasa Ketika diklik muncul nama dan harga -->
                    <select class="form-control col-sm-3" name="kode_jasa" id="kode_jasa" onchange="idb();">
                      <?php
                        $qw=$db->get("*","jasa","ORDER BY kode_jasa ASC");
                        foreach ($qw as $tampil) {
                      ?>
                      <option <?php if($tampil['kode_jasa']==$tampil['kode_jasa']){echo "selected";}?> value="<?php echo $tampil['kode_jasa'];?>">
                        <?php echo $tampil['kode_jasa'];?></option>
                      <?php
                        }
                      ?>
                    </select>
                    <!-- Nama Jasa Otomatis -->
                    <input readonly="" style="margin: 5px;" type="text" class="form-control col-sm-3" placeholder="Nama Jasa" name="nama_jasa" id="nama_jasa">
                    <!-- Harga Otomatis -->
                    <input readonly="" type="text" class="form-control col-sm-3" placeholder="Harga" name="harga" id="harga" onkeyup="tot();">
                    <!-- Berat Cucian -->
                    <input style="margin: 5px;" type="text" class="form-control col-sm-2" placeholder="Berat per-Kilo" name="berat_cucian" id="berat_cucian" onkeyup="tot()">
                   </div>
                   <div class="form-inline" style="margin-left: 5px;">
                    <div class="form-group">
                    <label class="col-form-label">Total</label>
                    <label class="col-form-label" style="margin-left: 240px;">Status</label>
                    <label class="col-form-label" style="margin-left: 220px;">Tanggal Selesai</label>
                  </div>
                  </div>
                   <div class="form-inline" style="margin-left: 5px;">
                    <input type="text" class="form-control col-sm-3" placeholder="Total" name="total_harga" id="total_harga">
                    <input readonly="" style="margin: 5px;" type="text" value="Belum Diambil" class="form-control col-sm-3" name="status_cucian" id="status_cucian">
                    <input type="date" class="form-control col-sm-3" placeholder="Tanggal Selesai" name="tgl_rencana_selesai" id="tgl_rencana_selesai">
                    <button type="submit" name="simpan" style="margin: 5px;" class="btn btn-outline-danger btn-icon-text">
                        <i class="mdi mdi-content-save-all btn-icon-prepend"></i>
                        Simpan
                    </button>
                  </div>
                  <div id="kotak-detail"></div>
                </form>
                </div>
              </div>
            </div>
          </body>
          <script type="text/javascript" src="js/validation.js"></script>