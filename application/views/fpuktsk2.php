<!DOCTYPE html>
<html lang="en">
<head>
	<title>FORMULIR PENDAFTARAN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <script src="<?php echo base_url() ?>assets/1/lib/plugins/jQuery/jQuery-2.1.4.min.js"></script>
 <script src="<?php echo base_url() ?>assets/1/lib/plugins/datepicker/bootstrap-datepicker.js"></script>
 <!-- datepicker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/1/lib/plugins/datepicker/datepicker3.css">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/1/images/icons/amni2.jpg"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/1/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/1/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/1/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/1/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/1/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/1/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/1/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/1/vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/1/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/1/css/main.css">
<!--===============================================================================================-->
</head>
<body>


<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form">
				<span class="contact100-form-title">
					FORMULIR PERMOHONAN UJIAN KARYA TULIS, PROPOSAL atau SKRIPSI
				</span>

			</form>
		</div>
	</div>



    <form class="contact100-form validate-form" action="<?php echo base_url() ?>permohonanujianakhirp" method="post">
<div class="container-contact100">
		<div class="wrap-contact100">
		<?php 
		echo validation_errors(); 
		echo $this->session->flashdata('success');
		echo $this->session->flashdata('error');?>
	<div class="wrap-input100 validate-input bg1" data-validate="Harap isi Nama anda!">
					<span class="label-input100">Nama *</span>
					<span class="label-input100"><?php echo form_error('nama'); ?></span>
					<input class="input100" type="text" name="nama" placeholder="Isi nama Lengkap dan Gelar">
			</div>
		</div>

<div class="container-contact100">
		<div class="wrap-contact100">
	<div class="wrap-input100 validate-input bg1" data-validate="Harap isi Nama anda!">
					<span class="label-input100">Semester *</span>
					<span class="label-input100"><?php echo form_error('semester'); ?></span>
					<input class="input100" type="text" name="semester" onkeypress="return hanyaAngka(event)" maxlength="2" placeholder="Isi Menggunakan Angka">
					<script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
		    return false;
		  return true;
		}
	</script>
			</div>
		</div>

<div class="container-contact100">
		<div class="wrap-contact100">
	<div class="wrap-input100 validate-input bg1" data-validate="Harap isi Nama NRP anda!">
					<span class="label-input100">NRP *</span>
					<span class="label-input100"><?php echo form_error('nim'); ?></span>
					<input class="input100" type="text" name="nim" placeholder="Isi nama Lengkap dan Gelar">
			</div>
		</div>

<div class="container-contact100">
		<div class="wrap-contact100"> 
                  <div class="box-body">
                  <div class="form-group">
                  	<div class="wrap-input100 validate-input bg1" data-validate="Harap isi Nama Prodi anda!">
						 <div class="label-input100">Prodi *</div>
						 <span class="label-input100"><?php echo form_error('jenjang'); ?></span>
						 <span class="label-input100"><?php echo form_error('prodi'); ?></span>
                     	<div>

						 
            <input type="radio" name="jenjang" id="d3" value="1" class="minimal status">
                    D3
                      </div>
                      		<div id="tblsmt1" style="display:none">
	  <select name='prodi' id="prodi">
	  	<option value='-'>---</option>
		<option value='92401'>Kpn</option>
		<option value='92402'>Teknika</option>
		<option value='92403'>Nautika</option>
	  </select>
	  </p>
					</div>

            <input type="radio" name="jenjang" id="s1" value="2" class="minimal status">
                    S1                 
                      <div id="tblsmt2" style="display:none">
	  <select name='prodi' id="prodi">
	  	<option value='-'>---</option>
		<option value='61201'>Transportasi</option>
		<option value='21207'>Teknik Transportasi Laut</option>
		   <option value='21201'>Teknik Mesin</option>
		   <option value='13241'>Teknik Keselamatan</option>
		   <option value='94205'>Perdagangan Internasional</option>
	  </select>
	  </p>
                  </div>  


        </div>
</div>
</div></div>

