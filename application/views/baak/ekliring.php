 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Edit Kliring</h3>
          </div>
          <div class="box-body">
            <?php echo validation_errors(); 
            echo $this->session->flashdata('success');
            echo $this->session->flashdata('error');
            foreach($catarz as $c){ 
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
              </table>
              <hr>
              <?php
            }
            foreach($catar as $c){ 
              ?>
              <form action="<?php echo base_url() ?>baak/ekliringp" name="form1" id="form1" method="post">
                <input type="hidden" name="id_uks" id="id_uks" value="<?php echo $c->id_uks; ?>">
                <input type="hidden" name="id_uks_baak" id="id_uks_baak" value="<?php echo $c->id_uks_baak; ?>">
                 <div class="form-group">
                <label for="exampleInputEmail1">Index Prestasi IP :</label>
                  <input class="form-control" type="text" name="smt1" id="smt1" value="<?php echo $c->smt1 ?>">
                  <input class="form-control" type="text" name="smt2" id="smt2" value="<?php echo $c->smt2 ?>">
                  <input class="form-control" type="text" name="smt3" id="smt3" value="<?php echo $c->smt3 ?>">
                  <input class="form-control" type="text" name="smt4" id="smt4" value="<?php echo $c->smt4 ?>">
                  <input class="form-control" type="text" name="smt5" id="smt5" value="<?php echo $c->smt5 ?>">
                  <input class="form-control" type="text" name="smt6" id="smt6" value="<?php echo $c->smt6 ?>">
                  <input class="form-control" type="text" name="smt7" id="smt7" value="<?php echo $c->smt7 ?>">
                  <input class="form-control" type="text" name="smt8" id="smt8" value="<?php echo $c->smt8 ?>">
                  <input class="form-control" type="text" name="smt_mat" id="smt_mat" value="<?php echo $c->smt_mat ?>">
                  </div>
              
                 <div class="form-group">
                <label for="exampleInputEmail1">Scan Ijazah dan Transkip Nilai D-III (ekstensi) :</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="fcijasah_trans" id="fcijasah_trans" value="1" <?php echo ($c->hasil == '1') ? 'checked' : ''; ?>>
                      Sudah
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="fcijasah_trans" id="fcijasah_trans" value="2" <?php echo ($c->hasil == '2') ? 'checked' : ''; ?>>
                      Belum
                    </label>
                  </div>
                </div>
                 <div class="form-group">
                <label for="exampleInputEmail1">Hasil :</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="hasil" id="hasil" value="1" <?php echo ($c->hasil == '1') ? 'checked' : ''; ?>>
                      Telah Memenuhi Syarat
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="hasil" id="hasil" value="2" <?php echo ($c->hasil == '2') ? 'checked' : ''; ?>>
                      Belum Memenuhi Syarat
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label>Keterangan :</label>
                  <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Masukkan Keterangan"><?php echo $c->keterangan ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo base_url() ?>baak/ajuan"><button type="button" class="btn btn-success pull-left"><i class="fa fa-chevron-left"></i>Kembali</button></a>
                </form>
              <?php } ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->