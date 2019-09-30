<?php include "system/proses.php";
  error_reporting(0);
  if(empty($_GET['nip'])){
    $host       =   "localhost";
    $user       =   "root";
    $password   =   "";
    $database   =   "penggajian";
    $connect = mysqli_connect($host, $user, $password, $database);
    $query = "SELECT max(nip) as maxKode FROM pegawai";
    $hasil = mysqli_query($connect,$query);
    $data = mysqli_fetch_array($hasil);
    $kodePegawai = $data['maxKode'];
    $noUrut = (int) substr($kodePegawai, 3, 5);
    $noUrut++;
    $char = "18600";
    $kodePegawai = $char . sprintf("%03s", $noUrut);
  $sub='simpan';
  }else{
    $kodePegawai=$_GET['nip'];
    $sub='edit';
  }
  $qw=$db->get("*","pegawai","WHERE nip='$_GET[nip]'");
  $tampl=$qw->fetch();
?>
<div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">From Pegawai</h4>
                  <p class="card-description">
                    masukkan data!
                  </p>
                  <hr>
                  <form action="crud/simpan_pegawai.php" method="POST" class="forms-inline">
                    <div class="form-group row">
                      <label for="exampleInputUsername1" class="col-sm-3 col-form-label">NIP</label>
                      <input readoly type="text" class="form-control col-sm-3" name="nip" value="<?php echo $kodePegawai;?>">
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail1" class="col-sm-3 col-form-label">Nama Pegawai</label>
                      <input type="text" class="form-control col-sm-3" name="nama" placeholder="Nama Pegawai" value="<?php echo $tampl['nama'];?>">
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword1" class="col-sm-3 col-form-label">Tempat lahir</label>
                      <input type="text" class="form-control col-sm-3" name="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tampl['tempat_lahir'];?>">
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputUsername1" class="col-sm-3 col-form-label">Tanggal lahir</label>
                      <input type="date" class="form-control col-sm-3" name="tanggal_lahir" placeholder="mm/dd/yyyy" value="<?php echo $tampl['tanggal_lahir'];?>">
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail1" class="col-sm-3 col-form-label">Jabatan</label>
                      <select class="form-control col-sm-3" name="kode_jabatan">
                        <option>pilih</option>
                        <?php
                          $qw=$db->get("*","jabatan","ORDER BY kode_jabatan ASC");
                          foreach ($qw as $tampil) {
                        ?>
                        <option <?php if($tampl['kode_jabatan']==$tampil['kode_jabatan']){echo "selected";}?> value="<?php echo $tampil['kode_jabatan'];?>">
                          <?php echo $tampil['nama_jabatan'];?></option>
                        <?php
                          }
                        ?>
                    </select>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputUsername1" class="col-sm-3 col-form-label">Golongan</label>
                       <select class="form-control col-sm-3" name="kode_golongan">
                        <option>pilih</option>
                        <?php
                          $qw=$db->get("*","golongan","ORDER BY kode_golongan ASC");
                          foreach ($qw as $tampil) {
                        ?>
                        <option <?php if($tampl['kode_golongan']==$tampil['kode_golongan']){echo "selected";}?> value="<?php echo $tampil['kode_golongan'];?>">
                          <?php echo $tampil['golongan'];?></option>
                        <?php
                          }
                        ?>
                    </select>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword1" class="col-sm-3 col-form-label">Status</label>
                      <select class="form-control col-sm-3" name="status" id="status" onchange="sts()" value="<?php echo $tampl['status'];?>">
                        <option>Pilih</option>
                        <option <?php if($tampl['status']=="Sudah Menikah"){echo "selected";}?> value="Sudah Menikah">Sudah Menikah</option>
                        <option <?php if($tampl['status']=="Belum Menikah"){echo "selected";}?> value="Belum Menikah">Belum Menikah</option>
                      </select>
                    </div>
                    <div <?php if($tampl['status']=="Belum Menikah" || empty($_GET['nip'])){echo "hidden";}?> class="form-group row">
                      <label id="nama_anak" for="exampleInputUsername1" class="col-sm-3 col-form-label">Jumlah Anak</label>
                      <select id="anak" class="form-control col-sm-3" name="jumlah_anak" value="<?php echo $tampl['jumlah_anak'];?>">
                        <option value="0" <?php if($tampl['jumlah_anak']=="0"){echo "selected";}?>>0</option>
                        <option value="0" <?php if($tampl['jumlah_anak']=="1"){echo "selected";}?>>1</option>
                        <option value="0" <?php if($tampl['jumlah_anak']=="2"){echo "selected";}?>>2</option>
                      </select>
                    </div>
                    <button type="submit" name="<?php echo $sub;?>" class="btn btn-gradient-primary mr-2">Submit</button>
                    <a href="index.php?p=pegawai" class="btn btn-light">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
            </div>