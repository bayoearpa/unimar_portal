 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Kliring PKL</h3>
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
            <?php } ?>
              <hr>
              <?php foreach($catar as $c){  ?>
              <form action="<?php echo base_url() ?>mahatar/ekliringp_pkl" name="form1" id="form1" method="post">
                <input type="hidden" name="id_pkl_m" id="id_pkl_m" value="<?php echo $c->id_pkl_m; ?>">
                <input type="hidden" name="id_pkl" id="id_pkl" value="<?php echo $c->id_pkl; ?>">
                <input type="hidden" name="nim" id="nim" value="<?php echo $c->nim; ?>">
                <div class="form-group">
                <label for="exampleInputEmail1">Pemeriksaan kerapian, penampilan beserta kelengkapan selama mengikuti pendidikan di Kampus :</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="kerapian" id="kerapian" value="1" <?php echo ($c->kerapian == '1') ? 'checked' : ''; ?>>
                      Rapi
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="kerapian" id="kerapian" value="2" <?php echo ($c->kerapian == '2') ? 'checked' : ''; ?>>
                      Tidak Rapi
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
                  <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Masukkan Keterangan"><?php echo $c->keterangan; ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo base_url() ?>mahatar/ajuan_pkl"><button type="button" class="btn btn-success pull-left"><i class="fa fa-chevron-left"></i>Kembali</button></a>
                </form>
              <?php } ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->