<?php
  include "system/proses.php";
?>            
<div class="page-header">
       <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account-multiple menu-icon"></i>                 
          </span>
            Tabel Pelanggan
        </h3>
        <ol class="breadcrumb">
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="index.php?p=pelanggan" method="POST">
            <select name="jenis_pencarian" class="btn-opo">
              <option>Pilih</option>
              <option value="kode_pelanggan">Kode Pelanggan</option>
              <option value="nama_pelanggan">Nama Pelanggan</option>
              <option value="alamat">Alamat</option>
              <option value="no_telp">No Telepon</option>
              <option value="status_pelanggan">Status Pelanggan</option>
            </select>
            <input type="text" name="cari_data" class="btn-opo">
            <button type="submit" name="cari" class="btn btn-inverse-danger btn-icon">
                <i class="mdi mdi-magnify"></i>
            </button>
          </form>
        </div>
        </ol>
</div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <a class="card-description" href="index.php?p=f_pelanggan">
                    <button type="submit" class="btn btn-outline-danger btn-icon-text">
                        <i class="mdi mdi-account-plus btn-icon-prepend"></i>
                        Add New
                    </button>
                  </a>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Kode Pelanggan</th>
                        <th>Nama Pelanggan</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Status Pelanggan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        if(isset($_POST['cari'])){
                          $qw=$db->get("*","pelanggan","WHERE $_POST[jenis_pencarian] LIKE '%$_POST[cari_data]%'");
                        }else{
                          $qw=$db->get("*","pelanggan","ORDER BY kode_pelanggan ASC");
                        }
                        foreach ($qw as $tamp_pelanggan){
                      ?>
                      <tr>
                        <td><?php echo $tamp_pelanggan['kode_pelanggan'];?></td>
                        <td><?php echo $tamp_pelanggan['nama_pelanggan'];?></td>
                        <td><?php echo $tamp_pelanggan['alamat'];?></td>
                        <td><?php echo $tamp_pelanggan['no_telp'];?></td>
                        <td><?php echo $tamp_pelanggan['status_pelanggan'];?></td>
                        <td>
                          <a href="index.php?p=f_pelanggan&kode_pelanggan=<?php echo $tamp_pelanggan['kode_pelanggan'];?>"><img src="images/gambar/edit.png" class="gbr"></a>
                          <a href="crud/hapus_pelanggan.php?kode_pelanggan=<?php echo $tamp_pelanggan['kode_pelanggan'];?>"><img src="images/gambar/hapus.png" class="gbr"></a>
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