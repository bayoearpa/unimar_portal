<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Portal UNIMAR</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="skin-blue layout-top-nav" style="height: auto; min-height: 100%">
  <style>
body {
  background-color: #E6E6FA ;
}
</style>
<div class="wrapper" style="height: auto; min-height: 100%;min-width: 100%">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand">
            <!-- <span><img src="<?php //echo base_url() ?>assets/1/images/amni-png.png" width="2%"></span> -->
            <b>UNIMAR</b>AMNI</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

       <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url() ?>uas">Home</a></li>
            <li><a href="<?php echo base_url() ?>permohonanuas">Form Pengajuan</a></li>
          </ul>
          <!--  <ul class="nav navbar-nav">
            <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Link</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul> -->
        </div>
        <!-- /.navbar-collapse -->
       
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
</div>

      
      <div class="container-wrapper" style="min-height: 501px">
        <div class="container">
        <section class="content">
  

   <div class="box box-default">
   
            <div class="box-header">
              <h3 class="box-title">Pengajuan Ujian Akhir Semester</h3>
            </div>       
<div class="box-body">
  <?php 
    // echo validation_errors(); 
    
    if ($this->session->flashdata('success') > "0") {
      # code...
      echo "<div class='alert alert-success'>".$this->session->flashdata('success')."</div>";
    }
     if ($this->session->flashdata('error') > "0") {
      # code...
      echo "<div class='alert alert-danger'>".$this->session->flashdata('error')."</div>";
    }
    ?>
  <form name="form1" id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>pencarianpengajuanuas">
   
    
    <div class="callout callout-danger">
      <p>Tata Cara Kliring UAS :</p>
      <ol>
          <li>Masukan NIM/NRP anda pada form diatas.</li>
          <li>Jika data tidak ditemukan, klik menu <b>form pengajuan</b> dan isi datanya.</li>
          <li>setelah selesai input pengajuan, silakan cek kembali pada menu home, lalu masukan NIM/NRP.</li>
          <li>ketika data telah muncul harap menguhubungi pihak terkait untuk melakukan kliring hinga "ACC".</li>
          <li>jika terjadi Error pada pengajuan dapat menghubungi IT (nomor tertera di bawah).</li>
      </ol>
    </div>
    <div class="callout callout-info">
       <div class="form-group">
      <p><b>Kontak yang dapat dihubungi:</b> </p>
      <table>
        <tr>
          <td><b>IT</b></td>
          <td>:</td>
          <td>082220220573 (Bayu)</td>
        </tr>
         <tr>
          <td><b>Mahatar</b></td>
          <td>:</td>
          <td>081312606684 (Pak Iwan Samsul)</td>
        </tr>
         <tr>
          <td><b>Keuangan</b></td>
          <td>:</td>
          <td>082241613131 (Aisah)</td>
        </tr>
        <!-- <tr>-->
        <!--  <td><b>BAAK</b></td>-->
        <!--  <td>:</td>-->
        <!--  <td>085876516196 (Rima)</td>-->
        <!--</tr>-->
      </table>
      </div>  
    </div>
    <a href="<?php echo base_url() ?>permohonanuas"><button type="button" class="btn bg-orange btn-flat margin">Form Pengajuan UAS</button></a>
     <div class="form-group">
      <label for="exampleInputEmail">Masukan NIM anda untuk cek proses kliring</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan NIM anda">
    </div> 
        <button type="submit" class="btn btn-primary">Cari</button>        
  

 