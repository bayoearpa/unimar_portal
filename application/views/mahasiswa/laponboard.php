    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Laporan Onboard</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <?php 
             
              if ($mahasiswa->cekstatus('status_sb','iya', $this->session->userdata('user')) > "0" ) {
              # code... ?>
                <?php  foreach ($mhs_detail as $c) { ?>
                 <form action="<?php echo base_url() ?>laponboardp" name="form1" id="form1" method="post" enctype="multipart/form-data">               
               <div class="form-group">
                        <label for="editufsignon">Laporan Onboard Triwulan 1 (Upload dalam format .pdf)</label>
                        <input type="file" class="form-control" id="laponboard1" name="laponboard1">
                        <!-- <input type="hidden" id="editufsignon_existing" name="ufsignon_existing" value="<?php //echo $c->upload_file_signon; ?>"> -->
                        <?php if ($c->laponboard1) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $c->laponboard1; ?>">Lihat Laporan Onboard 1</button>
                        <?php } else { ?>
                        <!-- Tampilkan pesan jika file tidak ada -->
                        File tidak tersedia
                        <?php } ?>
                        
                </div>
                 <div class="form-group">
                        <label for="editufsignon">Laporan Onboard Triwulan 2 (Upload dalam format .pdf)</label>
                        <input type="file" class="form-control" id="laponboard2" name="laponboard2">
                        <!-- <input type="hidden" id="editufsignon_existing" name="ufsignon_existing" value="<?php //echo $c->upload_file_signon; ?>"> -->
                        <?php if ($c->laponboard2) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $c->laponboard2; ?>">>Lihat Laporan Onboard 2</button>
                        <?php } else { ?>
                        <!-- Tampilkan pesan jika file tidak ada -->
                        File tidak tersedia
                        <?php } ?>
                        
                </div>
                <div class="form-group">
                        <label for="editufsignon">Laporan Onboard Triwulan 3 (Upload dalam format .pdf)</label>
                        <input type="file" class="form-control" id="laponboard3" name="laponboard3">
                        <!-- <input type="hidden" id="editufsignon_existing" name="ufsignon_existing" value="<?php //echo $c->upload_file_signon; ?>"> -->
                        <?php if ($c->laponboard3) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $c->laponboard3; ?>">>Lihat Laporan Onboard 3</button>
                        <?php } else { ?>
                        <!-- Tampilkan pesan jika file tidak ada -->
                        File tidak tersedia
                        <?php } ?>
                        
                </div>
                <div class="form-group"><button type="submit" class="btn btn-primary">Simpan</button></div>
                  <?php } ?>
              </form>
             <?php } ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->