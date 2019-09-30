<?php include "system/proses.php";
  error_reporting(0);
  if(empty($_GET['kode_jasa'])){
    $host       =   "localhost";
    $user       =   "root";
    $password   =   "";
    $database   =   "laundri";
    $connect = mysqli_connect($host, $user, $password, $database);
    $query = "SELECT max(kode_jasa) as maxKode FROM jasa";
    $hasil = mysqli_query($connect,$query);
    $data = mysqli_fetch_array($hasil);
    $kodeJasa = $data['maxKode'];
    $noUrut = (int) substr($kodeJasa, 3, 3);
    $noUrut++;
    $char = "JSA";
    $kodeJasa = $char . sprintf("%03s", $noUrut);
  $sub='simpan';
  }else{
    $kodeJasa=$_GET['kode_jasa'];
    $sub='edit';
  }
  $qw=$db->get("*","jasa","WHERE kode_jasa='$_GET[kode_jasa]'");
  $tampl=$qw->fetch();
?>
<div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">From Jasa</h4>
                  <p class="card-description">
                    masukkan data!
                  </p>
                  <form action="crud/simpan_jasa.php" method="POST" class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Kode Jasa</label>
                      <input readonly type="text" class="form-control" name="kode_jasa" value="<?php echo $kodeJasa;?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Jasa</label>
                      <input type="text" class="form-control" name="nama_jasa" value="<?php echo $tampl['nama_jasa'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Harga</label>
                      <input type="number" class="form-control" name="harga" value="<?php echo $tampl['harga'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Keterangan</label>
                      <input type="text" class="form-control" name="keterangan" value="<?php echo $tampl['keterangan'];?>">
                    </div>
                    <button type="submit" name="<?php echo $sub;?>" class="btn btn-gradient-primary mr-2">Submit</button>
                    <a href="index.php?p=jasa" class="btn btn-light">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
            </div>