<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Gudang DKP</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="<?php echo base_url(); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
<<<<<<< HEAD
    <!-- dataTable -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables_themeroller.css">

     <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
=======
    <!-- Datepicker dinar -->
    <link href="<?php echo base_url() ?>assets/bootstrap/css/datepicker.css" rel="stylesheet" type="text/css" />
>>>>>>> 0593b936e284208ff300d4fd7f2392456c4bc28b
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>G</b>DKP</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Gudang</b>DKP</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          

        </nav>
      </header>
            <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url(); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Deni</p>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> <span>Home</span></a></li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-cart-plus"></i><span>Pengadaan Barang</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">

                <li class="active"><a href="#"><i class="fa fa-circle-o"></i>Pengadaan Baru<i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>pengadaanBarangController/pengadaan"><i class="fa fa-circle-o"></i> Pengadaan</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Pemda</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Hibah</a></li>
                  </ul>
                </li>
                <li><a href="index.html"><i class="fa fa-circle-o"></i>Status Barang</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-truck"></i> <span>Penyaluran Barang</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.html"><i class="fa fa-circle-o"></i>Penyaluran Baru</a></li>
                <li><a href="index.html"><i class="fa fa-circle-o"></i>Pelaporan Barang</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-search"></i> <span>Pencarian</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.html"><i class="fa fa-circle-o"></i>Barang</a></li>
                <li><a href="index.html"><i class="fa fa-circle-o"></i>Penanggungjawab Gudang</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span>Report</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.html"><i class="fa fa-circle-o"></i>Rekap Barang</a></li>
                <li><a href="index.html"><i class="fa fa-circle-o"></i>Rekap Penyaluran Barang</a></li>
                <li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i>Bukti Pengeluaran Barang</a></li>
                <li><a href="index.html"><i class="fa fa-circle-o"></i>Kartu Persediaan Barang</a></li>
                <li><a href="index.html"><i class="fa fa-circle-o"></i>Laporan Bulanan</a></li>
                <li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i>Stok Opname</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-gear"></i> <span>Manajemen</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.html"><i class="fa fa-circle-o"></i>Manajemen Barang</a></li>
                <li><a href="index.html"><i class="fa fa-circle-o"></i>Menejemen User</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>