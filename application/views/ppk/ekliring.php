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
              <form action="<?php echo base_url() ?>ppk/ekliringp" name="form1" id="form1" method="post">
                <input type="hidden" name="id_uks" id="id_uks" value="<?php echo $c->id_uks; ?>">
                <input type="hidden" name="id_uks_ppk" id="id_uks_ppk" value="<?php echo $c->id_uks_ppk; ?>">
               <div class="form-group">
                <label for="exampleInputEmail1">KHS asli semester I s/d IV</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="khs" id="khs" value="1" <?php echo ($c->khs == '1') ? 'checked' : ''; ?>>
                      Ada
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="khs" id="khs" value="2" <?php echo ($c->khs == '2') ? 'checked' : ''; ?>>
                      Tidak Ada
                    </label>
                  </div>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Foto copy ijazah SLTA legalisir</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="fcsma" id="fcsma" value="1" <?php echo ($c->fcsma == '1') ? 'checked' : ''; ?>>
                      Ada
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="fcsma" id="fcsma" value="2" <?php echo ($c->fcsma == '2') ? 'checked' : ''; ?>>
                      Tidak Ada
                    </label>
                  </div>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Foto copy conduite/ nilai praktek kerja</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="fc_nilaikc" id="fc_nilaikc" value="1" <?php echo ($c->fc_nilaikc == '1') ? 'checked' : ''; ?>>
                      Ada
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="fc_nilaikc" id="fc_nilaikc" value="2" <?php echo ($c->fc_nilaikc == '2') ? 'checked' : ''; ?>>
                      Tidak Ada
                    </label>
                  </div>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Sumbangan Perpustakaan</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="sumbanganp" id="sumbanganp" value="1" <?php echo ($c->sumbanganp == '1') ? 'checked' : ''; ?>>
                      Ada
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="sumbanganp" id="sumbanganp" value="2" <?php echo ($c->sumbanganp == '2') ? 'checked' : ''; ?>>
                      Tidak Ada
                    </label>
                  </div>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Berkas Proposal (S1)</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="proposal" id="proposal" value="1" <?php echo ($c->proposal == '1') ? 'checked' : ''; ?>>
                      Ada
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="proposal" id="proposal" value="2" <?php echo ($c->proposal == '2') ? 'checked' : ''; ?>>
                      Tidak Ada
                    </label>
                  </div>
                </div>
                 <div class="form-group">
                <label for="exampleInputEmail1">Berkas Skripsi / Karya Tulis</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="skripsi" id="skripsi" value="1" <?php echo ($c->skripsi == '1') ? 'checked' : ''; ?>>
                      Ada
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="skripsi" id="skripsi" value="2" <?php echo ($c->skripsi == '2') ? 'checked' : ''; ?>>
                      Tidak Ada
                    </label>
                  </div>
                </div>
                 <div class="form-group">
                <label for="exampleInputEmail1">Foto 3X4</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="foto" id="foto" value="1" <?php echo ($c->foto == '1') ? 'checked' : ''; ?>>
                      Ada
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="foto" id="foto" value="2" <?php echo ($c->foto == '2') ? 'checked' : ''; ?>>
                      Tidak Ada
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
                <a href="<?php echo base_url() ?>ppk/ajuan"><button type="button" class="btn btn-success pull-left"><i class="fa fa-chevron-left"></i>Kembali</button></a>
                </form>
              <?php } ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->