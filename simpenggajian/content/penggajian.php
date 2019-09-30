<?php include "system/proses.php";
  error_reporting(0);
  if(empty($_GET['no_slip'])){
    $host       =   "localhost";
    $user       =   "root";
    $password   =   "";
    $database   =   "penggajian";
    $connect = mysqli_connect($host, $user, $password, $database);
    $query = "SELECT max(no_slip) as maxKode FROM gaji";
    $hasil = mysqli_query($connect,$query);
    $data = mysqli_fetch_array($hasil);
    $kodeslip = $data['maxKode'];
    $noUrut = (int) substr($kodeslip, 3, 3);
    $noUrut++;
    $char = "SLB";
    $kodeslip = $char . sprintf("%03s", $noUrut);
  $sub='simpan';
  }else{
    $kodeslip=$_GET['no_slip'];
    $sub='edit';
  }
?>
<div class="page-header">
       <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-briefcase-check"></i>                 
          </span>
            Penggajian Pegawai
        </h3>
</div>
<div class="ol-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <form action="crud/simpan_penggajian.php" method="POST">
          <div class="form-inline" style="margin-left: 25px;">
            <div class="form-group">
              <input hidden type="text" class="form-control col-sm-3" name="kode_ptg" id="kode_ptg" value="<?php echo $_SESSION['login_kode'];?>">
              <label class="col-form-label">No Slip</label>
              <input readonly type="text" name="no_slip" id="no_slip" class="form-control col-sm-2" style="margin-left: 50px;" value="<?php echo $kodeslip;?>">
              <label class="col-form-label" style="margin-left: 50px;">Tanggal</label>
              <input readonly type="text" name="tanggal" id="tanggal" class="form-control col-sm-2" style="margin-left: 50px;" value="<?php echo date('Y-m-d');?>">
            </div>
          </div>
          <hr>
          <div class="form-inline" style="margin-left: 25px;">
            <div class="form-group">
              <label class="col-form-label">NIP</label>
              <select style="margin-left: 35px;" class="form-control col-sm-2" name="nip" id="nip" onchange="trot();">
                      <?php
                        $qw=$db->get("*","pegawai","ORDER BY nip ASC");
                        foreach ($qw as $tampil) {
                      ?>
                      <option <?php if($tampil['nip']==$tampil['nip']){echo "selected";}?> value="<?php echo $tampil['nip'];?>">
                        <?php echo $tampil['nip'];?></option>
                      <?php
                        }
                      ?>
                    </select>
              <label class="col-form-label" style="margin-left: 50px;">Nama</label>
              <input type="text" name="nama" id="nama" class="form-control col-sm-3" style="margin-left: 50px;">
              <label class="col-form-label" style="margin-left: 50px;">Status</label>
              <input type="text" name="status" id="status" class="form-control col-sm-2" style="margin-left: 50px;">
            </div>
          </div>
          <hr>
          <div class="form-inline" style="margin-left: 5px;">
            <div class="form-group">
              <label class="col-form-label" style="margin-left: 25px;">Nama Jabatan</label>
              <label class="col-form-label" style="margin-left: 140px;">Gaji Pokok</label>
              <label class="col-form-label" style="margin-left: 170px;">Tunjangan Jabatan</label>
              <label class="col-form-label" style="margin-left: 115px;">Nama Golongan</label>
            </div>
            <div class="form-group">
              <input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control col-sm-2" style="margin: 25px;">
              <input type="text" name="gaji_pokok" id="gaji_pokok" class="form-control col-sm-2" style="margin: 25px;">
              <input type="text" name="tj_jabatan" id="tj_jabatan" class="form-control col-sm-2" style="margin: 25px;">
              <input type="text" name="golongan" id="golongan" class="form-control col-sm-2" style="margin: 25px;">
            </div>
            <div class="form-group">
              <label class="col-form-label" style="margin-left: 25px;">Tunjangan Istri</label>
              <label class="col-form-label" style="margin-left: 140px;">Tunjangan Anak</label>
              <label class="col-form-label" style="margin-left: 135px;">Jumlah Anak</label>
              <label class="col-form-label" style="margin-left: 150px;">Pendapatan Kotor</label>
            </div>
            <div class="form-group">
              <input type="text" name="tj_suami_istri" id="tj_suami_istri" class="form-control col-sm-2" style="margin: 25px;">
              <input type="text" name="tj_anak" id="tj_anak" class="form-control col-sm-2" style="margin: 25px;">
              <input type="text" name="jumlah_anak" id="jumlah_anak" class="form-control col-sm-2" style="margin: 25px;">
              <input type="text" name="pendapatan" id="pendapatan" class="form-control col-sm-2" style="margin: 25px;">
            </div>
          </div>
          <hr>
          <div class="form-inline" style="margin-left: 25px;">
            <div class="form-group">
              <label class="col-form-label" style="margin-left: 10px;">Potongan PPN 10%</label>
              <label class="col-form-label" style="margin-left: 115px;">Gaji Bersih</label>
            </div>
            <div class="form-group">
              <input type="text" name="potongan" id="potongan" class="form-control col-sm-3" style="margin: 10px;">
              <input type="text" name="gaji_bersih" id="gaji_bersih" class="form-control col-sm-3" style="margin-left: 50px;">
              <div class="form-group" style="float: right;margin-left: 50px;margin-top: 0px;">
              <button type="submit" name="simpan" class="btn btn-gradient-dark btn-icon-text">
              Simpan
              <i class="mdi mdi-file-check btn-icon-append"></i>
            </button>
            </div>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>