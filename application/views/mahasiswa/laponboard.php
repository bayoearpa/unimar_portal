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
                  <p>Sebelum mengisi form laporan Onboard silakan donwload format yang tersedia dibawah ini:</p>
                  <a href="<?php echo base_url() ?>mahasiswa/down_format_laporan_bulanan_onboard" target="__blank"><button type="button" class="btn btn-primary">Download Panduan Pengisian Ukuran Pakaian</button></a>
                 <form action="<?php echo base_url() ?>laponboardp" name="form1" id="form1" method="post" enctype="multipart/form-data">               
               <div class="form-group">
                        <label for="editufsignon">Laporan Onboard Bulan Ke-1 (Upload dalam format .pdf)</label>
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
                        <label for="editufsignon">Laporan Onboard Bulan Ke-2 (Upload dalam format .pdf)</label>
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
                        <label for="editufsignon">Laporan Onboard Bulan Ke-3 (Upload dalam format .pdf)</label>
                        <input type="file" class="form-control" id="laponboard3" name="laponboard3">
                        <!-- <input type="hidden" id="editufsignon_existing" name="ufsignon_existing" value="<?php //echo $c->upload_file_signon; ?>"> -->
                        <?php if ($c->laponboard3) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $c->laponboard3; ?>">>Lihat Laporan Onboard 3</button>
                        <?php } else { ?>
                        <!-- Tampilkan pesan jika file tidak ada -->
                        File tidak tersedia
                        <?php } ?>
                        
                </div>
                 <div class="form-group">
                        <label for="editufsignon">Laporan Onboard Bulan Ke-4 (Upload dalam format .pdf)</label>
                        <input type="file" class="form-control" id="laponboard4" name="laponboard4">
                        <!-- <input type="hidden" id="editufsignon_existing" name="ufsignon_existing" value="<?php //echo $c->upload_file_signon; ?>"> -->
                        <?php if ($c->laponboard4) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $c->laponboard4; ?>">>Lihat Laporan Onboard 4</button>
                        <?php } else { ?>
                        <!-- Tampilkan pesan jika file tidak ada -->
                        File tidak tersedia
                        <?php } ?>
                        
                </div>
                 <div class="form-group">
                        <label for="editufsignon">Laporan Onboard Bulan Ke-5 (Upload dalam format .pdf)</label>
                        <input type="file" class="form-control" id="laponboard5" name="laponboard5">
                        <!-- <input type="hidden" id="editufsignon_existing" name="ufsignon_existing" value="<?php //echo $c->upload_file_signon; ?>"> -->
                        <?php if ($c->laponboard5) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $c->laponboard5; ?>">>Lihat Laporan Onboard 5</button>
                        <?php } else { ?>
                        <!-- Tampilkan pesan jika file tidak ada -->
                        File tidak tersedia
                        <?php } ?>
                        
                </div>
                 <div class="form-group">
                        <label for="editufsignon">Laporan Onboard Bulan Ke-6 (Upload dalam format .pdf)</label>
                        <input type="file" class="form-control" id="laponboard6" name="laponboard6">
                        <!-- <input type="hidden" id="editufsignon_existing" name="ufsignon_existing" value="<?php //echo $c->upload_file_signon; ?>"> -->
                        <?php if ($c->laponboard6) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $c->laponboard6; ?>">>Lihat Laporan Onboard 6</button>
                        <?php } else { ?>
                        <!-- Tampilkan pesan jika file tidak ada -->
                        File tidak tersedia
                        <?php } ?>
                        
                </div>
                 <div class="form-group">
                        <label for="editufsignon">Laporan Onboard Bulan Ke-7 (Upload dalam format .pdf)</label>
                        <input type="file" class="form-control" id="laponboard7" name="laponboard7">
                        <!-- <input type="hidden" id="editufsignon_existing" name="ufsignon_existing" value="<?php //echo $c->upload_file_signon; ?>"> -->
                        <?php if ($c->laponboard7) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $c->laponboard7; ?>">>Lihat Laporan Onboard 7</button>
                        <?php } else { ?>
                        <!-- Tampilkan pesan jika file tidak ada -->
                        File tidak tersedia
                        <?php } ?>
                        
                </div>
                 <div class="form-group">
                        <label for="editufsignon">Laporan Onboard Bulan Ke-8 (Upload dalam format .pdf)</label>
                        <input type="file" class="form-control" id="laponboard8" name="laponboard8">
                        <!-- <input type="hidden" id="editufsignon_existing" name="ufsignon_existing" value="<?php //echo $c->upload_file_signon; ?>"> -->
                        <?php if ($c->laponboard8) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $c->laponboard8; ?>">>Lihat Laporan Onboard 8</button>
                        <?php } else { ?>
                        <!-- Tampilkan pesan jika file tidak ada -->
                        File tidak tersedia
                        <?php } ?>
                        
                </div>
                 <div class="form-group">
                        <label for="editufsignon">Laporan Onboard Bulan Ke-9 (Upload dalam format .pdf)</label>
                        <input type="file" class="form-control" id="laponboard9" name="laponboard9">
                        <!-- <input type="hidden" id="editufsignon_existing" name="ufsignon_existing" value="<?php //echo $c->upload_file_signon; ?>"> -->
                        <?php if ($c->laponboard9) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $c->laponboard9; ?>">>Lihat Laporan Onboard 9</button>
                        <?php } else { ?>
                        <!-- Tampilkan pesan jika file tidak ada -->
                        File tidak tersedia
                        <?php } ?>
                        
                </div>
                 <div class="form-group">
                        <label for="editufsignon">Laporan Onboard Bulan Ke-10 (Upload dalam format .pdf)</label>
                        <input type="file" class="form-control" id="laponboard10" name="laponboard10">
                        <!-- <input type="hidden" id="editufsignon_existing" name="ufsignon_existing" value="<?php //echo $c->upload_file_signon; ?>"> -->
                        <?php if ($c->laponboard10) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $c->laponboard10; ?>">>Lihat Laporan Onboard 10</button>
                        <?php } else { ?>
                        <!-- Tampilkan pesan jika file tidak ada -->
                        File tidak tersedia
                        <?php } ?>
                        
                </div>
                 <div class="form-group">
                        <label for="editufsignon">Laporan Onboard Bulan Ke-11 (Upload dalam format .pdf)</label>
                        <input type="file" class="form-control" id="laponboard11" name="laponboard11">
                        <!-- <input type="hidden" id="editufsignon_existing" name="ufsignon_existing" value="<?php //echo $c->upload_file_signon; ?>"> -->
                        <?php if ($c->laponboard11) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $c->laponboard11; ?>">>Lihat Laporan Onboard 11</button>
                        <?php } else { ?>
                        <!-- Tampilkan pesan jika file tidak ada -->
                        File tidak tersedia
                        <?php } ?>
                        
                </div>
                 <div class="form-group">
                        <label for="editufsignon">Laporan Onboard Bulan Ke-12 (Upload dalam format .pdf)</label>
                        <input type="file" class="form-control" id="laponboard12" name="laponboard12">
                        <!-- <input type="hidden" id="editufsignon_existing" name="ufsignon_existing" value="<?php //echo $c->upload_file_signon; ?>"> -->
                        <?php if ($c->laponboard12) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $c->laponboard12; ?>">>Lihat Laporan Onboard 12</button>
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