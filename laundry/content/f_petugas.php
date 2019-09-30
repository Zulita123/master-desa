<?php include "system/proses.php";
  error_reporting(0);
  if(empty($_GET['kode_ptg'])){
    $host       =   "localhost";
    $user       =   "root";
    $password   =   "";
    $database   =   "laundri";
    $connect = mysqli_connect($host, $user, $password, $database);
    $query = "SELECT max(kode_ptg) as maxKode FROM petugas";
    $hasil = mysqli_query($connect,$query);
    $data = mysqli_fetch_array($hasil);
    $kodePetugas = $data['maxKode'];
    $noUrut = (int) substr($kodePetugas, 3, 3);
    $noUrut++;
    $char = "PTG";
    $kodePetugas = $char . sprintf("%03s", $noUrut);
  $sub='simpan';
  }else{
    $kodePetugas=$_GET['kode_ptg'];
    $sub='edit';
  }
  $qw=$db->get("*","petugas","WHERE kode_ptg='$_GET[kode_ptg]'");
  $tampl=$qw->fetch();
?>
<div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">From Petugas</h4>
                  <p class="card-description">
                    masukkan data!
                  </p>
                  <form action="crud/simpan_petugas.php" method="POST" class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Kode Petugas</label>
                      <input readoly type="text" class="form-control" name="kode_ptg" value="<?php echo $kodePetugas;?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Petugas</label>
                      <input type="text" class="form-control" name="nama_ptg" placeholder="Nama Petugas" value="<?php echo $tampl['nama_ptg'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password Petugas</label>
                      <input type="text" class="form-control" name="password_ptg" placeholder="Password" value="<?php echo $tampl['password_ptg'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Status</label>
                      <select class="form-control" name="status" value="<?php echo $tampl['status'];?>">
                        <option>Pilih</option>
                        <option value="Admin">Admin</option>
                        <option value="Kasir">Kasir</option>
                        <option value="Manager">Manager</option>
                      </select>
                    </div>
                    <button type="submit" name="<?php echo $sub;?>" class="btn btn-gradient-primary mr-2">Submit</button>
                    <a href="index.php?p=jasa" class="btn btn-light">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
            </div>