<div class="container-contact100">
		<div class="wrap-contact100">
	<div class="wrap-input100 validate-input bg1" data-validate="Harap isi Judul Karya Anda!">
					<span class="label-input100">Judul Karya Tulis/Laporan Prada *</span>
					<span class="label-input100"><?php echo form_error('karya'); ?></span>
					<textarea rows="5" cols="40" class="input100" type="text" name="karya" placeholder="Isi Judul Karya"></textarea>
			</div>
		</div>


<div class="container-contact100">
		<div class="wrap-contact100">
	<div class="wrap-input100 validate-input bg1" data-validate="Harap isi Pembimbing Anda!">
					<span class="label-input100">Pembimbing 1 *</span>
					<span class="label-input100"><?php echo form_error('pembimbing1'); ?></span>
					<input class="input100" type="text" name="pembimbing1" placeholder="Pembimbing 1 (Ketikkan nama lengkap beserta gelar)">
			</div>
		</div>

<div class="container-contact100">
		<div class="wrap-contact100">
	<div class="wrap-input100 validate-input bg1" data-validate="Harap isi Pembimbing Anda!">
					<span class="label-input100">Pembimbing 2 *</span>
					<span class="label-input100"><?php echo form_error('pembimbing2'); ?></span>
					<input class="input100" type="text" name="pembimbing2" placeholder="Pembimbing 2 (Ketikkan nama lengkap beserta gelar)">
			</div>
		</div>


<div class="container-contact100">
		<div class="wrap-contact100">
	<div class="wrap-input100 validate-input bg1" data-validate="Harap isi Pembimbing Anda!">
					<span class="label-input100">Pembimbing 3 *</span>
					<span class="label-input100"><?php echo form_error('pembimbing3'); ?></span>
					<input class="input100" type="text" name="pembimbing3" placeholder="Pembimbing 3 (wajib diisi untuk jenjang S1)">
			</div>
		</div>


	<div class="container-contact100">
				<div class="wrap-contact100">
					<div class="wrap-input100 validate-input bg1" data-validate="Harap Melengkapi Formulir!">
						<button type="submit" class="input100">Klik Untuk Mengajukan</button>
						</div>
					</div>
                    
                    </div> 

    </form>



<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/1/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/1/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/1/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url() ?>assets/1/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/1/vendor/select2/select2.min.js"></script>
	<script>

		$(document).ready(function(){
		  $("#js-select2").click(function(){
		    $("#js-show-service").slideDown("slow");
		    
		  });
		});
		// $(".js-select2").each(function(){
		// 	$(this).select2({
		// 		minimumResultsForSearch: 20,
		// 		dropdownParent: $(this).next('.dropDownSelect2')
		// 	});


		// 	$(".js-select2").each(function(){
		// 		$(this).on('select2:close', function (e){
		// 			if($(this).val() == "Please chooses") {
		// 				$('.js-show-service').slideUp();
		// 			}
		// 			else {
		// 				$('.js-show-service').slideUp();
		// 				$('.js-show-service').slideDown();
		// 			}
		// 		});
		// 	});
		// })
	</script>



	<script>
				// $(this).on('select2:close', function (e){
				// 	if($(this).val() == "Please chooses") {
				// 		$('.js-show-service2').slideUp();
				// 	}
				// 	else {
				// 		$('.js-show-service2').slideUp();
				// 		$('.js-show-service2').slideDown();
				// 	}
				// });
	</script>	
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/1/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url() ?>assets/1/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/1/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/1/vendor/noui/nouislider.min.js"></script>
	<script>
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 1500, 3900 ],
	        connect: true,
	        range: {
	            'min': 1500,
	            'max': 7500
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]);
	        $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
	        $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
	    });
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<script type="text/javascript">
 $(document).ready(function(){

$('.status').on('click', function(){

  if($(this).val() == '1') {
    $('#tblsmt1').fadeIn(700);
  } else {
    $('#tblsmt1').fadeOut(700);  
  }



});   

});




</script>

<script type="text/javascript">
 $(document).ready(function(){

$('.status').on('click', function(){

  if($(this).val() == '2') {
    $('#tblsmt2').fadeIn(700);
  } else {
    $('#tblsmt2').fadeOut(700);  
  }



});   

});




</script>

</body>
</html>
