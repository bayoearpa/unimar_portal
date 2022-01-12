               
<script type="text/javascript">
  function SubmitFormData() {
    var name = $("#nim").val();
    
    $.post("<?php echo base_url() ?>ajuan_smta_cek", { name: name },
    function(data) {
   $('#results').html(data);
   // $('#myForm')[0].reset();
    });
}
  var getsmt1=0;
var getsmt2=0;
var getsmt3=0;
var getsmt4=0;
var getsmt5=0;
var getsmt6=0;
var getsmt7=0;
var getsmt8=0;
var getsmt20=0;

 function getsmt1Class(){
        if (document.form1.smt1.checked==true){
            // document.form1.bstValue.value = document.form1.bstHidden.value;
            getsmt1=document.form1.smt1.value;
        } else {
            document.form1.smt1.value = null;
            getsmt1=0;
        }
        jml_smt();
       
    }
    function getsmt2Class(){
        if (document.form1.smt2.checked==true){
            // document.form1.bstValue.value = document.form1.bstHidden.value;
            getsmt2=document.form1.smt2.value;
        } else {
            document.form1.smt2.value = null;
            getsmt2=0;
        }
        jml_smt();
       
    }
    function getsmt3Class(){
        if (document.form1.smt3.checked==true){
            // document.form1.bstValue.value = document.form1.bstHidden.value;
            getsmt3=document.form1.smt3.value;
        } else {
            document.form1.smt3.value = null;
            getsmt3=0;
        }
        jml_smt();
       
    }
    function getsmt4Class(){
        if (document.form1.smt4.checked==true){
            // document.form1.bstValue.value = document.form1.bstHidden.value;
            getsmt4=document.form1.smt4.value;
        } else {
            document.form1.smt4.value = null;
            getsmt4=0;
        }
        jml_smt();
       
    }
    function getsmt5Class(){
        if (document.form1.smt5.checked==true){
            // document.form1.bstValue.value = document.form1.bstHidden.value;
            getsmt5=document.form1.smt5.value;
        } else {
            document.form1.smt5.value = null;
            getsmt5=0;
        }
        jml_smt();
       
    }
    function getsmt6Class(){
        if (document.form1.smt6.checked==true){
            // document.form1.bstValue.value = document.form1.bstHidden.value;
            getsmt6=document.form1.smt6.value;
        } else {
            document.form1.smt6.value = null;
            getsmt6=0;
        }
        jml_smt();
       
    }
    function getsmt7Class(){
        if (document.form1.smt7.checked==true){
            // document.form1.bstValue.value = document.form1.bstHidden.value;
            getsmt7=document.form1.smt7.value;
        } else {
            document.form1.smt7.value = null;
            getsmt7=0;
        }
        jml_smt();
       
    }
    function getsmt8Class(){
        if (document.form1.smt8.checked==true){
            // document.form1.bstValue.value = document.form1.bstHidden.value;
            getsmt8=document.form1.smt8.value;
        } else {
            document.form1.smt8.value = null;
            getsmt8=0;
        }
        jml_smt();
       
    }
    function getsmt20Class(){
        if (document.form1.smt20.checked==true){
            // document.form1.bstValue.value = document.form1.bstHidden.value;
            getsmt20=document.form1.smt20.value;
        } else {
            document.form1.smt20.value = null;
            getsmt20=0;
        }
        jml_smt();
       
    }

function jml_smt(){

    document.form1.jml_smt.value=(
    parseInt(getsmt1)+
     parseInt(getsmt2)+
      parseInt(getsmt3)+
       parseInt(getsmt4)+
        parseInt(getsmt5)+
         parseInt(getsmt6)+
          parseInt(getsmt7)+
           parseInt(getsmt8)+
    parseInt(getsmt20));
    
    
}

