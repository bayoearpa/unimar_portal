 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Laporan Onboard</h3>
          </div>
          <div class="box-body">
             <?php 
             
              if ($mahasiswa->cekstatus('status_sb','tidak', $this->session->userdata('user')) > "0" ) {
              # code... ?>
            <?php 
            // echo validation_errors(); 
            // echo $this->session->flashdata('success');
            // echo $this->session->flashdata('error');
            foreach($mhs_detail as $c){ 
              ?>
              <table width="30%">
                <tr>
                  <td><label for="exampleInputEmail1">NIM</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->nim; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Nama</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->nama; ?></label></td>
                </tr>
                 <tr>
                  <td><label for="exampleInputEmail1">Tanggal Lahir</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->tgll; ?></label></td>
                </tr>
                 <tr>
                  <td><label for="exampleInputEmail1">Alamat</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->alamat; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Jenis Kelamin</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $valjk = ($c->jk == 'L') ? "Laki-laki" : "Perempuan" ; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Seafarercode</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->seafarercode; ?></label></td>
                </tr>
              </table>
              <hr>
              <!-- <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Harap diperhatikan!</h4>
                    Batas waktu taruna Prala mengirimkan laporan sign on ke kampus melalui email atau
                  link/website yang sudah disiapkan oleh Bagian PPK adalah maksimal 1 (satu) bulan / 30 Hari
                  setelah taruna naik kapal.
                </div> -->
              <form action="<?php echo base_url() ?>mahasiswa/laponboardp" name="form1" id="form1" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_mon" id="id_mon" value="<?php echo $c->id_mon; ?>">
                <input type="hidden" name="id_lapon" id="id_lapon" value="<?php echo $c->id_lapon; ?>">
                <input type="hidden" name="lapke" id="lapke" value="<?php echo $lapke; ?>">
                <input type="hidden" name="nim" id="nim" value="<?php echo $c->nim; ?>">
                 <div class="form-group">
                   <div class="form-group">
                        <label for="editufsignon">Upload File laporan onboard ke <?php echo $lapke; ?></label>
                        <input type="file" class="form-control" id="lap_onboard<?php echo $lapke ?>" name="lap_onboard<?php echo $lapke ?>">
                        <input type="hidden" id="lap_onboard<?php echo $lapke ?>_existing" name="lap_onboard<?php echo $lapke ?>_existing" value="lap_onboard<?php echo $lapke ?>">
                    </div>
                    <div id="fileUploadStatus">Belum ada file yang diunggah.</div>
                   
                  </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
               <!--  <a href="<?php //echo base_url() ?>mahasiswa/onboard"><button type="button" class="btn btn-success pull-left"><i class="fa fa-chevron-left"></i>Kembali</button></a> -->
                </form>
              <?php } ?>
                <?php }else{ ?>
                <!-- peringatan jika belum boleh mendafatar  -->
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    anda belum diizinkan untuk mengisi form Laporan TRB karena belum ujian Modeling
                </div>
            <!-- end peringatan jika belum boleh mendafatar  -->

              <?php } ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->