    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Pencarian Mahasiswa</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                  <div class="box-body">
                    <!-- <form method="post" action="<?php //echo base_url() ?>koperasi/preview_cetak"> -->
                    <form id="previewForm">

                    <div class="form-group">
                    <!-- <label> Pilih Program Studi</label> -->
                    <input class="form-control input-lg" type="text" name="nama" id="nama" placeholder="Masukan Kata Kunci">
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-block btn-success" id="cek" name="cek" style="width:20%;" value="Klik Untuk Mencari">
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