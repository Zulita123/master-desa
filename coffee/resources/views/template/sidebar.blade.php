 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="{{url(config('app.admin_path'))}}">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{url('menu')}}">
            <i class="fa fa-square"></i>
            <span>Menu</span>
          </a>
        </li>
        <li>
          <a href="{{url('petugas')}}">
            <i class="fa fa-user"></i>
            <span>Petugas</span>
          </a>
        </li>
        <li>
          <a href="{{url('pembeli')}}">
            <i class="fa fa-users"></i>
            <span>Pembeli</span>
          </a>
        </li>
        <li>
          <a href="{{url('ongkir')}}">
            <i class="fa fa-motorcycle"></i>
            <span>Ongkir</span>
          </a>
        </li>
        <li>
          <a href="{{url('pemesanan')}}">
            <i class="fa fa-circle"></i>
            <span>Pemesanan</span>
          </a>
        </li>
        <li>
          <a href="{{url('transaksi')}}">
            <i class="fa fa-bank"></i>
            <span>Transaksi</span>
          </a>
        </li>
        <li>
          <a href="{{url('laporan')}}">
            <i class="fa fa-file"></i>
            <span>Laporan</span>
          </a>
        </li>
        <li>
          <a href="{{url('keluar')}}">
            <i class="fa fa-adjust"></i>
            <span>Logout</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>