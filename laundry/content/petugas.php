<?php
  include "system/proses.php";
?>         
<div class="page-header">
      <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account"></i>                 
          </span>
            Tabel Petugas
      </h3>
        <ol class="breadcrumb">
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="index.php?p=petugas" method="POST">
            <select name="jenis_pencarian" class="btn-opo">
              <option>Pilih</option>
              <option value="kode_ptg">Kode Petugas</option>
              <option value="nama_ptg">Nama Petugas</option>
              <option value="password_ptg">Password Petugas</option>
              <option value="status">Status Petugas</option>
            </select>
            <input type="text" name="cari_data" class="btn-opo">
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
                  <a class="card-description" href="index.php?p=f_petugas">
                    <button type="submit" class="btn btn-outline-danger btn-icon-text">
                        <i class="mdi mdi-account-plus btn-icon-prepend"></i>
                        Add New
                    </button>
                  </a>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Kode Petugas</th>
                        <th>Nama Petugas</th>
                        <th>Password Petugas</th>
                        <th>Status Petugas</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(isset($_POST['cari'])){
                          $qw=$db->get("*","petugas","WHERE $_POST[jenis_pencarian] LIKE '%$_POST[cari_data]%'");
                      }else{
                        $qw=$db->get("*","petugas","ORDER BY kode_ptg ASC");
                      }
                        foreach ($qw as $tamp_ptg){
                      ?>
                      <tr>
                        <td><?php echo $tamp_ptg['kode_ptg'];?></td>
                        <td><?php echo $tamp_ptg['nama_ptg'];?></td>
                        <td><?php echo $tamp_ptg['password_ptg'];?></td>
                        <td><?php echo $tamp_ptg['status'];?></td>
                        <td>
                          <a href="index.php?p=f_petugas&kode_ptg=<?php echo $tamp_ptg['kode_ptg'];?>"><img src="images/gambar/edit.png" class="gbr"></a>
                          <a href="crud/hapus_petugas.php?kode_ptg=<?php echo $tamp_ptg['kode_ptg'];?>"><img src="images/gambar/hapus.png" class="gbr"></a>
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