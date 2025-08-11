<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Portal UNIMAR AMNI Semarang</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo base_url() ?>" class="navbar-brand"><b>UNIMAR</b>AMNI</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url() ?>">Home</a></li>
            <!-- <li><a href="#">Link</a></li> -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kliring <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url() ?>ujianakhir">Ujian Karya Tulis / Proposal / Skripsi</a></li>
                <li><a href="<?php echo base_url() ?>uas">Ujian Akhir Semester (UAS)</a></li>
                <li><a href="<?php echo base_url() ?>prada">Prada</a></li>
                <li><a href="<?php echo base_url() ?>semestera">Semester Antara</a></li>
                <li><a href="<?php echo base_url() ?>pkl">PKL</a></li>
                <li><a href="<?php echo base_url() ?>tpkl">Turun PKL</a></li>
              </ul>
            </li>
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kuesioner<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
               <!--  <li><a href="<?php //echo base_url() ?>kues_mhdsn">Mahatar ke Dosen</a></li>
                <li><a href="<?php //echo base_url() ?>kues_mhlem">Mahatar ke Lemdik</a></li> -->
                <li><a href="<?php echo base_url() ?>kues_tenlem">Tendik ke Lemdik</a></li>
                <li><a href="<?php echo base_url() ?>kues_dsnlem">Dosen ke Lemdik</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kegiatan MAHATAR<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="https://forms.gle/aVBCkPjMYRq4HLiv5" target="__blank">Upload Data Prestasi</a></li>
                <li><a href="https://forms.gle/Yz2Nx89qbQLuSDPi7" target="__blank">Upload Data Kegiatan MAHATAR</a></li>
              </ul>
            </li>
            <li><a href="<?php echo base_url() ?>mahasiswa">Login</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="<?php echo base_url() ?>mahasiswa">
                <!-- The user image in the navbar-->
               
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">Login</span>
              </a>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Portal
          <small>UNIMAR AMNI Semarang</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
      </section>