$(document).ready(function(){
   

$('#smt1').change(function(){
        if(this.checked)
            $('#tblsmt1').fadeIn('slow');
        else
            $('#tblsmt1').fadeOut('slow');

    });
$('#smt2').change(function(){
        if(this.checked)
            $('#tblsmt2').fadeIn('slow');
        else
            $('#tblsmt2').fadeOut('slow');

    });
$('#smt3').change(function(){
        if(this.checked)
            $('#tblsmt3').fadeIn('slow');
        else
            $('#tblsmt3').fadeOut('slow');

    });
$('#smt4').change(function(){
        if(this.checked)
            $('#tblsmt4').fadeIn('slow');
        else
            $('#tblsmt4').fadeOut('slow');

    });
$('#smt5').change(function(){
        if(this.checked)
            $('#tblsmt5').fadeIn('slow');
        else
            $('#tblsmt5').fadeOut('slow');

    });
$('#smt6').change(function(){
        if(this.checked)
            $('#tblsmt6').fadeIn('slow');
        else
            $('#tblsmt6').fadeOut('slow');

    });
$('#smt7').change(function(){
        if(this.checked)
            $('#tblsmt7').fadeIn('slow');
        else
            $('#tblsmt7').fadeOut('slow');

    });

$('#smt20').change(function(){
        if(this.checked)
            $('#tblsmt20').fadeIn('slow');
        else
            $('#tblsmt20').fadeOut('slow');

    });
});
 </script>
  <?php foreach($catar as $c){    ?>
     <form name="form1" id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>proses_smta">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">NIM</label>
                      <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM" value="<?php echo $c->NIM; ?>" style="width:50%;" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nsms" value="<?php echo $c->Nama_mahasiswa; ?>" style="width:50%;" readonly>
                    </div>
                   
                     <div class="form-group">
                      <label for="exampleInputPassword1">Program Studi</label>
                      <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" placeholder="Program Studi" value="<?php echo $prodi ?>" style="width:70%;" readonly>
                      <input type="hidden" class="form-control" id="prodi" name="prodi" placeholder="Program Studi" value="<?php echo $kdprodi ?>" style="width:70%;" readonly>
                    </div>
  <?php } ?>              
                   
                 
                   </div>
                   <div class="col-md-6">
                     <div class="form-group">
                    <label>
                      <input type="checkbox" name="smt1" id="smt1" value="1" class="minimal" onclick="getsmt1Class()">
                      Semester 1
                    </label>
                  </div>
                  <div class="form-group">
                    <label>
                      <input type="checkbox" name="smt2" id="smt2" value="1" class="minimal" onclick="getsmt2Class()">
                      Semester 2
                    </label>
                  </div>
                  <div class="form-group">
                    <label>
                      <input type="checkbox" name="smt3" id="smt3" value="1" class="minimal" onclick="getsmt3Class()">
                      Semester 3
                    </label>
                  </div>
                  <div class="form-group">
                    <label>
                      <input type="checkbox" name="smt4" id="smt4" value="1" class="minimal" onclick="getsmt4Class()">
                      Semester 4
                    </label>
                  </div>
                  <div class="form-group">
                    <label>
                      <input type="checkbox" name="smt5" id="smt5" value="1" class="minimal" onclick="getsmt5Class()">
                      Semester 5
                    </label>
                  </div>
                  <div class="form-group">
                    <label>
                      <input type="checkbox" name="smt6" id="smt6" value="1" class="minimal" onclick="getsmt6Class()">
                      Semester 6
                    </label>
                  </div>
                  <div class="form-group">
                    <label>
                      <input type="checkbox" name="smt7" id="smt7" value="1" class="minimal" onclick="getsmt7Class()">
                      Semester 7
                    </label>
                  </div>
                  <div class="form-group">
                    <label>
                      <input type="checkbox" name="smt8" id="smt8" value="1" class="minimal" onclick="getsmt8Class()">
                      Semester 8
                    </label>
                  </div>
                  <div class="form-group">
                    <label>
                      <input type="checkbox" name="smt20" id="smt20" value="1" class="minimal" onclick="getsmt20Class()">
                      Semester Martikulasi
                    </label>
                  </div>
                  <input type="hidden" name="jml_smt" id="jml_smt">
                  <div class="box-footer">
                  *pilih semester yang akan diulang perkuliahannya</div>
                   </div>
