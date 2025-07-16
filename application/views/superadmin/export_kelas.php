    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Export data Peserta</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                  <div class="box-body">
                    <!-- <form method="post" action="<?php //echo base_url() ?>koperasi/preview_cetak"> -->
                    <form id="previewForm">
                    <div class="form-group">
                    <label> Pilih Periode Kelas</label>
                    <select name="kelas" id="kelas" class="form-control" style="width:50%;">  
                    <option selected>== Pilih ==</option>
                    <?php foreach ($kelas as $key) {
                        # code...
                    ?>
                    <option value="<?php echo $key->id_tpkl_kelas ?>"><?php echo $key->periode_kelas ?></option>
                    <?php } ?>     
                    </select> 
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-block btn-success" id="cek" name="cek" style="width:20%;" value="Klik Untuk Export ke Excel">
                    </div>
                  </form>
                  
                 <div id="results"></div><!-- /.div result -->
         
              </div><!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->