<?php
session_start();
  if(!isset($_SESSION['login_admin'])){
    header("location:login/index.php");
  }
  $status=$_SESSION['login_kode'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>L_Aundry</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.php"><img src="images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>                
              </div>
              <input type="text" class="form-control bg-transparent border-0" placeholder="Search Purple L_Aundry">
            </div>
          </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <img src="images/faces/aku.jpg" alt="image">
                <span class="availability-status online"></span>             
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black">Lailya Meily U.</p>
                <input hidden type="text" name="kode_ptg" id="kode_ptg" value="<?php echo $status;?>">
              </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="#">
                <i class="mdi mdi-cached mr-2 text-success"></i>
                Purple L_Aundri
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="login/logout.php">
                <i class="mdi mdi-logout mr-2 text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
          <li class="nav-item nav-logout d-none d-lg-block">
            <a class="nav-link" href="login/logout.php">
              <i class="mdi mdi-power"></i>
            </a>
          </li>
          <li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="mdi mdi-format-line-spacing"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="images/faces/aku.jpg" alt="profile">
                <span class="login-status online"></span> <!--change to offline or busy as needed-->              
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">Lailya Meily U.</span>
                <span class="text-secondary text-small">L_Aundry Manager</span>
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>
           <?php
              if($_SESSION['status']=="Admin"){
                $pelanggan="";
                $petugas="";
                $jasa="";
                $order="";
                $transaksi="";
                $laporan="";
              }elseif($_SESSION['status']=="Kasir"){
                $pelanggan="hidden";
                $petugas="hidden";
                $jasa="hidden";
                $order="";
                $transaksi="";
                $laporan="hidden";
              }else{
                $pelanggan="hidden";
                $petugas="hidden";
                $jasa="hidden";
                $order="hidden";
                $transaksi="hidden";
                $laporan="";
              }
            ?>            
          <li  class="nav-item">
            <a class="nav-link" href="index.php?p=home">
              <span class="menu-title">Beranda</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
          <li class="nav-item" <?php echo $pelanggan;?>>
            <a class="nav-link" href="index.php?p=pelanggan">
              <span class="menu-title">Pelanggan</span>
              <i class="mdi mdi-account-multiple menu-icon"></i>
            </a>
          </li>
          <li class="nav-item" <?php echo $petugas;?>>
            <a class="nav-link" href="index.php?p=petugas">
              <span class="menu-title">Petugas</span>
              <i class="mdi mdi-account menu-icon"></i>
            </a>
          </li>
          <li class="nav-item" <?php echo $jasa;?>>
            <a class="nav-link" href="index.php?p=jasa">
              <span class="menu-title">Jasa</span>
              <i class="mdi mdi-cup-water menu-icon"></i>
            </a>
          </li>
          <li class="nav-item" <?php echo $order;?>>
            <a class="nav-link" href="index.php?p=order">
              <span class="menu-title">Order</span>
              <i class="mdi mdi mdi-cart menu-icon"></i>
            </a>
          </li>
          <li class="nav-item" <?php echo $transaksi;?>>
            <a class="nav-link" href="index.php?p=transaksi">
              <span class="menu-title">Transaksi</span>
              <i class="mdi mdi-briefcase-check menu-icon"></i>
            </a>
          </li>
          <li class="nav-item" <?php echo $laporan;?>>
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
              <span class="menu-title">Laporan</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-application menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="index.php?p=laporan_pertgl"> Laporan Per-Tanggal </a></li>
                <li class="nav-item"> <a class="nav-link" href="index.php?p=laporan_perbln"> Laporan Per-Bulan </a></li>
                <li class="nav-item"> <a class="nav-link" href="index.php?p=laporan_perthn"> Laporan Per-Tahun </a></li>
                <li class="nav-item"> <a class="nav-link" href="index.php?p=laporan_cucian"> Laporan Cucian </a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12">
            </div>
          </div>
          <?php
            if(empty($_GET['p'])){
              echo "<script>document.location.href='index.php?p=home'</script>";
            }else{
              $p=$_GET['p'];
              include "content/$p.php";
            }
          ?>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap Dash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
  <script type="text/javascript" src="js/validation.js"></script>
</body>

</html>