<!-- .......................................................................................................................batas -->
                    <div class="div-col-md-12">
                   <!-- div untuk semester -->
                     <div id="tblsmt1" style="display:none">
                      <h3 class="box-title">Semester 1 </h3>
                       <table class="table table-bordered" style="width:25%;">
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Nama Mata Kuliah</th>
      <th>SKS</th>
                      <th>Pilih</th>
                   </tr>
                   <?php 
                    $no=1;
                    foreach($kliring->getmakulfromkurikulum($kdprodi, $kdkur, "1") as $value3){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $value3->nama_makul ?></td>
                      <td><?php echo $value3->sks ?> <input type="hidden" name="sks" value="<?php echo $value3->sks ?>"></td>
                      <td>
                      <label>
                      <input type="checkbox" name="makul[]" value="<?php  echo $value3->kode_makul ?>" class="minimal">
                      </label></td>  
                    </tr>
                    <?php } ?>
                  </table>
                    
                     </div> 
                        <!-- end div semester     -->
    <!-- div untuk semester -->
                     <div id="tblsmt2" style="display:none">
                      <h3 class="box-title">Semester 2 </h3>
                       <table class="table table-bordered" style="width:25%;">
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Nama Mata Kuliah</th>
      <th>SKS</th>
                      <th>Pilih</th>
                   </tr>
                   <?php 
                    $no=1;
                    foreach($kliring->getmakulfromkurikulum($kdprodi, $kdkur, "2") as $value3){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $value3->nama_makul ?></td>
                      <td><?php echo $value3->sks ?> <input type="hidden" name="sks" value="<?php echo $value3->sks ?>"></td>
                      <td>
                      <label>
                      <input type="checkbox" name="makul[]" value="<?php  echo $value3->kode_makul ?>" class="minimal">
                      </label></td>  
                    </tr>
                    <?php } ?>
                  </table>
                    
                     </div> 
                        <!-- end div semester     -->
                     <!-- div untuk semester -->
                     <div id="tblsmt3" style="display:none">
                      <h3 class="box-title">Semester 3 </h3>
                       <table class="table table-bordered" style="width:25%;">
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Nama Mata Kuliah</th>
                      <th>SKS</th>
                      <th>Pilih</th>
                   </tr>
                   <?php 
                    $no=1;
                    foreach($kliring->getmakulfromkurikulum($kdprodi, $kdkur, "3") as $value3){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $value3->nama_makul ?></td>
                      <td><?php echo $value3->sks ?> <input type="hidden" name="sks" value="<?php echo $value3->sks ?>"></td>
                      <td>
                      <label>
                      <input type="checkbox" name="makul[]" value="<?php  echo $value3->kode_makul ?>" class="minimal">
                      </label></td>  
                    </tr>
                    <?php } ?>
                  </table>
                    
                     </div> 
                        <!-- end div semester     -->
    <!-- div untuk semester -->
                     <div id="tblsmt4" style="display:none">
                      <h3 class="box-title">Semester 4 </h3>
                       <table class="table table-bordered" style="width:25%;">
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Nama Mata Kuliah</th>
                      <th>SKS</th>
                      <th>Pilih</th>
                   </tr>
                   <?php 
                    $no=1;
                    foreach($kliring->getmakulfromkurikulum($kdprodi, $kdkur, "4") as $value3){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $value3->nama_makul ?></td>
                      <td><?php echo $value3->sks ?> <input type="hidden" name="sks" value="<?php echo $value3->sks ?>"></td>
                      <td>
                      <label>
                     <input type="checkbox" name="makul[]" value="<?php  echo $value3->kode_makul ?>" class="minimal">
                      </label></td>  
                    </tr>
                    <?php } ?>
                  </table>
                    
                     </div> 
                        <!-- end div semester     -->
                        <!-- div untuk semester -->
                     <div id="tblsmt5" style="display:none">
                      <h3 class="box-title">Semester 5 </h3>
                       <table class="table table-bordered" style="width:25%;">
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Nama Mata Kuliah</th>
                      <th>SKS</th>
                      <th>Pilih</th>
                   </tr>
                   <?php 
                    $no=1;
                    foreach($kliring->getmakulfromkurikulum($kdprodi, $kdkur, "5") as $value3){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $value3->nama_makul ?></td>
                      <td><?php echo $value3->sks ?> <input type="hidden" name="sks" value="<?php echo $value3->sks ?>"></td>
                      <td>
                      <label> 
                     <input type="checkbox" name="makul[]" value="<?php  echo $value3->kode_makul ?>" class="minimal">
                      </label></td>  
                    </tr>
                    <?php } ?>
                  </table>
                    
                     </div> 
                        <!-- end div semester     -->
    <!-- div untuk semester -->
                     <div id="tblsmt6" style="display:none">
                      <h3 class="box-title">Semester 6 </h3>
                       <table class="table table-bordered" style="width:25%;">
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Nama Mata Kuliah</th>
                      <th>SKS</th>
                      <th>Pilih</th>
                   </tr>
                   <?php 
                    $no=1;
                    foreach($kliring->getmakulfromkurikulum($kdprodi, $kdkur, "6") as $value3){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $value3->nama_makul ?></td>
                      <td><?php echo $value3->sks ?> <input type="hidden" name="sks" value="<?php echo $value3->sks ?>"></td>
                      <td>
                      <label>
                     <input type="checkbox" name="makul[]" value="<?php  echo $value3->kode_makul ?>" class="minimal">
                      </label></td>  
                    </tr>
                    <?php } ?>
                  </table>
                    
                     </div> 
                        <!-- end div semester     -->
                        <!-- div untuk semester -->
                     <div id="tblsmt7" style="display:none">
                      <h3 class="box-title">Semester 7 </h3>
                       <table class="table table-bordered" style="width:25%;">
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Nama Mata Kuliah</th>
                      <th>SKS</th>
                      <th>Pilih</th>
                   </tr>
                   <?php 
                    $no=1;
                    foreach($kliring->getmakulfromkurikulum($kdprodi, $kdkur, "7") as $value3){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $value3->nama_makul ?></td>
                      <td><?php echo $value3->sks ?> <input type="hidden" name="sks" value="<?php echo $value3->sks ?>"></td>
                      <td>
                      <label>
                      <input type="checkbox" name="makul[]" value="<?php  echo $value3->kode_makul ?>" class="minimal">
                      </label></td>  
                    </tr>
                    <?php } ?>
                  </table>
                    
                     </div> 
                        <!-- end div semester     -->
                        
                   </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>