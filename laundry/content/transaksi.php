<?php include "system/proses.php";
  error_reporting(0);
  if(empty($_GET['no_transaksi'])){
    $host       =   "localhost";
    $user       =   "root";
    $password   =   "";
    $database   =   "laundri";
    $connect = mysqli_connect($host, $user, $password, $database);
    $query = "SELECT max(no_transaksi) as maxKode FROM transaksi";
    $hasil = mysqli_query($connect,$query);
    $data = mysqli_fetch_array($hasil);
    $kodeTrans = $data['maxKode'];
    $noUrut = (int) substr($kodeTrans, 3, 3);
    $noUrut++;
    $char = "TR";
    $kodeTrans = $char . sprintf("%03s", $noUrut);
  $sub='simpan';
  }else{
    $kodeTrans=$_GET['no_transaksi'];
    $sub='edit';
  }
?>
<div class="page-header">
       <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-briefcase-check"></i>                 
          </span>
            From Transaksi
        </h3>
</div>
<div class="ol-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <form action="crud/simpan_transaksi.php" method="POST">
          <div class="form-inline" style="margin-left: 15px;">
            <div class="form-group">
              <input hidden type="text" class="form-control col-sm-3" name="kode_ptg" id="kode_ptg" value="<?php echo $_SESSION['login_kode'];?>">
              <label class="col-form-label">No Transaksi</label>
              <input type="text" name="no_transaksi" id="no_transaksi" class="form-control col-sm-2" style="margin-left: 50px;" value="<?php echo $kodeTrans;?>">
              <label class="col-form-label" style="margin-left: 50px;">Tanggal Transaksi</label>
              <input type="text" name="tgl_transaksi" id="tgl_transaksi" class="form-control col-sm-2" style="margin-left: 50px;" value="<?php echo date('Y-m-d');?>">
            </div>
          </div>
          <hr>
          <div class="form-inline" style="margin-left: 5px;">
            <div class="form-group">
              <label class="col-form-label" style="margin-left: 10px;">No Order</label>
              <label class="col-form-label" style="margin-left: 70px;">Nama Pelanggan</label>
              <label class="col-form-label" style="margin-left: 130px;">Nama Jasa</label>
              <label class="col-form-label" style="margin-left: 65px;">Harga</label>
              <label class="col-form-label" style="margin-left: 90px;">Berat</label>
              <label class="col-form-label" style="margin-left: 90px;">Total</label>
            </div>
            <div class="form-group">
              <input type="text" name="nomer_order" id="nomer_order" class="form-control col-sm-1" style="margin: 5px;" onkeyup="trot();">
              <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control col-sm-2" style="margin: 5px;">
              <input type="text" name="nama_jasa" id="nama_jasa" class="form-control col-sm-1" style="margin: 5px;">
              <input type="text" name="harga" id="harga" class="form-control col-sm-1" style="margin: 5px;">
              <input type="text" name="berat_cucian" id="berat_cucian" class="form-control col-sm-1" style="margin: 5px;">
              <input type="text" name="total_harga" id="total_harga" class="form-control col-sm-1" style="margin: 5px;">
            </div>
          </div>
          <hr>
          <div class="form-inline" style="margin-left: 5px;">
            <div class="form-group">
              <label class="col-form-label" style="margin-left: 10px;">Bayar</label>
              <label class="col-form-label" style="margin-left: 110px;">Kembali</label>
              <label class="col-form-label" style="margin-left: 100px;">Status</label>
            </div>
            <div class="form-group">
              <input type="text" name="bayar" id="bayar" class="form-control col-sm-2" style="margin: 10px;" onkeyup="kmbl()">
              <input type="text" name="kembali" id="kembali" class="form-control col-sm-2" style="margin: 10px;">
              <input type="text" name="status_cucian" id="status_cucian" class="form-control col-sm-2" style="margin: 10px;" value="Sudah Diambil">
              <div class="form-group" style="float: right;margin-left: 10px;size: 1000px;margin-top: -50px;">
              <label class="btn btn-outline-dark btn-icon-text">
                <i class="mdi mdi-diamond btn-icon-prepend mdi-36px"></i>
                <h1 class="d-inline-block text-left">
                  <center><div id="subtotal">Kembalian</div></center>
                </h1>
              </label>
            </div>
            </div>
          </div>
          <hr>
            <button type="submit" name="simpan" class="btn btn-gradient-dark btn-icon-text">
              Simpan
              <i class="mdi mdi-file-check btn-icon-append"></i>
            </button>
        </form>
      </div>
    </div>
</div>