               
<script type="text/javascript">
  function SubmitFormData() {
    var name = $("#nim").val();
    
    $.post("<?php echo base_url() ?>ajuan_smta_cek", { name: name },
    function(data) {
   $('#results').html(data);
   // $('#myForm')[0].reset();
    });
}
  
 </script>

     <form name="form1" id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>proses_smta">
      <?php foreach($catar as $c){    ?>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">NIM</label>
                      <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM" value="<?php echo $nim; ?>" style="width:50%;" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nsms" value="<?php echo $nama; ?>" style="width:50%;" readonly>
                    </div>
                   
                     <div class="form-group">
                      <label for="exampleInputPassword1">Program Studi</label>
                      <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" placeholder="Program Studi" value="<?php echo $prodi ?>" style="width:70%;" readonly>
                      <input type="hidden" class="form-control" id="prodi" name="prodi" placeholder="Program Studi" value="<?php echo $kode_prodi ?>" style="width:70%;" readonly>
                    </div>             
                </div>
                
                  <div class="col-md-12">
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">Condensed Full Width Table</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body no-padding">
                        <table class="table table-condensed">
                          <tbody><tr>
                            <th style="width: 10px">#</th>
                            <th>Task</th>
                            <th>Progress</th>
                            <th style="width: 40px">Label</th>
                          </tr>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td>
                              <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                              </div>
                            </td>
                            <td><span class="badge bg-red">55%</span></td>
                          </tr>
                        </tbody></table>
                      </div>
                      <!-- /.box-body -->
                    </div>
                  </div>
                <?php } ?> 

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>