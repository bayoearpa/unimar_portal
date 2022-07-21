

      <!-- Main content -->
      <section class="content">
        <!-- <div class="callout callout-info">
          <h4>Tip!</h4>

          <p>Add the layout-top-nav class to the body tag to get this layout. This feature can also be used with a
            sidebar! So use this class if you want to remove the custom dropdown menus from the navbar and use regular
            links instead.</p>
        </div> -->
      <!--   <div class="callout callout-danger">
          <h4>Warning!</h4>

          <p>The construction of this layout differs from the normal one. In other words, the HTML markup of the navbar
            and the content will slightly differ than that of the normal layout.</p>
        </div> -->
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Pengajuan Semester Antara</h3>
          </div>
          <div class="box-body">
                  <!-- row -->
      <div class="row">
        <div class="col-md-12">

          <!-- konten -->
           <?php 
    echo validation_errors(); 
    echo $this->session->flashdata('success');
    echo $this->session->flashdata('error');?>
  <div class="callout callout-danger">
    <p>Tata Cara Pengisian Form Pengajuan Semester Antara :</p>
    <ul>
      <li>Masukkan NIM / NRP anda pada form dibawah ini.</li>
      <li>Setelah diisi silakan klik tombol "CEK" lalu akan muncul data kalian</li>
      <li>Pilihlah semester yang ingin kalian ulang perkuliahannya, setelah itu akan muncul tabel mata kuliah</li>
      <li>Pilihlah mata kuliah yang ingin diulang. </li>
      <li>Setelah semua sudah diisi klik tombol "SIMPAN" untuk menyimpan hasil pengisian form pengajuan</li>
    </ul>
  </div>
  <form name="form2" id="form2" method="post" enctype="multipart/form-data" action="#">
    <a href="<?php echo base_url() ?>semestera"><button type="button" class="btn bg-olive margin"><i class="fa fa-fw fa-long-arrow-left"></i>Kembali ke Halaman Semster Ajuan</button></a>

    <div class="form-group">
      <label for="exampleInputEmail">NRP</label>
      <input type="text" class="form-control" id="nim_cek" name="nim_cek" placeholder="Masukan NRP / NIM anda">
    </div>
      <input type="button" class="btn btn-block btn-success" id="cek" name="cek" style="width:20%;" value="Cek" onclick="SubmitFormData()">
  </form>
        
    
      <div id="results"></div><!-- /.div result -->
      <!-- <button type="submit" class="btn btn-primary">Simpan</button>         -->

  <script type="text/javascript">

function SubmitFormData() {
    var name = $("#nim_cek").val();
    
    $.post("<?php echo base_url() ?>ajuan_smta_cek", { name: name },
    function(data) {
   $('#results').html(data);
   // $('#myForm')[0].reset();
    });
}


 </script>
       <!-- /.konten -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
 