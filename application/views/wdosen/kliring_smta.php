 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Kliring UAS</h3>
          </div>
          <div class="box-body">
            <?php echo validation_errors(); 
            echo $this->session->flashdata('success');
            echo $this->session->flashdata('error');
            foreach($catar as $c){ 
              ?>
              <table>
                <tr>
                  <td><label for="exampleInputEmail1">NIM</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->nim; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Nama</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $nama; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Prodi</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $prodi; ?></label></td>
                </tr>
               
              </table>
              <hr>
               <table class="table table-bordered">
                  <tr>
                    <td><b>Mata Kuliah</b></td>
                    <td><b>SKS</b></td>
                    <td><b>Kuota Peserta Terkini (Maks. 10 Orang)</b></td>
                  </tr>
                 
                    <?php 
                      foreach ($list_makul_temp as $keyz) { ?>
                        <tr>
                        <td><?php echo $keyz->nama_makul; ?></td>
                        <td><?php echo $keyz->sks;?></td>
                        <td><?php 
                          echo $wdosen->countkuotakelas($keyz->kd_makul);
                         ?></td>
                        </tr>
                      <?php
                      # code...
                      }
                     ?>
                  
                </table>
              <form action="<?php echo base_url() ?>wdosen/kliringsmtap" name="form1" id="form1" method="post">
                <input type="hidden" name="id_smta" id="id_smta" value="<?php echo $c->id_smta; ?>">              
                <div class="form-group">
                  <label>Keterangan (Telah memenuhi syarat untuk mengikuti UAS?) :</label>
                  <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Masukkan Keterangan"></textarea>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Hasil :</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="hasil" id="hasil" value="1">
                      Telah Memenuhi Syarat
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="hasil" id="hasil" value="2">
                      Belum Memenuhi Syarat
                    </label>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo base_url() ?>wdosen/ajuan_smta"><button type="button" class="btn btn-success pull-left"><i class="fa fa-chevron-left"></i>Kembali</button></a>
                </form>
              <?php } ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->