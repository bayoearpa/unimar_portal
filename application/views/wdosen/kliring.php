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
                <tr>
                  <td><label for="exampleInputEmail1">Judul</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->karya; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Pembimbing 1</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->pembimbing1; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Pembimbing 2</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->pembimbing2; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Pembimbing 3</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->pembimbing3; ?></label></td>
                </tr>
              </table>
              <hr>
              <form action="<?php echo base_url() ?>wdosen/kliringp" name="form1" id="form1" method="post">
                <input type="hidden" name="id_uks" id="id_uks" value="<?php echo $c->id_uks; ?>">
                <input type="hidden" name="nim" id="nim" value="<?php echo $c->nim; ?>">
                <div class="form-group">
                <label for="exampleInputEmail1">Pemeriksaan kelengkapan dan penentuan judul skripsi :</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="pktsk" id="pktsk" value="1">
                      Sesuai
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="pktsk" id="pktsk" value="2">
                      Tidak Sesuai
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
                <a href="<?php echo base_url() ?>wdosen/ajuan"><button type="button" class="btn btn-success pull-left"><i class="fa fa-chevron-left"></i>Kembali</button></a>
                </form>
              <?php } ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->