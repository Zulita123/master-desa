<?php include "system/proses.php";
  error_reporting(0);
  if(empty($_GET['kode_pelanggan'])){
    $host       =   "localhost";
    $user       =   "root";
    $password   =   "";
    $database   =   "laundri";
    $connect = mysqli_connect($host, $user, $password, $database);
    $query = "SELECT max(kode_pelanggan) as maxKode FROM pelanggan";
    $hasil = mysqli_query($connect,$query);
    $data = mysqli_fetch_array($hasil);
    $kodePelanggan = $data['maxKode'];
    $noUrut = (int) substr($kodePelanggan, 3, 3);
    $noUrut++;
    $char = "PLG";
    $kodePelanggan = $char . sprintf("%03s", $noUrut);
  $sub='simpan';
  }else{
    $kodePelanggan=$_GET['kode_pelanggan'];
    $sub='edit';
  }
  $qw=$db->get("*","pelanggan","WHERE kode_pelanggan='$_GET[kode_pelanggan]'");
  $tampl=$qw->fetch();
?>
<div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">From Pelanggan</h4>
                  <p class="card-description">
                    masukkan data!
                  </p>
                  <form action="crud/simpan_pelanggan.php" method="POST" class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Kode Pelanggan</label>
                      <input readonly type="text" class="form-control" name="kode_pelanggan" value="<?php echo $kodePelanggan;?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Pelanggan</label>
                      <input type="text" class="form-control" name="nama_pelanggan" placeholder="Nama Pelanggan" value="<?php echo $tampl['nama_pelanggan'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Alamat</label>
                      <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo $tampl['alamat'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">No Telepon</label>
                      <input type="number" class="form-control" name="no_telp" placeholder="No Telepon" value="<?php echo $tampl['no_telp'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Status</label>
                      <select class="form-control" name="status_pelanggan" value="<?php echo $tampl['status_pelanggan'];?>">
                        <option>Pilih</option>
                        <option>Aktif</option>
                        <option>Tidak Aktif</option>
                      </select>
                    </div>
                    <button type="submit" name="<?php echo $sub;?>" class="btn btn-gradient-primary mr-2">Submit</button>
                    <a href="index.php?p=jasa" class="btn btn-light">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
            </div>