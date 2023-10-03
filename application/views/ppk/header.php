<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrasi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/2/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/2/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/2/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/2/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/2/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/2/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/2/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/2/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/2/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/2/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/2/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>DM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Administrasi</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url() ?>assets/1/images/amni-png.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url() ?>assets/1/images/amni-png.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('nama'); ?>
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url().'ppk/logout'; ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>assets/1/images/amni-png.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Kliring</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Ujian KT / Proposal / Skripsi
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() ?>ppk/ajuan"><i class="fa fa-circle-o"></i> Ajuan</a></li>
                    <!-- <li><a href="<?php //echo base_url() ?>ppk/ajuan_prada"><i class="fa fa-circle-o"></i> Ajuan Prada</a></li> -->
                    <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Selesai</a></li> -->
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Prada
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() ?>ppk/ajuan_prada"><i class="fa fa-circle-o"></i> Ajuan</a></li>
                    <!-- <li><a href="<?php //echo base_url() ?>ppk/ajuan_prada"><i class="fa fa-circle-o"></i> Ajuan Prada</a></li> -->
                    <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Selesai</a></li> -->
                  </ul>
                </li>
                 <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> PKL
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() ?>ppk/ajuan_pkl"><i class="fa fa-circle-o"></i> Ajuan</a></li>
                    <!-- <li><a href="<?php //echo base_url() ?>ppk/ajuan_prada"><i class="fa fa-circle-o"></i> Ajuan Prada</a></li> -->
                    <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Selesai</a></li> -->
                  </ul>
                </li>
                 <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i>Turun PKL
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() ?>ppk/ajuan_tpkl"><i class="fa fa-circle-o"></i> Ajuan</a></li>
                    <!-- <li><a href="<?php //echo base_url() ?>ppk/ajuan_prada"><i class="fa fa-circle-o"></i> Ajuan Prada</a></li> -->
                    <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Selesai</a></li> -->
                  </ul>
                </li>
          </ul>
          
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Monitoring</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>ppk/mon_prada"><i class="fa fa-circle-o"></i>Prada</a></li>
            <li><a href="<?php echo base_url() ?>ppk/mon_llsd3"><i class="fa fa-circle-o"></i> Lulus D3</a></li>
            <li><a href="<?php echo base_url() ?>ppk/mon_sbprala"><i class="fa fa-circle-o"></i>SB Prala</a></li>
            <li><a href="<?php echo base_url() ?>ppk/mon_onboard"><i class="fa fa-circle-o"></i>Onboard</a></li>
            <li><a href="<?php echo base_url() ?>ppk/mon_offboard"><i class="fa fa-circle-o"></i>Offboard</a></li>
            <li><a href="<?php echo base_url() ?>ppk/mon_modeling"><i class="fa fa-circle-o"></i>Modeling</a></li>
            <li><a href="<?php echo base_url() ?>ppk/mon_trb"><i class="fa fa-circle-o"></i>TRB</a></li>
             <li><a href="<?php echo base_url() ?>ppk/mon_summary"><i class="fa fa-circle-o"></i>Summary</a></li>

                <!--  <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i>Lulus D3
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu"> -->
                   <!--  <li><a href="<?php //echo base_url() ?>baak/search_smta_nim"><i class="fa fa-circle-o"></i>Kliring by NIM</a></li>
                    <li><a href="<?php //echo base_url() ?>baak/search_smta_cetak"><i class="fa fa-circle-o"></i>Rekap absensi</a></li> -->
                    <!-- <li><a href="<?php //echo base_url() ?>baak/ajuan_pkl"><i class="fa fa-circle-o"></i> Ajuan PKL</a></li> -->
                    <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Selesai</a></li> -->
              <!--     </ul>
                </li> -->
              </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat Datang
        <small>Di Portal UNIMAR AMNI Semarang</small>
      </h1>

    </section>

 
