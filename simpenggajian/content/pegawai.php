<?php
  include "system/proses.php";
?>         
<div class="page-header">
      <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account"></i>                 
          </span>
            Tabel Pegawai
      </h3>
        <ol class="breadcrumb">
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="index.php?p=pegawai" method="POST">
             <?php
              if(isset($_POST['cari'])){
                $jp="$_POST[jenis_pencarian]";
                $dt="$_POST[cari_data]";
              }else{
                $jp="Pilih";
                $dt="";
              }
              ?>
            <select name="jenis_pencarian" class="btn-opo">
              <option>Pilih</option>
              <option <?php if($jp=="nip"){echo "selected";}?> value="nip">NIP</option>
              <option <?php if($jp=="nama"){echo "selected";}?> value="nama">Nama</option>
              <option <?php if($jp=="tempat_lahir"){echo "selected";}?> value="tempat_lahir">Tempat Lahir</option>
              <option <?php if($jp=="tanggal_lahir"){echo "selected";}?> value="tanggal_lahir">Tanggal Lahir</option>
              <option <?php if($jp=="nama_jabatan"){echo "selected";}?> value="nama_jabatan">Jabatan</option>
              <option <?php if($jp=="golongan"){echo "selected";}?> value="golongan">Golongan</option>
              <option <?php if($jp=="status"){echo "selected";}?> value="status">Status</option>
              <option <?php if($jp=="jumlah_anak"){echo "selected";}?> value="jumlah_anak">Jumlah Anak</option>
            </select>
            <input required="" value="<?php echo $dt;?>" type="text" name="cari_data" class="btn-opo">
            <button name="cari" type="submit" class="btn btn-inverse-danger btn-icon">
                <i class="mdi mdi-magnify"></i>
            </button>
          </form>
        </div>
        </ol>
</div>   
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <a class="card-description" href="index.php?p=f_pegawai">
                    <button type="submit" class="btn btn-outline-danger btn-icon-text">
                        <i class="mdi mdi-account-plus btn-icon-prepend"></i>
                        Add New
                    </button>
                  </a>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Jabatan</th>
                        <th>Golongan</th>
                        <th>Status</th>
                        <th>Jumlah Anak</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(isset($_POST['cari'])){
                          $qw=$db->get("pegawai.nip,pegawai.nama,pegawai.tempat_lahir,pegawai.tanggal_lahir,jabatan.nama_jabatan,golongan.golongan,pegawai.status,pegawai.jumlah_anak","pegawai","INNER JOIN jabatan on jabatan.kode_jabatan=pegawai.kode_jabatan INNER JOIN golongan on golongan.kode_golongan=pegawai.kode_golongan WHERE $_POST[jenis_pencarian] LIKE '%$_POST[cari_data]%' ORDER BY nip ASC");
                      }else{
                        $qw=$db->get("pegawai.nip,pegawai.nama,pegawai.tempat_lahir,pegawai.tanggal_lahir,jabatan.nama_jabatan,golongan.golongan,pegawai.status,pegawai.jumlah_anak","pegawai","INNER JOIN jabatan on jabatan.kode_jabatan=pegawai.kode_jabatan INNER JOIN golongan on golongan.kode_golongan=pegawai.kode_golongan ORDER BY nip ASC");
                      }
                        foreach ($qw as $tamp_pgw){
                      ?>
                      <tr>
                        <td><?php echo $tamp_pgw['nip'];?></td>
                        <td><?php echo $tamp_pgw['nama'];?></td>
                        <td><?php echo $tamp_pgw['tempat_lahir'];?></td>
                        <td><?php echo $tamp_pgw['tanggal_lahir'];?></td>
                        <td><?php echo $tamp_pgw['nama_jabatan'];?></td>
                        <td><?php echo $tamp_pgw['golongan'];?></td>
                        <td><?php echo $tamp_pgw['status'];?></td>
                        <td><?php echo $tamp_pgw['jumlah_anak'];?></td>
                        <td>
                          <a href="index.php?p=f_pegawai&nip=<?php echo $tamp_pgw['nip'];?>"><img src="images/gambar/edit.png" class="gbr"></a>
                          <a href="crud/hapus_pegawai.php?nip=<?php echo $tamp_pgw['nip'];?>"><img src="images/gambar/hapus.png" class="gbr"></a>
                        </td>
                      </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>