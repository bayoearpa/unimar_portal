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
        <div class="navbar-header" align="left" width="100%">
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
            <li><a href="<?php echo base_url() ?>">Home</a></li>
            <li><a href="<?php echo base_url() ?>permohonanujianakhir">Form Pengajuan</a></li>
          </ul>
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
              <h3 class="box-title">Form Pengajuan Kliring, Proposal dan Skripsi</h3>
            </div>       
<div class="box-body">
  <?php 
    echo validation_errors(); 
    echo $this->session->flashdata('success');
    echo $this->session->flashdata('error');?>
	<form name="form1" id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>permohonanujianakhirp">
		<div class="form-group">
			<label for="exampleInputEmail">Nama</label>
			<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Anda">
		</div>
	
		<div class="form-group">
			<label for="exampleInputEmail">NRP</label>
			<input type="text" class="form-control" id="nim" name="nim" placeholder="Masukan Nama Anda">
		</div>


		<div class="form-group">
			<label for="exampleInputEmail">Semester</label>
			<input type="text" class="form-control" id="semester" name="semester" onkeypress="return hanyaAngka(event)" maxlength="2" placeholder="Masukan Semester Anda">
			<script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
		    return false;
		  return true;
		}
	</script>
		</div>

            
        <div class="form-group">
        <label for="exampleInputEmail">Prodi</label>
        	
          <div class="radio">
        		<label>
        			<input type="radio" name="jenjang" id="d3" value="1" onclick="Hide('tblsmt2', this); Reveal('tblsmt1', this)">
        			D3
        		</label>
        	</div>
        		<div id="tblsmt1" style="display:none">
              
	  <select name='prodi1' id="prodi" class="form-control">
	  	<option value='-'>---</option>
		<option value='92401'>Kpn</option>
    <option value='92402'>Teknika</option>
    <option value='92403'>Nautika</option>
	  </select>
	  </p>
</form>
</div>
        <div class="radio">
         <label>
           <input type="radio" name="jenjang" id="s1" value="2"  onclick="Hide('tblsmt1', this); Reveal('tblsmt2', this)">
             S1   
           </label>
           </div>              
             <div id="tblsmt2" style="display:none">
              
    <select name='prodi2' id="prodi" class="form-control">
      <option value='-'>---</option>
   <option value='61201'>Transportasi</option>
   <option value='21207'>Teknik Transportasi Laut</option>
   <option value='21201'>Teknik Mesin</option>
   <option value='13241'>Teknik Keselamatan</option>
   <option value='94205'>Perdagangan Internasional</option>
    </select>
    </p>
</form>
</div>

<script type="text/javascript">
  function Reveal(it, box) {
    var vis = (box.checked) ? "block" : "none";
    document.getElementById(it).style.display = vis;
  }

  function Hide(it, box) {
    var vis = (box.checked) ? "none" : "none";
    document.getElementById(it).style.display = vis;
  }
</script>


   		<div class="form-group">
			<label for="exampleInputEmail">Judul Karya Tulis/Laporan Prada</label>
			<textarea class="form-control" id="karya" name="karya"  placeholder="Masukan Judul Karya Anda"></textarea>
		</div>

		<div class="form-group">
			<label for="exampleInputEmail">Penguji 1</label>
			<input type="text" class="form-control" id="pembimbing1" name="pembimbing1" placeholder="Masukan Pembimbing Anda">
		</div>

        <div class="form-group">
			<label for="exampleInputEmail">Penguji 2</label>
			<input type="text" class="form-control" id="pembimbing2" name="pembimbing2" placeholder="Masukan Pembimbing Anda">
		</div>   
           
        <div class="form-group">
			<label for="exampleInputEmail">Penguji 3</label>
			<input type="text" class="form-control" id="pembimbing3" name="pembimbing3" placeholder="Masukan Pembimbing Anda">
		</div>      
             
        <button type="submit" class="btn btn-primary">Simpan</button>        
  
</div>

</div>
</div>

</div>

		<footer class="main-footer">
      <div class="container">
			<div class="pull-right hidden-xs">
      <b>Version</b>
      1.0.0
			</div>
			<strong>Copyright © 2019 IT-STIMART "AMNI" Semarang. </strong>
      All rights reserved
		</footer>         
                    
   




<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/2/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>assets/2/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/2/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url() ?>assets/2/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url() ?>assets/2/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>assets/2/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url() ?>assets/2/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/2/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>assets/2/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() ?>assets/2/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/2/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>assets/2/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>assets/2/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>assets/2/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/2/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/2/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>assets/2/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/2/dist/js/demo.js"></script>
</body>
</html>
