 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Kliring</h3>
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
              </table>
              <hr>
              <form action="<?php echo base_url() ?>ppk/kliringp" name="form1" id="form1" method="post">
                <input type="hidden" name="id_uks" id="id_uks" value="<?php echo $c->id_uks; ?>">
                <div class="form-group">
                <label for="exampleInputEmail1">KHS asli semester I s/d IV</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="khs" id="khs" value="1">
                      Ada
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="khs" id="khs" value="2">
                      Tidak Ada
                    </label>
                  </div>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Foto copy ijazah SLTA legalisir</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="fcsma" id="fcsma" value="1">
                      Ada
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="fcsma" id="fcsma" value="2">
                      Tidak Ada
                    </label>
                  </div>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Foto copy conduite/ nilai praktek kerja</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="fc_nilaikc" id="fc_nilaikc" value="1">
                      Ada
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="fc_nilaikc" id="fc_nilaikc" value="2">
                      Tidak Ada
                    </label>
                  </div>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Sumbangan Perpustakaan</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="sumbanganp" id="sumbanganp" value="1">
                      Ada
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="sumbanganp" id="sumbanganp" value="2">
                      Tidak Ada
                    </label>
                  </div>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Berkas Proposal (S1)</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="proposal" id="proposal" value="1">
                      Ada
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="proposal" id="proposal" value="2">
                      Tidak Ada
                    </label>
                  </div>
                </div>
                 <div class="form-group">
                <label for="exampleInputEmail1">Berkas Skripsi / Karya Tulis</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="skripsi" id="skripsi" value="1">
                      Ada
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="skripsi" id="skripsi" value="2">
                      Tidak Ada
                    </label>
                  </div>
                </div>
                 <div class="form-group">
                <label for="exampleInputEmail1">Foto 3X4</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="foto" id="foto" value="1">
                      Ada
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="foto" id="foto" value="2">
                      Tidak Ada
                    </label>
                  </div>
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
                <div class="form-group">
                  <label>Keterangan :</label>
                  <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Masukkan Keterangan"></textarea>
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