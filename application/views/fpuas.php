
      <div class="container-wrapper" style="min-height: 501px">
      	<div class="container">
      	<section class="content">
  

   <div class="box box-default">
   
            <div class="box-header">
              <h3 class="box-title">Form Pengajuan Kliring Ujian Akhir Semester (UAS)</h3>
            </div>       
<div class="box-body">
  <?php 
    echo validation_errors(); 
    echo $this->session->flashdata('success');
    echo $this->session->flashdata('error');?>
	<form name="form1" id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>permohonanuasp">
    <?php //echo $lihatstatsperiode; ?>
		<div class="form-group">
			<label for="exampleInputEmail">NIM / NRP</label>
      <input type="hidden" name="ta" id="ta" value="<?php echo $ta ?>">
			<input type="text" class="form-control" id="nim" name="nim" placeholder="Masukan NIM / NRP Anda">
		</div>
	
		<div class="form-group">
			<label for="exampleInputEmail">Semester</label>
			<input type="text" class="form-control" id="semester" name="semester" onkeypress="return hanyaAngka(event)" maxlength="2" placeholder="Masukan Semester Anda dengan angka contoh : 1, 2,... dst">
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
      <label for="exampleInputEmail">Kelas</label>
      <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukan Kelas Contoh : A, B, C ...dst ">
      <input type="hidden" class="form-control" id="jenis_uas" name="jenis_uas" placeholder="Masukan Kelas Contoh : A, B, C ...dst " value="susulan">
    </div>
    

             
        <button type="submit" class="btn btn-primary">Simpan</button>        
  
</div>

</div>
</div>

</div>
